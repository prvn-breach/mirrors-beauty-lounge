<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ExcelResponse;
use Carbon\Carbon;
use DB;

class ProductCatlog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'name',	'slug',	'category_id', 'sub_category_id', 'category_parent_id',	'brand_id',	'tax_rate_id',	'vendor_id', 'product_quantity', 'product_code',	'barcode',	'sale_price',	'discount_price',	'discount',	'sku',	'upc',	'availibility',	'model_number',	'is_exclusive_deal',	'is_feature',	'is_new',	'is_authorised_dealer',	'active',	'description',	'warranty',	'delivery',	'status',	'tags',	'seo_title',	'seo_keywords',	'seo_desciption' ];

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d H:i:s'
    // ];

    public function changeProductStatus($request){
        $data = $request->all();
        return $this->where('id',$data['id'])->update(['status'=>$data['status']]);
    }

    public function saveProduct($data){
        return $this->insertGetId($data);
    }

    public function updateProduct($id,$data){
        return $this->where('id',$id)->update($data);
    }

    public function getProductAttributes(){
        return $this->hasMany(ProductAttribute::class,'product_id','id')->with('getProductOptions');
    }  
    public function getProductImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    } 

    public function getProductOptions(){
        return $this->hasMany(ProductOption::class,'product_id','id');
    }

    public function getProductSpecification(){
        return $this->hasMany(ProductSpecification::class,'product_id','id');
    }

    public function getCategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function getBrand(){
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    public function getproduct($product_id){
        return $this->with(['getProductAttributes','getProductImages','getProductOptions','getProductSpecification','getCategory','getBrand'])->where('id',$product_id)->first();
    }

    public function productStock() {
        return $this->hasMany(ProductStock::class, 'product_id')->where('purchased',0)->whereHas('stockTransfer', function($query){
            $query->where('status', 'RECEIVED');
        });
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'product_id', 'id')->whereHas('orderStatus', function($query){
            $query->where('status', 'D');
        });
    }

    public function getproducts($request){
        $perPage = 25;
        $data = $request->all();
        if(isset($data['perPage']) && $data['perPage'] > 0){
            $perPage = $data['perPage'];
        }
        $getProducts =  $this->with(['getProductAttributes','getProductImages','getProductOptions','getProductSpecification','getCategory','getBrand']);

        if (isset($request['created_by'])) {
            $getProducts = $getProducts->where('created_by', $request['created_by']);
        }

        if (isset($request['period']) && $request['period']!='0') {
            if ($request['period'] == 'current_year') {
                $getProducts = $getProducts->whereYear('created_at', date('Y'));
            }
            if ($request['period'] == 'current_month') {
                $getProducts = $getProducts->whereMonth('created_at', date('m'));
            }
            if ($request['period'] == 'current_week') {
                $getProducts = $getProducts->whereDate('created_at', '>=', Carbon::now()->startOfWeek()->format('Y-m-d'))
                    ->whereDate('created_at', '<=', Carbon::now()->format('Y-m-d'));
            }
            if ($request['period'] == 'current_day') {
                $getProducts = $getProducts->whereDate('created_at', Carbon::now()->format('Y-m-d'));
            }
        }

        if (isset($request['brand_id'])) {
            $getProducts = $getProducts->where('brand_id', $request['brand_id']);
        }

        if (isset($request['category_id'])) {
            $getProducts = $getProducts->where('category_id', $request['category_id']);
        }

        if (isset($request['period']) && $request['period']=='0' && isset($request['date'])) {
            $dates = explode("-", $request['date']);
            $from_date = $dates[0];
            $to_date = $dates[1];
            $getProducts = $getProducts->whereDate('created_at', '>=', $from_date )->whereDate('created_at', '<=', $to_date);
        }

        if (isset($data['orderBy']) && isset($data['sortBy'])) {
            $getProducts = $getProducts->orderBy($request['sortBy'], $request['orderBy']);
        }

        if(!empty($data['search'])){
            $getProducts=$getProducts->where('name','like','%'.$data['search'].'%')
            ->orWhere('barcode','like','%'.$data['search'].'%')
            ->orWhere('product_code','like','%'.$data['search'].'%')
            ->orWhere('id','like','%'.$data['search'].'%')
            ->orWhereHas('getBrand', function($query) use ($data) {
                $query->where('name','like','%'.$data['search'].'%');
            })->orWhereHas('getCategory', function($query) use ($data) {
                $query->where('name','like','%'.$data['search'].'%');
            });
        }

        if (isset($data['perPage']) && $data['perPage'] == 'all') {
            $getProducts = $getProducts->get();
        } else {
            $getProducts = $getProducts->paginate($perPage);
        }

        if (isset($request['response_type'])) {
            $columns = $request['excel_fields'];
            $rows = [];
            foreach ($getProducts->toArray() as $product) {
                $row = [];
                foreach ($request['excel_db_columns'] as $index => $excel) {
                    $row[$index] = null;
                    if (isset($excel['table'])) {
                        $row[$index] = $product[$excel['table']];
                    }
                    if (isset($excel['column'])) {
                        $row[$index] = $row[$index] 
                            ? $row[$index][$excel['column']]
                            : $product[$excel['column']];
                    }
                }
                array_push($rows, array_values($row));
            }
            return ExcelResponse::export('products', $rows, $columns, 'products');
        }
        
        return $getProducts;
    }

    public function getBestSellerProducts($request){
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }
        $items_query = $this->withCount(['orderItems' => function($query){
            $query->select(DB::raw('SUM(quantity)'));
        }])->having('order_items_count', '>', 0)->with(['orderItems', 'getProductImages']);

        if (isset($request['search'])) {
            $items_query->where('name', 'LIKE', "%{$request['search']}%");
        }

        if (isset($request['created_by'])) {
            $items_query->where('created_by', $request['created_by']);
        }

        $items_query->orderBy('order_items_count', 'desc');

        // Excel Download
        if (isset($request['response_type'])) {
            $items = $items_query->get();
            $columns = ['Product_id', 'Product Name', 'Total Quantity', 'Total Price'];
            $rows = [];
            foreach($items->toArray() as $item){
                array_push($rows, [
                    $item['id'],
                    $item['name'], 
                    $item['order_items_count'], 
                    $item['discount_price']
                ]);
            }
            return ExcelResponse::export('BestSellerItems', $rows, $columns, 'BestSellerItems');
        }

        return $items_query->paginate($perPage);
    }

    public function getNeverPurchasedProducts($request){
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $items_query = $this->withCount('orderItems')->having('order_items_count', '==', 0)
            ->with('getProductImages');

        if (isset($request['search'])) {
            $items_query->where('name', 'LIKE', "%{$request['search']}%");
        }

        if (isset($request['brand_id'])) {
            $items_query->where('brand_id', $request['brand_id']);
        }

        if (isset($request['created_by'])) {
            $items_query->where('created_by', $request['created_by']);
        }

        if (isset($request['category_id'])) {
            $items_query->where('category_id', $request['category_id']);
        }

        // Excel Download
        if (isset($request['response_type'])) {
            $items = $items_query->get();
            $columns = ['Product_id', 'Product Image', 'Product Name'];
            $rows = [];
            foreach($items->toArray() as $item){
                array_push($rows, [ 
                    $item['id'], 
                    count($item['get_product_images'])>0 ? env('APP_URL').'public/images/products/'.$item['get_product_images'][0]['image'] : '', 
                    $item['name'] 
                ]);
            }
            return ExcelResponse::export('BestSellerItems', $rows, $columns, 'BestSellerItems');
        }

        $items = $items_query->paginate($perPage);

        return $items;
    }

    public function getProductSaleCost($request){
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $items_query = $this->withCount(['orderItems as total_quantity' => function($query){
            $query->select(DB::raw('SUM(quantity)'));
        }])->withCount(['orderItems as total_price' => function($query){
            $query->select(DB::raw('SUM(price)'));
        }])->withCount('orderItems as total_orders')
        ->having('total_quantity', '>', 0)
        ->with(['orderItems', 'getProductImages']);

        if (isset($request['sort_by']) && isset($request['order'])) {
            $items_query->orderBy($request['sort_by'], $request['order']);
        }

        if (isset($request['created_by'])) {
            $items_query->where('created_by', $request['created_by']);
        }

        if (isset($request['search'])) {
            $items_query->where('name', 'LIKE', "%{$request['search']}%");
        }

        if (isset($request['period']) && $request['period']!='0') {
            if ($request['period'] == 'current_year') {
                $items_query->whereYear('created_at', date('Y'));
            }
            if ($request['period'] == 'current_month') {
                $items_query->whereMonth('created_at', date('m'));
            }
            if ($request['period'] == 'current_week') {
                $items_query->whereDate('created_at', '>=', Carbon::now()->startOfWeek()->format('Y-m-d'))
                    ->whereDate('created_at', '<=', Carbon::now()->format('Y-m-d'));
            }
            if ($request['period'] == 'current_day') {
                $items_query->whereDate('created_at', Carbon::now()->format('Y-m-d'));
            }
        }  

        if (isset($request['period']) && $request['period']=='0' && isset($request['date'])) {
            $dates = explode("-", $request['date']);
            $from_date = $dates[0];
            $to_date = $dates[1];
            $items_query->whereDate('created_at', '>=', $from_date )->whereDate('created_at', '<=', $to_date);
        }

        // Excel Download
        if (isset($request['response_type'])) {
            if (isset($request['excel_limit'])) {
                $items_query->limit($request['excel_limit']);
            }
            $order_items = $items_query->withTrashed()->get();
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
            return ExcelResponse::export('ProductSaleCostReport', $rows, $columns, 'ProductSaleCostReport');
        }

        return $items_query->withTrashed()->paginate($perPage);
    }

    public function deleteProducts($request){
        if ($request['product_id']) {
            return $this->where('id', $request['product_id'])->delete();
        }

        if ($request['product_ids']) {
            return $this->whereIn('id', $request['product_ids'])->delete();
        }
        
        return true;
    }
}
