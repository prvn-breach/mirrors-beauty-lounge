<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class OrderAddress extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getOrderAddressById($order_id){
    	return $this->where('id',$cart_id)->first();
    }
    public function getOrderAddress($cart_id){
        return $this->where('cart_id',$cart_id)->first();
    }
    public function deleteOrderAddress($order_id){
      
        return $this->where('order_id',$order_id)->delete();
    } 
   
    
    public function saveOrderAddress($data){
    	return $this->insertGetId($data);
    }
    public function updateOrderAddressItem($id,$data){
    	return $this->where('id',$id)->update($data);
    }

}
