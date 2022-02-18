<?php
namespace App\Models\Admin;

use DB;
use App\Helpers\ExcelResponse;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\ProductCatlog;

class ProductWishList extends Model
{
    
    public function getWishlistCountByUser($request){
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }
        $user_items_query = $this->select('user_id', DB::raw('COUNT(id) as count'))
            ->with('user')->whereNull('deleted_at');
        
        if (isset($request['created_by'])) {
            $product_ids = ProductCatlog::where('created_by', $request['created_by'])->pluck('id');
            $user_items_query->whereIn('product_id', $product_ids);
        }

        if (isset($request['search'])) {
            $user_items_query->whereHas('user', function($query) use ($request){
                $query->where('email', 'LIKE', "%{$request['search']}%")
                    ->orWhere('name', 'LIKE', "%{$request['search']}%");
            });
        }

        $user_items_query = $user_items_query->groupBy('user_id');

        // Excel Download
        if (isset($request['response_type'])) {
            $user_items = $user_items_query->get();
            $columns = [ 'Customer ID', 'Customer Name', 'Email ID', 'Products', 'Added On', 'Total Items' ];
            $rows = [];
            foreach ($user_items as $user) {
                $product_names = '';
                array_push($rows, [ $user['user']['id'], $user['user']['name'], $user['user']['email'], $product_names, $user['created_at'], $user['count'] ]);
            }
            return ExcelResponse::export('WishList', $rows, $columns, 'WishList');
        }
        $user_items = $user_items_query->paginate($perPage);

        return $user_items;
    }

    public function product(){
    	return $this->hasOne(ProductCatlog::class,'id','product_id')->with('getProductImages');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}