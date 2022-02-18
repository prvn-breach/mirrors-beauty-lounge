<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Helpers\ExcelResponse;
use Carbon\Carbon;
use DB;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [ 'product_id', 'barcode', 'brand_id', 'category_id', 'product_name', 'image', 'warranty', 'delivery', 'order_id', 'vat', 'sku', 'original_price', 'price', 'discount', 'quantity', 'active' ];

    public function product() {
        return $this->hasOne(ProductCatlog::class, 'id', 'product_id')->withTrashed()->with('getProductImages');
    }

    public function orderStatusShipping() {
        return $this->hasOne(OrderStatusShipping::class, 'order_id');
    }

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id')->withTrashed();
    }

    public function orderStatus(){
        return $this->hasOne(OrderStatusShipping::class, 'order_id', 'order_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getCategorySales($request) {
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $order_item_query = $this->whereHas('orderStatus', function($query){
            $query->where('status', 'D');
        })->select('category_id', DB::raw('COUNT(*) as total_orders'), DB::raw('SUM(quantity) as total_quantity'), DB::raw('SUM(price) as total_price'))
            ->with('category')->has('category')->groupBy(['category_id']);

        if (isset($request['created_by'])) {
            $order_item_query->whereHas('category', function($query) use ($request){
                $query->where('created_by', $request['created_by']);
            });
        }

        if (isset($request['sort_by']) && isset($request['order'])) {
            $order_item_query->orderBy($request['sort_by'], $request['order']);
        }
    
        if (isset($request['search'])) {
            $order_item_query->whereHas('category', function ($query) use ($request){
                $query->where('name', 'LIKE',"%{$request['search']}%");
            });
        }

        if (isset($request['period']) && $request['period']!='0') {
            if ($request['period'] == 'current_year') {
                $order_item_query->whereYear('created_at', date('Y'));
            }
            if ($request['period'] == 'current_month') {
                $order_item_query->whereMonth('created_at', date('m'));
            }
            if ($request['period'] == 'current_week') {
                $order_item_query->whereDate('created_at', '>=', Carbon::now()->startOfWeek()->format('Y-m-d'))
                    ->whereDate('created_at', '<=', Carbon::now()->format('Y-m-d'));
            }
            if ($request['period'] == 'current_day') {
                $order_item_query->whereDate('created_at', Carbon::now()->format('Y-m-d'));
            }
        }  

        if (isset($request['period']) && $request['period']=='0' && isset($request['date'])) {
            $dates = explode("-", $request['date']);
            $from_date = $dates[0];
            $to_date = $dates[1];
            $order_item_query->whereDate('created_at', '>=', $from_date )->whereDate('created_at', '<=', $to_date);
        }

        // Excel Download
        if (isset($request['response_type'])) {
            if (isset($request['excel_limit'])) {
                $order_item_query->limit($request['excel_limit']);
            }
            $order_items = $order_item_query->get();
            $columns = $request['excel_fields'];
            $rows = [];
            foreach ($order_items->toArray() as $item) {
                $row = [];
                foreach ($request['excel_db_columns'] as $index => $excel) {
                    $row[$index] = null;
                    if (isset($excel['table'])) {
                        $row[$index] = $item[$excel['table']];
                    }
                    if (isset($excel['column'])) {
                        $row[$index] = $row[$index] 
                            ? $row[$index][$excel['column']]
                            : $item[$excel['column']];
                    }
                }
                array_push($rows, array_values($row));
            }
            return ExcelResponse::export('CategorySalesCost', $rows, $columns, 'CategorySalesCost');
        }

        return $order_item_query->paginate($perPage);
    }

    public function getTopCustomersSales($request) {
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $order_item_query = $this->whereHas('orderStatus', function($query){
            $query->where('status', 'D');
        })->join('orders', 'orders.id', '=', 'order_items.order_id')->select('orders.user_id as user_id', DB::raw('COUNT(*) as items_count'), DB::raw('SUM(price) as total_price'))
            ->with('user')->groupBy(['user_id']);


        if (isset($request['created_by'])) {
            $order_item_query = $order_item_query->whereHas('product', function($query) use ($request){
                $query->where('created_by', $request['created_by']);
            });
        }

        if (isset($request['sort_by']) && isset($request['order'])) {
            $order_item_query->orderBy($request['sort_by'], $request['order']);
        }
    
        // if (isset($request['search'])) {
        //     $order_item_query->whereHas('user', function ($query) use ($request){
        //         $query->where('name', 'LIKE', "%{$request['search']}%");
        //     });
        // }


        if (isset($request['period']) && $request['period']!='0') {
            if ($request['period'] == 'current_year') {
                $order_item_query->whereYear('orders.created_at', date('Y'));
            }
            if ($request['period'] == 'current_month') {
                $order_item_query->whereMonth('orders.created_at', date('m'));
            }
            if ($request['period'] == 'current_week') {
                $order_item_query->whereDate('orders.created_at', '>=', Carbon::now()->startOfWeek()->format('Y-m-d'))
                    ->whereDate('orders.created_at', '<=', Carbon::now()->format('Y-m-d'));
            }
            if ($request['period'] == 'current_day') {
                $order_item_query->whereDate('orders.created_at', Carbon::now()->format('Y-m-d'));
            }
        }  

        if (isset($request['period']) && $request['period']=='0' && isset($request['date'])) {
            $dates = explode("-", $request['date']);
            $from_date = $dates[0];
            $to_date = $dates[1];
            $order_item_query->whereDate('orders.created_at', '>=', $from_date )->whereDate('orders.created_at', '<=', $to_date);
        }

        // Excel Download
        if (isset($request['response_type'])) {
            if (isset($request['excel_limit'])) {
                $order_item_query->limit($request['excel_limit']);
            }
            $order_items = $order_item_query->get();
            $columns = $request['excel_fields'];
            $rows = [];
            foreach ($order_items->toArray() as $item) {
                $row = [];
                foreach ($request['excel_db_columns'] as $index => $excel) {
                    $row[$index] = null;
                    if (isset($excel['table'])) {
                        $row[$index] = $item[$excel['table']];
                    }
                    if (isset($excel['column'])) {
                        $row[$index] = $row[$index] 
                            ? $row[$index][$excel['column']]
                            : $item[$excel['column']];
                    }
                }
                array_push($rows, array_values($row));
            }
            return ExcelResponse::export('TopCustomerSalesCost', $rows, $columns, 'TopCustomerSalesCost');
        }

        return $order_item_query->paginate(10);
    }
}