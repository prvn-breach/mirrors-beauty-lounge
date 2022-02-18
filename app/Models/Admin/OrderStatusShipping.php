<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Helpers\ExcelResponse;
use Carbon\Carbon;
use DB;
use App\Mail\GenericMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\User;
use App\Models\Web\Order as WebOrder;

class OrderStatusShipping extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'order_id', 'step', 'status', 'delivered_date', 'complaint_status', 'comments', 'weight', 'return_id', 'reason', 'return_status' ];

    public $statuses = [
        'N' => 'NEW',
        'V' => 'CONFIRMED',
        'S' => 'SHIPPED',
        'D' => 'DELIVERED',
        'C' => 'CANCELLED',
        'R' => 'RETURNED'
    ];

    protected $casts = [
        'created_at' => 'date: Y-m-d H:i:s'
    ];

    public function updateOrderStatusShipping($request){
        $count = $this->where('order_id', $request['order_id'])->whereNotNull('return_id')->count();
        if (isset($request['status']) && $request['status'] == 'R' && $count == 0) {
            $request['return_id'] = uniqid();
            $request['return_status'] = 'PENDING';
        }
        $order = WebOrder::where('id', $request['order_id'])->with([
            'getItems', 'getPickupLocation', 'getAddress', 'getDiscount',
            'getInvoice', 'getUser', 'getPayment', 'getStatusShipping',
            'getStatusShippings', 'getComplaints'
        ])->first();
        $update_status = $this->where('order_id', $request['order_id'])->update($request);
        // Send Email
        if ($update_status) {
            $status = $this->statuses[$request['status']];
            switch ($status) {
                case 'CONFIRMED':
                    $subject = $order['id'];
                    $email = $order['getUser']['email'];
                    Mail::send('OrderConfirmed', [
                        'order' => $order,
                    ], function($message) use ($email, $subject){
                        $message->to($email);
                        $message->subject($subject);
                    });
                    break;
                case 'SHIPPED':
                    $subject = $order['id'];
                    $email = $order['getUser']['email'];
                    Mail::send('OrderShipped', [
                        'order' => $order,
                    ], function($message) use ($email, $subject){
                        $message->to($email);
                        $message->subject($subject);
                    });
                    break;
                case 'DELIVERED':
                    $subject = $order['id'];
                    $email = $order['getUser']['email'];
                    Mail::send('OrderDelivered', [
                        'order' => $order,
                    ], function($message) use ($email, $subject){
                        $message->to($email);
                        $message->subject($subject);
                    });
                    break;
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
                    if ($request['return_status'] == 'PENDING') {
                        $subject = $order['id'];
                        $email = $order['getUser']['email'];
                        Mail::send('OrderReturned', [
                            'order' => $order,
                        ], function($message) use ($email, $subject){
                            $message->to($email);
                            $message->subject($subject);
                        });
                    } elseif($request['return_status'] == 'COMPLETED') {
                        $subject = $order['id'];
                        $email = $order['getUser']['email'];
                        Mail::send('OrderReturned', [
                            'order' => $order,
                        ], function($message) use ($email, $subject){
                            $message->to($email);
                            $message->subject($subject);
                        });
                    }
                    break;
                default:
                    break;
            }
        }
    }

    public function getOrderStatusReport($request) {
        // $order_status_query = $this->select('status', DB::raw('COUNT(*) as total_orders'), DB::raw('SUM(order_payments.sub_total) as total_price'))
        $order_status_query = $this->select('order_status_shippings.order_id', 'order_status_shippings.status', 
            'order_status_shippings.created_at', 'order_payments.sub_total')
            ->leftJoin('order_payments', 'order_payments.order_id', '=', 'order_status_shippings.order_id');

        if (isset($request['created_by'])) {
            $products = ProductCatlog::where('created_by', $request['created_by'])->pluck('id');
            $order_status_query = $order_status_query->whereHas('orderItems', function($query) use ($request, $products){
                $query->whereIn('product_id', $products);
            });
        }

        if (isset($request['period']) && $request['period']!='0') {
            if ($request['period'] == 'current_year') {
                $order_status_query = $order_status_query->whereYear('order_status_shippings.created_at', date('Y'));
            }
            if ($request['period'] == 'current_month') {
                $order_status_query = $order_status_query->whereMonth('order_status_shippings.created_at', date('m'));
            }
            if ($request['period'] == 'current_week') {
                $order_status_query = $order_status_query->whereDate('order_status_shippings.created_at', '>=', Carbon::now()->startOfWeek()->format('Y-m-d'))
                    ->whereDate('created_at', '<=', Carbon::now()->format('Y-m-d'));
            }
            if ($request['period'] == 'current_day') {
                $order_status_query = $order_status_query->whereDate('order_status_shippings.created_at', Carbon::now()->format('Y-m-d'));
            }
        }  

        if (isset($request['period']) && $request['period']=='0' && isset($request['date'])) {
            $dates = explode("-", $request['date']);
            $from_date = $dates[0];
            $to_date = $dates[1];
            $order_status_query = $order_status_query->whereDate('order_status_shippings.created_at', '>=', $from_date )->whereDate('order_status_shippings.created_at', '<=', $to_date);
        }

        $order_statuses = $order_status_query->get()->groupBy('status');

        $order_statuses_data = [];

        foreach ($this->statuses as $key => $status) {
            $order_statuses_data[$status] = [
                "status" => $status,
                "total_price" => isset($order_statuses[$key]) ? $order_statuses[$key]->sum('sub_total') : 0
            ];
        }

        // Excel Download
        if (isset($request['response_type'])) {
            $columns = ['Status', 'Total Sale'];
            $rows = [];
            foreach($order_statuses_data as $status => $data){
                array_push($rows, [ $data['status'], $data['total_price'] ]);
            }
            return ExcelResponse::export('OrderStatusReport', $rows, $columns, 'OrderStatusReport');
        }
        return $order_statuses_data;
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }
}