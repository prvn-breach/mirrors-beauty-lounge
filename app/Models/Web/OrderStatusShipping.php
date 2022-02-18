<?php
namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Web\Order;
use Illuminate\Support\Facades\Mail;

class OrderStatusShipping extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $statuses = [
        'N' => 'NEW',
        'V' => 'CONFIRMED',
        'S' => 'SHIPPED',
        'D' => 'DELIVERED',
        'C' => 'CANCELLED',
        'R' => 'RETURNED'
    ];

    public function saveStatusOrder($request){
        $count = $this->where('order_id', $request['order_id'])->whereNotNull('return_id')->count();
        $data = $request->all();
        if (isset($data['status']) && $data['status'] == 'R' && $count == 0) {
            $data['return_id'] = uniqid();
            $data['return_status'] = 'PENDING';
        }

        $update_status = $this->where('order_id',$data['order_id'])->update($data);

        $order = Order::where('id', $request['order_id'])->with([
            'getItems', 'getPickupLocation', 'getAddress', 'getDiscount',
            'getInvoice', 'getUser', 'getPayment', 'getStatusShipping',
            'getStatusShippings', 'getComplaints'
        ])->first();

        // Send Email
        if ($update_status) {
            $status = $this->statuses[$request['status']];
            switch ($status) {
                case 'CANCELLED':
                    $subject = $order['id'];
                    $email = $order['getUser']['email'];
                    Mail::send('OrderCancelled', [
                        'order' => $order,
                    ], function($message) use ($email, $subject){
                        $message->to($email);
                        $message->subject($subject);
                    });
                    break;
                case 'RETURNED':
                    $subject = $order['id'];
                    $email = $order['getUser']['email'];
                    Mail::send('OrderReturned', [
                        'order' => $order,
                    ], function($message) use ($email, $subject){
                        $message->to($email);
                        $message->subject($subject);
                    });
                    break;
                default:
                    break;
            }
        }
    }
    public function getOrderShipping($order_id){
        return $this->where('order_id',$order_id)->first();
    }
    
    public function saveOrderShipping($data){
    	return $this->insertGetId($data);
    }
    public function updateOrderShipping($id,$data){
    	return $this->where('id',$id)->update($data);
    }

}
