<?php
namespace App\Services\Web\OrderConfirm;
use App\Models\Web\Order;
use App\Models\Web\OrderStatusShipping;
use Response;
use Helper;

class ConfirmService
{
	function __construct(Order $getOrder,OrderStatusShipping $getOrderStutusShipping){
		$this->getOrder = $getOrder;
		$this->getOrderStutusShipping = $getOrderStutusShipping;
 	}

 	public function saveStatusOrder($request){
 		$getOrder = $this->getOrderStutusShipping->saveStatusOrder($request);
 		return Response::json(['status'=>200,'data'=>'Saved successfully']);
 	}
 	public function getOrder($session_id){
 		$getOrder = $this->getOrder->getOrderBySession($session_id);
 		return Response::json(['status'=>200,'data'=>$getOrder]);
 	}

 	public function getOrderByUser($user_id){
 		$getOrder = $this->getOrder->getOrderByUserId($user_id);
 		
 		return Response::json(['status'=>200,'data'=>$getOrder]);
 	}
 	
 	

}