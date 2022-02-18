<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class CartPickupLocation extends Model
{

    use HasFactory;
    use SoftDeletes;
    
    public function savePickupLocationInCart($data){
    	return $this->insert($data);
    }
    public function updatePickupLocationInCart($id,$data){
    	return $this->where('id',$id)->update($data);
    }
    public function getCartPickupLocation($cart_id){
    	return $this->where('cart_id',$cart_id)->first();
    }
    public function deletePickupLocationByCartId($cart_id){
    	return $this->where('cart_id',$cart_id)->delete();

    }

 }