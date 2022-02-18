<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\ExcelResponse;
use Carbon\Carbon;
use DB;

class CartItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function product(){
        return $this->hasOne(ProductCatlog::class, 'id', 'product_id')->with(['getBrand', 'getCategory']);
    }

    public function getProductVisits($request) {
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $cart_item_query = $this->select('product_id', DB::raw('COUNT(*) as count'))
            ->withTrashed()->groupBy(['product_id'])->with('product');
        
        if (isset($request['search'])) {
            $cart_item_query->whereHas('product', function ($query) use ($request){
                $query->where('product_name', 'LIKE',"%{$request['search']}%");
            });
        }

        if (isset($request['created_by'])) {
            $cart_item_query->whereHas('product', function ($query) use ($request){
                $query->where('created_by', $request['created_by']);
            });
        }

        if (isset($request['period']) && $request['period']!='0') {
            if ($request['period'] == 'current_year') {
                $cart_item_query->whereYear('created_at', date('Y'));
            }
            if ($request['period'] == 'current_month') {
                $cart_item_query->whereMonth('created_at', date('m'));
            }
            if ($request['period'] == 'current_week') {
                $cart_item_query->whereDate('created_at', '>=', Carbon::now()->startOfWeek()->format('Y-m-d'))
                    ->whereDate('created_at', '<=', Carbon::now()->format('Y-m-d'));
            }
            if ($request['period'] == 'current_day') {
                $cart_item_query->whereDate('created_at', Carbon::now()->format('Y-m-d'));
            }
        }  

        if (isset($request['period']) && $request['period']=='0' && isset($request['date'])) {
            $dates = explode("-", $request['date']);
            $from_date = $dates[0];
            $to_date = $dates[1];
            $cart_item_query->whereDate('created_at', '>=', $from_date )->whereDate('created_at', '<=', $to_date);
        }

        // Excel Download
        if (isset($request['response_type'])) {
            $cart_items = $cart_item_query->get();
            $columns = ['Product_id', 'Product Name', 'Product Code', 'Brand', 'Category', 'Product Price', 'Views', 'Year'];
            $rows = [];
            foreach($cart_items->toArray() as $item){
                array_push($rows, [
                    $item['product_id'],
                    $item['product']['name'], 
                    $item['product']['product_code'], 
                    $item['product']['get_brand']['name'], 
                    $item['product']['get_category']['name'], 
                    $item['product']['sale_price'], 
                    $item['count'],
                    Carbon::parse($item['product']['created_at'])->format('Y'),
                ]);
            }
            return ExcelResponse::export('ProductVisits', $rows, $columns, 'ProductVisits');
        }

        return $cart_item_query->paginate($perPage);
    }
}
