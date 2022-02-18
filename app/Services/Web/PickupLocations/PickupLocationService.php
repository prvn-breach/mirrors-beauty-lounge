<?php
namespace App\Services\Web\PickupLocations;
use App\Models\Web\PickupLocation;
use App\Models\Web\Cart;
use App\Models\Web\CartPickupLocation;
use App\Models\Web\Order;
use App\Models\Web\OrderPickupLocation;
use Response;
use Helper;

class PickupLocationService
{
	function __construct(PickupLocation $getPickupLocation,Cart $getCart,CartPickupLocation $getCartPickupLocation,Order $getOrder,OrderPickupLocation $getOrderPickupLocation){
		$this->getPickupLocation = $getPickupLocation;
		$this->getCart = $getCart;
		$this->getCartPickupLocation = $getCartPickupLocation;
		$this->getOrder = $getOrder;
		$this->getOrderPickupLocation = $getOrderPickupLocation;
 	}

 	public function savePickupLocationInCart($request){
 		$data = $request->all();
 		$getPickup = $data['pickup'];
 		unset($getPickup['created_at']);
 		unset($getPickup['updated_at']);
 		unset($getPickup['deleted_at']);
 		$getPickup['pickup_id'] = $getPickup['id'];
 		unset($getPickup['id']);
 		$getPickup['user_id'] = $data['user_id'];
 		$getCart = $this->getCart->getCartBySession($data['session_id']);
 		if($getCart != null){
 			$this->getCart->updateCart($getCart->id,['user_id'=>$data['user_id']]);
 			$getPickup['cart_id'] = $getCart->id;
 			$getCartPickupLocation=$this->getCartPickupLocation->getCartPickupLocation($getCart->id);
 			if($getCartPickupLocation != null){
 				$this->getCartPickupLocation->updatePickupLocationInCart($getCartPickupLocation->id,$getPickup);
 			}else{
 				
 				$this->getCartPickupLocation->savePickupLocationInCart($getPickup);
 			}
 		}
 		return Response::json(['status'=>200,'message'=>'Saved Successfully']);
 	}
 	public function getPickupLocations(){
 		$getPickupLocation = $this->getPickupLocation->getPickupLocations();
 		return Response::json(['status'=>200,'data'=>$getPickupLocation]);
 	}
 	public function getPickupLocation($pickup_id){
 		$getPickupLocation = $this->getPickupLocation->getPickupLocation($pickup_id);
 		return Response::json(['status'=>200,'data'=>$getPickupLocation]);
 	}
 	public function deletePickupLocationByCartId($request){
 		$data = $request->all();
 		$getOrderData = $this->getOrder->getOrderBySession($data['session_id']);
		if($getOrderData != null){
			
			if($getOrderData->getPickupLocation != null){
				$this->getOrderPickupLocation->deletePickupLocationByOrderId($getOrderData->id);
			}
		}
 		$getPickupLocation = $this->getCartPickupLocation->deletePickupLocationByCartId($data['cart_id']);
 		return Response::json(['status'=>200,'data'=>$getPickupLocation]);
 	}

 	

}