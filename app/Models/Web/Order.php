<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
use App\Models\Web\Review;

class Order extends Model
{

    use HasFactory;
     use SoftDeletes;

    public function getItems(){
        return $this->hasMany(OrderItem::class,'order_id','id')->where('active',1)->with('getItemStatus','getReview', 'getBrand', 'getProduct');
    } 
    public function getPickupLocation(){
        return $this->hasOne(OrderPickupLocation::class,'order_id','id');
    }
    public function getAddress(){
        return $this->hasOne(OrderAddress::class,'order_id','id');
    }
    public function getDiscount(){
        return $this->hasOne(OrderDiscount::class,'order_id','id');
    } 
    public function getInvoice(){
        return $this->hasOne(OrderInvoice::class,'order_id','id');
    }
    public function getUser(){
        return $this->hasOne(OrderUser::class,'order_id','id');
    }
    public function getPayment(){
        return $this->hasOne(OrderPayment::class,'order_id','id');
    }
    public function getStatusShipping(){
        return $this->hasOne(OrderStatusShipping::class,'order_id','id')->orderBy('step','DESC');
    }
    public function getStatusShippings(){
        return $this->hasMany(OrderStatusShipping::class,'order_id','id')->orderBy('step','DESC');
    }
    public function getComplaints(){
        return $this->hasMany(Complaint::class)->with('user');
    }
    public function getOrderBySession($getSessionId){
    	$order = $this->where('session_id',$getSessionId)->with([
            'getItems',
            'getPickupLocation',
            'getAddress',
            'getDiscount',
            'getInvoice',
            'getUser',
            'getPayment',
            'getStatusShipping',
            'getStatusShippings',
            'getComplaints'
        ])->first();

        if (isset($order['getItems'])) {
            foreach($order['getItems'] as $item) {
                $item->unsetRelation('getReview');
                $item['get_review'] = Review::where('user_id', $order['user_id'])->where('product_id', $item['product_id'])->first();
            }
        }
        return $order;
    }
    public function getOrderByUserId($user_id){
        return $this->where('user_id',$user_id)->with([
            'getItems',
            'getPickupLocation',
            'getAddress',
            'getDiscount',
            'getInvoice',
            'getUser',
            'getPayment',
            'getStatusShipping',
            'getStatusShippings',
            'getComplaints'
        ])->orderBy('id','DESC')->get();
    }

    public function getOrderById($cart_id){
        return $this->where('id',$cart_id)->first();
    }
    
    public function saveOrder($data){
    	return $this->insertGetId($data);
    }
    public function updateOrder($id,$data){
    	return $this->where('id',$id)->update($data);
    }

}
