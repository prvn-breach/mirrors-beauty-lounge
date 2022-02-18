<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class OrderUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getOrderUserById($order_id){
    	return $this->where('order_id',$order_id)->first();
    }
    
    public function saveOrderUserItem($data){
    	return $this->insertGetId($data);
    }
    public function updateOrderUserItem($id,$data){
    	return $this->where('id',$id)->update($data);
    }

}
