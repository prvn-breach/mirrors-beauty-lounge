<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

     protected $fillable = [
        'first_name',
        'name',
        'last_name',
        'email',
        'password',
        'mobile',
        'dob'
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function updateUser($id,$data){
        return $this->where('id',$id)->update($data);
    }
    
    public function getUser($id){
        return $this->where('id',$id)->first();
    }

    public function orders(){
        return $this->hasMany(Order::class)->with(['orderPayment', 'orderStatusShipping']);
    }

    public function userWithPayments(){
        return $this->hasOne(OrderPayment::class);
    }

    public function userAddresses(){
        return $this->hasMany(UserAddress::class);
    }

    public function cart(){
        return $this->hasOne(Cart::class)->with('cartItems')->whereNull('updated_at');
    }

    public function productWishlist(){
        return $this->hasMany(ProductWishList::class)->whereNull('deleted_at')->with('product');
    }

    public function userActivity(){
        return $this->hasMany(UserActivity::class);
    }

    public function latestUserActivity(){
        return $this->hasOne(UserActivity::class)->whereNotNull('logout')->latest();
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
