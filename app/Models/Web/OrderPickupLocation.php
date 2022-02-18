<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class OrderPickupLocation extends Model
{

    use HasFactory;
    use SoftDeletes;
    
    public function savePickupLocationInOrder($data){
    	return $this->insert($data);
    }
    public function updatePickupLocationInOrder($id,$data){
    	return $this->where('id',$id)->update($data);
    }
    public function getOrderPickupLocation($order_id){
    	return $this->where('order_id',$order_id)->first();
    }
    public function deletePickupLocationByOrderId($order_id){
    	return $this->where('order_id',$order_id)->delete();

    }

 }