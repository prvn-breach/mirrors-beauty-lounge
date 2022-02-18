<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class CartAddress extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getCartAddressById($cart_id){
    	return $this->where('id',$cart_id)->first();
    }
    public function getCartAddress($cart_id){
        return $this->where('cart_id',$cart_id)->first();
    }
    public function deleteCartAddress($cart_id){
        return $this->where('cart_id',$cart_id)->delete();
    }
    
    public function saveCartAddress($data){
    	return $this->insertGetId($data);
    }
    public function updateCartAddressItem($id,$data){
    	return $this->where('id',$id)->update($data);
    }

}
