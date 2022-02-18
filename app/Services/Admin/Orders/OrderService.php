<?php
namespace App\Services\Admin\Orders;

use App\Models\Admin\Order;
use App\Models\Admin\OrderAddress;
use App\Models\Admin\OrderDiscount;
use App\Models\Admin\OrderInvoice;
use App\Models\Admin\OrderItem;
use App\Models\Admin\OrderItemStatus;
use App\Models\Admin\OrderPayment;
use App\Models\Admin\OrderPickupLocation;
use App\Models\Admin\OrderStatusShipping;
use App\Models\Admin\OrderUser;
use App\Models\Admin\OrderFollowUp;
use App\Models\Admin\Complaint;
use Illuminate\Support\Str;
use Response,Helper,Validator;

class OrderService
{ 
    function __construct(
		Order $order,
		OrderAddress $orderAddress,
		OrderDiscount $orderDiscount,
		OrderInvoice $orderInvoice,
		OrderItem $orderItem,
		OrderItemStatus $orderItemStatus,
		OrderPayment $orderPayment,
		OrderPickupLocation $orderPickupLocation,
		OrderStatusShipping $orderStatusShipping,
		OrderUser $orderUser,
		OrderFollowUp $orderFollowUp,
		Complaint $complaint
	){
		$this->order = $order;
		$this->orderAddress = $orderAddress;
		$this->orderDiscount = $orderDiscount;
		$this->orderInvoice = $orderInvoice;
		$this->orderItem = $orderItem;
		$this->orderItemStatus = $orderItemStatus;
		$this->orderPayment = $orderPayment;
		$this->orderPickupLocation = $orderPickupLocation;
		$this->orderStatusShipping = $orderStatusShipping;
		$this->orderUser = $orderUser;
		$this->orderFollowUp = $orderFollowUp;
		$this->complaint = $complaint;
	}

	public function getOrdersCount($request){
		$getOrdersCount = $this->order->getOrdersCount($request);
		return Response::json(['status'=>200,'data'=>$getOrdersCount]);
	}

    public function getOrders($request){
		$getOrders = $this->order->getOrders($request);
		return Response::json(['status'=>200,'data'=>$getOrders]);
	}

	public function getOrder($request){
		$getOrder = $this->order->getOrder($request);
		return Response::json(['status'=>200,'data'=>$getOrder]);
	}

	public function insertOrderFollowUp($request){
		$order_follow_up = $this->orderFollowUp->insertOrderFollowUp($request); 
		return Response::json(['status'=>200,'data'=>$order_follow_up]);
	}

	public function updateOrder($request){
		if (isset($request['order_status_shipping'])){
			$this->orderStatusShipping->updateOrderStatusShipping($request['order_status_shipping']); 
		}
		if (isset($request['order_payment'])){
			$this->orderPayment->updateOrderPayment($request['order_payment']); 
		}
		return Response::json([ 'status'=> 200,'data'=> '', 'message' => 'Succefully updated' ]);
	}

	public function addOrder($request){
		$validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'dob' => 'required',
            'mobile' => 'required|integer'
        ]);

        if($validator->fails()){
            return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
        }
		
		$order = $this->order->addOrder($request); 
		return Response::json(['status'=>200,'data'=>$order]);
	}

	public function getIncompleteOrders($request){
		$getIncompleteOrders = $this->order->getIncompleteOrders($request);
		return Response::json(['status'=>200,'data'=>$getIncompleteOrders]);
	}

	public function getComplaints($request){
		$getComplaints = $this->order->getComplaints($request);
		return Response::json(['status'=>200,'data'=>$getComplaints]);
	}

	public function getCountryReport($request){
		$getCountryReport = $this->orderAddress->getCountryReport($request);
		return Response::json(['status'=>200,'data'=>$getCountryReport]);
	}

	public function createComplaint($request) {
		$validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
		$complaint = $this->complaint->createComplaint($request);
		return Response::json(['status'=>200,'data'=>$complaint]);
	}
	
}
