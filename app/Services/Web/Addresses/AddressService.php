<?php
namespace App\Services\Web\Addresses;
use App\Models\Web\UserAddress;
use App\Models\Web\CartAddress;
use App\Models\Web\Cart;
use App\Models\Web\Order;
use App\Models\Web\OrderAddress;
use Response,Helper,Validator;

class AddressService
{
	function __construct(
		UserAddress $getUserAddress,
		Cart $getCart,
		CartAddress $getCartAddress,
		Order $getOrder,OrderAddress $getOrderAddress){
		$this->getUserAddress = $getUserAddress;
		$this->getCart = $getCart;
		$this->getCartAddress = $getCartAddress;
		$this->getOrder = $getOrder;
		$this->getOrderAddress = $getOrderAddress;
 	}

 	public function saveCartAddress($request){
 		$data = $request->all();
 		$getAddress = $data['address'];
 		unset($getAddress['created_at']);
 		unset($getAddress['status']);
 		unset($getAddress['updated_at']);
 		unset($getAddress['deleted_at']);
 		$getAddress['address_id'] = $getAddress['id'];
 		unset($getAddress['id']);
 		$getCart = $this->getCart->getCartBySession($data['session_id']);
 		if($getCart != null){
 			$this->getCart->updateCart($getCart->id,['user_id'=>$data['user_id']]);
 			$getAddress['cart_id'] = $getCart->id;
 			if($getCart['getCartAddress'] && ($getAddress['address_id'] == $getCart['getCartAddress']['address_id'])){
 				$getOrderData = $this->getOrder->getOrderBySession($data['session_id']);
 				if($getOrderData != null){
 					if($getOrderData->getAddress != null){
 						$this->getOrderAddress->deleteOrderAddress($getOrderData->id);
 					}
 				}
 				$this->getCartAddress->deleteCartAddress($getCart->id);
 			}else if ($getCart['getCartAddress'] && ($getAddress['address_id']!=$getCart['getCartAddress']['address_id'])) {
				$this->getCartAddress->deleteCartAddress($getCart->id);
				$this->getCartAddress->saveCartAddress($getAddress);
			}else{
 				$this->getCartAddress->saveCartAddress($getAddress);
 			}
 		}
 		return Response::json(['status'=>200,'data'=>'saved successfully']);
 	}
 	public function saveAddress($request){
		// $validator = Validator::make($request->all(), [
		// 	'address' => 'required',
		// 	'city' => 'required|string',
		// 	'country' => 'required|string',
		// 	'mobile' => 'required|integer',
		// 	'postal_code' => 'required|integer',
		// 	'state' => 'required|string',
		// 	'status' => 'required',
		// 	'telephone' => 'required|integer',
		// 	'type' => 'required|string',
		// 	'user_id' => 'required|integer|exists:users,id'
        // ]);
        // if($validator->fails()){
        //     return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        // }
 		$data = $request->all();
 		$id = $data['id'];
 		unset($data['id']);
 		if($id == null){
 			$getAddressResponse = $this->getUserAddress->saveAddress($data);
 		}else{
 			$this->getUserAddress->updateAddress($id,$data);
 		}
 		return Response::json(['status'=>200,'data'=>'saved successfully']);
 	}

 	public function getAddresses($user_id){
 		$getAddresses = $this->getUserAddress->getAddresses($user_id);
 		return Response::json(['status'=>200,'data'=>$getAddresses]);
 	}
 	public function getAddressById($address_id){
 		$getAddresses = $this->getUserAddress->getAddressById($address_id);
 		if($getAddresses != null){
 			unset($getAddresses->created_at);
 			unset($getAddresses->deleted_at);
 			unset($getAddresses->updated_at);

 		}
 		return Response::json(['status'=>200,'data'=>$getAddresses]);
 	}
 	public function deleteAddressById($request){
 		$data = $request->all();

 		$getAddresses = $this->getUserAddress->deleteAddressById($data['address_id']);
 		return Response::json(['status'=>200,'data'=>'Deleted successfully']);
 	}

}