<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\ProductStock;
use App\Models\Admin\ProductCatlog;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Helpers\ExcelResponse;
use DB;

class StockTransfer extends Model
{
    use HasFactory;
    protected $table = 'stock_transfer';
    protected $fillable = [ 'from_location', 'to_location', 'date', 'products', 'total_quantity', 'total_amount', 'status', 'contact_person', 'transfer_stock_immediately', 'history' ];

    public function productStock() {
        return $this->hasMany(ProductStock::class)->with('product');
    }

    public function to() {
        return $this->belongsTo(Location::class, 'to_location')->withTrashed();
    }

    public function getStockTransferRecords($request) {
        $stock_transfer_query = $this->with(['to']);

        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        if (isset($request['created_by'])) {
            $stock_transfer_query->where('created_by', $request['created_by']);
        }

        if (isset($request['status'])) {
            $stock_transfer_query->where('status', $request['status']);
        }

        if (isset($request['sort_by']) && isset($request['order_by'])) {
            $stock_transfer_query->orderBy($request['sort_by'], $request['order_by']);
        }

        if (isset($request['search'])) {
            $stock_transfer_query->whereHas("to", function($query) use ($request) {
                $query->where('location_name',  'LIKE', "%{$request['search']}%" );
            })->orWhere('date', 'LIKE', "%{$request['search']}%")
            ->orWhere('status', 'LIKE', "%{$request['search']}%")
            ->orWhere('contact_person', 'LIKE', "%{$request['search']}%");
        }

        if (isset($request['response_type'])) {
            $stock_transfer_data = $stock_transfer_query->get();
            $columns = [ 'Transfer ID', 'From Location', 'To Location', 'Date', 'In Stock Quantity', 'Transfer Quantity', 'Product Name', 'Brand', 'Status', 'Contact Person' ];
            $rows = [];
            foreach ($stock_transfer_data as $data) {
                $products = json_decode($data['products']);
                foreach ($products as $product) {
                    $product_data = ProductCatlog::where('id', $product->product_id)->with('getBrand')->first();
                    array_push($rows, [
                        $data['id'], $data['from_location'], $data['to']['location_name'], $data['date'], 
                        $product->in_stock_qty, $product->quantity, $product_data['name'],
                        $product_data['getBrand']['name'], $data['status'], $data['contact_person']
                    ]);
                }
            }
            return ExcelResponse::export('StockTransfer', $rows, $columns, 'StockTransfer');
        }

        return $stock_transfer_query->paginate($perPage);
    }

    public function getStockTransferRecord($request) {
        $stock_data = $this->where('id', $request['stock_transfer_id'])->with(['to'])->first();
        $products = json_decode($stock_data['products']);
        // foreach ($products as $product) {
        //     $product->product = ProductCatlog::where('id', $product->product_id)->with('getProductImages')->first();
        //     $product->brand_name = Brand::find($product->brand_id)->name;
        // }
        $stock_data['products'] = $products;
        return $stock_data;
    }

    public function createStockTransfer($request) {
        $total_amount = 0;
        $total_quantity = 0;
        foreach ($request['products'] as $product) { 
            $product_info = ProductCatlog::where('id', $product['product_id'])->first();
            $product_info->product_quantity-=$product['quantity'];
            $product_info->update();
            $total_amount+=$product['price']*$product['quantity'];
            $total_quantity+=$product['quantity'];
        }

        return $this->create([
            'from_location' => $request['from_location'],
            'to_location' => $request['to_location'],
            'date' => $request['date'],
            'products' => json_encode($request['products']),
            'total_quantity' => $total_quantity,
            'total_amount' => $total_amount,
            'status' => 'SHIPPED',
            'contact_person' => $request['contact_person'],
            'transfer_stock_immediately' => $request['transfer_stock_immediately'],
            'history' => json_encode([[
                'products' => $request['products'],
                'status' => 'SHIPPED'
            ]])
        ]);

        // foreach ($request['products'] as $product) {
        //     $product_info = ProductCatlog::where('id', $product['product_id'])->first();
        //     for ($i=1;$i<=$product['quantity'];$i++) {
        //         ProductStock::create([
        //             'stock_transfer_id' => $stock_transfer['id'],
        //             'product_id' => $product['product_id'],
        //             'quantity' => 1,
        //             'amount' => $product_info['sale_price']
        //         ]);
        //     }
        // }
    }

    public function updateStockTransfer($request) {
        $stock_transfer_data = $this->where('id', $request['stock_transfer_id'])->first();
        $history = json_decode($stock_transfer_data['history']);
        
        if ($history[0]->status!='CANCELLED') {
            foreach ($history[0]->products as $product) {
                $product_info = ProductCatlog::where('id', $product->product_id)->first();
                $product_info->product_quantity+=$product->quantity;
                $product_info->update();
            }
        
            $total_amount = 0;
            $total_quantity = 0;
            foreach ($request['products'] as $product) {
                if ($request['status']!='CANCELLED') {
                    $product_info = ProductCatlog::where('id', $product['product_id'])->first();
                    $product_info->product_quantity-=$product['quantity'];
                    $product_info->update();
                }
                $total_amount+=$product['price']*$product['quantity'];
                $total_quantity+=$product['quantity'];
            }

            array_unshift($history, [
                'products' => $request['products'],
                'status' => $request['status']
            ]);

            return $this->where('id', $request['stock_transfer_id'])->update([
                'from_location' => $request['from_location'],
                'to_location' => $request['to_location'],
                'date' => $request['date'],
                'products' => json_encode($request['products']),
                'total_quantity' => $total_quantity,
                'total_amount' => $total_amount,
                'status' => $request['status'],
                'contact_person' => $request['contact_person'],
                'transfer_stock_immediately' => $request['transfer_stock_immediately'],
                'history' => json_encode($history)
            ]);
        }
    }
}