<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
use DB;
class OrderItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getProduct() {
        return $this->hasOne(ProductCatlog::class, 'id', 'product_id')->with('getProductImages');
    }

    public function getBrand() {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
    
    public function getItemStatus(){
        return $this->hasOne(OrderItemStatus::class,'item_id','id');
    } 
    public function getReview(){
        return $this->hasOne(Review::class,'product_id','product_id');
    }
    
    
    public function getOrderById($order_id){
    	return $this->where('order_id',$order_id)->get();
    }

    public function getItemCartById($cart_item_id){
        return $this->where('cart_item_id',$cart_item_id)->first();
    }
    
    public function saveOrderItem($data){
    	return $this->insertGetId($data);
    }
    public function updateOrderItem($id,$data){
    	return $this->where('id',$id)->update($data);
    }

    public function deleteOrderItem($id){
        return $this->where('id',$id)->delete();
    }

}
