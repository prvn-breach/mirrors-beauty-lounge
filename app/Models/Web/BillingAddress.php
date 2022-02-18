<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class BillingAddress extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getBillingAddressById($Billing_id){
    	return $this->where('id',$cart_id)->first();
    }
    public function getBillingAddress($cart_id){
        return $this->where('cart_id',$cart_id)->first();
    }
    public function deleteBillingAddress($order_id){
      
        return $this->where('order_id',$order_id)->delete();
    } 
   
    
    public function saveBillingAddress($data){
    	return $this->insertGetId($data);
    }
    public function updateBillingAddressItem($id,$data){
    	return $this->where('id',$id)->update($data);
    }

}
