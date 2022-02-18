<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class OrderDiscount extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getOrderDiscounByOrderId($order_id){
    	return $this->where('order_id',$order_id)->first();
    }
    
    public function saveOrderDiscount($data){
    	return $this->insertGetId($data);
    }
    public function updateOrderDiscount($id,$data){
    	return $this->where('id',$id)->update($data);
    }

}
