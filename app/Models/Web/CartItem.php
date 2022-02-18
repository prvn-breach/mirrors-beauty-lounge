<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class CartItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getProduct() {
        return $this->belongsTo(ProductCatlog::class, 'product_id');
    }
   
    public function getITemByCartId($cart_id){
    	return $this->where('cart_id',$cart_id)->get();
    }
    
    public function getCartItemByCartId($product_id,$cart_id){
        return $this->where('cart_id',$cart_id)->where('product_id',$product_id)->first();
    }
    
    public function saveCartItem($data){
    	return $this->insertGetId($data);
    }
    public function updateCartItem($id,$data){
    	return $this->where('id',$id)->update($data);
    }

    public function deleteCartItem($id){
        return $this->where('id',$id)->delete();
    }

}
