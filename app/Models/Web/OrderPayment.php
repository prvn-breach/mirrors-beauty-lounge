<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class OrderPayment extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getOrderPayment($order_id){
    	return $this->where('order_id',$order_id)->first();
    }
    
    public function saveOrderPayment($data){
    	return $this->insertGetId($data);
    }
    public function updateOrderPayment($id,$data){
    	return $this->where('id',$id)->update($data);
    }

}
