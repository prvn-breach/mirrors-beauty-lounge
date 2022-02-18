<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\ExcelResponse;
use App\Models\Admin\ProductCatlog;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function cartItems(){
        return $this->hasMany(CartItem::class);
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getCarts($request){
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }
        
        $carts_query = $this->withCount(['cartItems' => function ($query) use ($request) {
            if (isset($request['created_by'])) {
                $product_ids = ProductCatlog::where('created_by', $request['created_by'])->pluck('id');
                $query->whereIn('product_id', $product_ids);
            }
        }])->having('cart_items_count', '>', 0)->with(['user'])->whereNull('updated_at');
        
        $carts_query = $carts_query->with(['cartItems' => function ($query) use ($request) {
            if (isset($request['created_by'])) {
                $product_ids = ProductCatlog::where('created_by', $request['created_by'])->pluck('id');
                $query->whereIn('product_id', $product_ids);
            }
        }]);

        if (isset($request['search'])) {
            $carts_query->whereHas('user', function($query) use ($request){
                $query->where('email', 'LIKE', "%{$request['search']}%")
                    ->orWhere('name', 'LIKE', "%{$request['search']}%");
            });
        }

        // Excel Download
        if (isset($request['response_type'])) {
            $carts = $carts_query->get();
            $columns = [ 'Customer ID', 'Customer Name', 'Email ID', 'Products', 'Added On', 'Total Items' ];
            $rows = [];
            foreach ($carts as $cart) {
                $product_names = implode(", ",$cart['cartItems']->pluck('product_name')->toArray());
                array_push($rows, [ $cart['user']['id'], $cart['user']['name'], $cart['user']['email'], $product_names, $cart['created_at'], $cart['cart_items_count'] ]);
            }
            return ExcelResponse::export('Carts', $rows, $columns, 'Carts');
        }

        $carts = $carts_query->paginate($perPage);

        return $carts;
    }
}
