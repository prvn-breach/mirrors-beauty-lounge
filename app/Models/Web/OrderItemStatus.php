<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class OrderItemStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getOrderItem($item_id){
    	return $this->where('item_id',$item_id)->first();
    }
    
    public function saveOrderItemStatus($data){
    	return $this->insertGetId($data);
    }
    public function updateOrderItemStatus($id,$data){
    	return $this->where('id',$id)->update($data);
    }

}
