<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  

class Cart extends Model
{

    use HasFactory;
     use SoftDeletes;

    public function getCartItems(){
        return $this->hasMany(CartItem::class,'cart_id','id')->where('active',1)->with('getProduct');
    } 
    public function getCartPickupLocation(){
        return $this->hasOne(CartPickupLocation::class,'cart_id','id');
    }
    public function getCartAddress(){
        return $this->hasOne(CartAddress::class,'cart_id','id');
    } 
    public function getUser(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function getCoupon() {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }
    public function getAppliedCoupons() {
        return $this->hasMany(AppliedCoupon::class, 'user_id', 'user_id');
    }
    public function getGiftCertificate() {
        return $this->belongsTo(GiftCertificate::class, 'gift_certificate_id');
    }
    public function getAppliedGifts() {
        return $this->hasMany(AppliedGift::class, 'user_id', 'user_id');
    }
    public function getCartBySession($getSessionId){
    	return $this->where('session_id',$getSessionId)
            ->with(['getCartItems','getCartPickupLocation','getCartAddress','getUser', 'getCoupon', 'getGiftCertificate' ])
            ->withCount('getAppliedCoupons')
            ->withCount('getAppliedGifts')
            ->first();
    }

    public function getCartById($cart_id){
        return $this->where('id',$cart_id)->first();
    }
    
    public function saveCart($data){
    	return $this->insertGetId($data);
    }
    public function updateCart($id,$data){
        unset($data['cart_id']);
    	return $this->where('id',$id)->update($data);
    }

}
