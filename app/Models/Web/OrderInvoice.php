<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class OrderInvoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getOrderInvoiceByOrderId($order_id){
    	return $this->where('order_id',$order_id)->first();
    }
    
    public function saveOrderInvoice($data){
    	return $this->insertGetId($data);
    }
    public function updateOrderInvoice($id,$data){
    	return $this->where('id',$id)->update($data);
    }

}
