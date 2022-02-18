<?php
namespace App\Services\Web\PlaceOrders;
/*use App\Models\Web\Shipping;
*/
use App\Models\Web\Cart;
use App\Models\Web\CartItem;
use App\Models\Web\Order;
use App\Models\Web\OrderItem;
use App\Models\Web\OrderAddress;
use App\Models\Web\BillingAddress;
use App\Models\Web\OrderPickupLocation;
use App\Models\Web\OrderDiscount;
use App\Models\Web\OrderPayment;
use App\Models\Web\OrderStatusShipping;
use App\Models\Web\OrderUser;
use App\Models\Web\OrderInvoice;
use App\Models\Web\OrderItemStatus;
use App\Models\Web\AppliedCoupon;
use App\Models\Web\AppliedGift;
use App\Models\Web\ProductStock;
use App\Models\Web\ProductCatlog;
use App\Models\Web\Brand;
use App\Models\Web\ProductImage;
use App\Mail\GenericMail;
use Illuminate\Support\Facades\Mail;
use Response;
use Helper;

class PlaceOrderService
{
	function __construct(
		Cart $getCart,
		Order $getOrder,
		OrderItem $getOrderItem,
		CartItem $getCartItem,
		OrderAddress $getOrderAddress,
		BillingAddress $getBillingAddress,
		OrderPickupLocation $getOrderPickupLocation,
		OrderDiscount $getOrderDiscount,
		OrderPayment $getOrderPayment,
		OrderStatusShipping $getOrderStatusShipping,
		OrderUser $getOrderUser,
		OrderInvoice $getOrderInvoice,
		OrderItemStatus $getOrderItemStatus,
		AppliedCoupon $appliedCoupon,
		AppliedGift $appliedGift,
		ProductStock $productStock
	){
		$this->getCart = $getCart;
		$this->getOrder = $getOrder;
		$this->getOrderItem = $getOrderItem;
		$this->getCartItem = $getCartItem;
		$this->getOrderAddress = $getOrderAddress;
		$this->getBillingAddress = $getBillingAddress;
		$this->getOrderPickupLocation = $getOrderPickupLocation;
		$this->getOrderDiscount = $getOrderDiscount;
		$this->getOrderPayment = $getOrderPayment;
		$this->getOrderStatusShipping = $getOrderStatusShipping;
		$this->getOrderUser = $getOrderUser;
		$this->getOrderInvoice = $getOrderInvoice;
		$this->getOrderItemStatus = $getOrderItemStatus;
		$this->appliedCoupon = $appliedCoupon;
		$this->appliedGift = $appliedGift;
		$this->productStock = $productStock;
		$this->order_id = '';
		$this->getCartData = [];
		$this->getData = [];

 	}

 	public function savePlaceOrder($request){
 		$data = $request->all();
 		$getCart = $this->getCart->getCartBySession($data['session_id']);
 		if($getCart != null){
 			$this->getCartData = $getCart;
 			$this->getData = $data;
			$order = array(
				'user_id'=>$getCart->user_id,
				'cart_id'=>$getCart->id,
				'session_id'=>$getCart->session_id,
				'token'=>$getCart->token,
				'vat_percentage'=>$getCart->vat_percentage,
				
			);
			$getOrder = $this->getOrder->getOrderBySession($getCart->session_id);
			if($getOrder == null){
				$this->order_id = $this->getOrder->saveOrder($order);
			}else{
				$this->order_id = $getOrder->id;
				$this->getOrder->updateOrder($getOrder->id,$order);
			}
			$getCartITems = $this->getCartItem->getITemByCartId($getCart->id);
			if($getCartITems->count() > 0){
				foreach($getCartITems as $values){
					$orderItem = [];
					foreach($values->toArray() as $key =>$value ){
						if($key != 'created_at' && $key != 'updated_at' && $key != 'deleted_at' && $key != 'id'){
							$orderItem[$key] = $value;
						}
					}
					// Decrease Quantity
					$product = ProductCatlog::where('id', $values->product_id)->first();
					$product->product_quantity-=$values->quantity;
					$product->update();

					$orderItem['cart_id'] = $getCart->id;
					$orderItem['cart_item_id'] = $values->id;
					$orderItem['order_id'] = $this->order_id;
					$getItemCartById = $this->getOrderItem->getItemCartById($values->id);
					if($getItemCartById== null){
						$getId = $this->getOrderItem->saveOrderItem($orderItem);
					}else{
						$getId = $getItemCartById->id;
						 $this->getOrderItem->updateOrderItem($getItemCartById->id,$orderItem);
					}
					if($getId > 0){
						$this->saveItemStatus($getId);
					}
				}
			}
			$this->saveOrderAddress();
            $this->saveBillingAddress();
			$this->saveOrderPickupLocation();
			$this->saveDiscount();
			$this->savePayment();
			$this->saveShippingStatus();
			$this->saveInvoice();
			$this->saveUser();
			if ($getCart['coupon_id']) {
				$this->appliedCoupon->applyCoupon([ 'user_id' => $getCart['user_id'], 'coupon_id' => $getCart['coupon_id'] ]);
			}
			if ($getCart['gift_certificate_id']) {
				$this->appliedGift->applyGift([ 'user_id' => $getCart['user_id'], 'gift_certificate_id' => $getCart['gift_certificate_id'] ]);
			}

			$cart_items = $getCartITems;
			foreach ($cart_items as $item) {
				$item['product_image'] = ProductImage::where('product_id', $item['product_id'])->first();
				$item['brand'] = Brand::find($item['brand_id']);
			}
			
			$payment_data = [
				'sub_total'=>$this->getData['data']['subTotal'],
				'vat'=>$this->getData['data']['vat'],
				'shipping'=>$this->getData['data']['shippingCharge'],
				'delivery_charge'=>$this->getData['data']['deliveryChange'],
				'payment_mode'=>$this->getData['paymentMode'],
				'total'=>$this->getData['data']['total']
			];

			$url = env('APP_URL').'get-order-details/ae-en/'.$getCart->session_id;
			
			$subject = $this->order_id;
			$email = $getCart['getUser']['email'];
			try {
				Mail::send('OrderPlaced', [
					'cart_items' => $getCartITems,
					'payment_data' => $payment_data,
					'url' => $url,
					'order_id' => $this->order_id
				], function($message) use ($email, $subject){
					$message->to($email);
					$message->subject($subject);
				});
			} catch (Exception $e) {}
				
			return Response::json(['status'=>200,'message'=>'saved successfully','data'=>$this->order_id]);
		}

 	}

 	public function saveItemStatus($getId){
 		if(!empty($this->getData)){
			$saveArray = [
				'user_id'=>$this->getData['user_id'],
				'order_id'=>$this->order_id,
				'item_id'=>$getId,
				'status'=>'P'
			];
			$getOrderItem = $this->getOrderItemStatus->getOrderItem($getId);
			if($getOrderItem == null){
				$this->getOrderItemStatus->saveOrderItemStatus($saveArray);
			}else{
				$this->getOrderItemStatus->updateOrderItemStatus($getOrderItem->id,$saveArray);
			}
 		}
 	}

 	public function saveOrderAddress(){
 		if($this->getCartData->getCartAddress != null){
 			$getCartAddress = [];
 			foreach($this->getCartData->getCartAddress->toArray() as $key=>$value){
 			if($key != 'created_at' && $key != 'updated_at' && $key != 'deleted_at' && $key != 'id'){
 				$getCartAddress[$key] = $value;
 			}
 			}
 			$getCartAddress['cart_address_id'] = $this->getCartData->getCartAddress->id;
 			$getCartAddress['order_id'] = $this->order_id;
 			$getOrderAddress = $this->getOrderAddress->getOrderAddress($this->order_id);
 			if($getOrderAddress == null){
 				$this->getOrderAddress->saveOrderAddress($getCartAddress);
 			}else{
 				$this->getOrderAddress->updateOrderAddressItem($getOrderAddress->id,$getCartAddress);
 			}

 		}
 	}

    public function saveBillingAddress(){
		if($this->getCartData->getCartAddress != null){
			$getCartAddress = [];
			foreach($this->getCartData->getCartAddress->toArray() as $key=>$value){
			if($key != 'created_at' && $key != 'updated_at' && $key != 'deleted_at' && $key != 'id'){
				$getCartAddress[$key] = $value;
			}
			}
			$getCartAddress['cart_address_id'] = $this->getCartData->getCartAddress->id;
			$getCartAddress['order_id'] = $this->order_id;
			$getBillingAddress = $this->getBillingAddress->getBillingAddress($this->order_id);
			if($getBillingAddress == null){
				$this->getBillingAddress->saveBillingAddress($getCartAddress);
			}else{
				$this->getBillingAddress->updateBillingAddressItem($getBillingAddress->id,$getCartAddress);
			}

		}
	}

 	public function saveOrderPickupLocation(){
 		if($this->getCartData->getCartPickupLocation != null){
 			$getCartPickupLocation = [];
 			foreach($this->getCartData->getCartPickupLocation->toArray() as $key=>$value){
 			if($key != 'created_at' && $key != 'updated_at' && $key != 'deleted_at' && $key != 'id'){
 				$getCartPickupLocation[$key] = $value;
 			}
 			}
 			$getCartPickupLocation['cart_pickup_id'] = $this->getCartData->getCartPickupLocation->id;
 			$getCartPickupLocation['order_id'] = $this->order_id;
 			$getOrderPickupLocation = $this->getOrderPickupLocation->getOrderPickupLocation($this->order_id);
 			if($getOrderPickupLocation == null){
 				$this->getOrderPickupLocation->savePickupLocationInOrder($getCartPickupLocation);
 			}else{
 				$this->getOrderPickupLocation->updatePickupLocationInOrder($getOrderPickupLocation->id,$getCartPickupLocation);
 			}
 		}
 	}

 	public function saveDiscount(){
 		if(!empty($this->getData)){
 			$getDiscountArray = [
 				'original_price'=>$this->getData['data']['total'],
 				'discount_type'=>'I',
 				'user_id'=>$this->getData['user_id'],
 				'order_id'=>$this->order_id,
 				'discount_price'=>$this->getData['data']['difference_price'],
 				'discount'=>$this->getData['data']['discount'],
 				'total'=>$this->getData['data']['subTotal']
 			];
			if (isset($this->getData['data']['coupon_discount_amount'])) {
				$getDiscountArray['coupon_discount_amount'] = $this->getData['data']['coupon_discount_amount'];
			}
			if (isset($this->getData['data']['gift_discount_amount'])) {
				$getDiscountArray['gift_discount_amount'] = $this->getData['data']['gift_discount_amount'];
			}
 			$getDiscountOrder = $this->getOrderDiscount->getOrderDiscounByOrderId($this->order_id);
 			if(!empty($getDiscountOrder)){
 				$this->getOrderDiscount->updateOrderDiscount($getDiscountOrder->id,$getDiscountArray);
 			}else{
 				$this->getOrderDiscount->saveOrderDiscount($getDiscountArray);
 			}

 		}
 	}

 	public function savePayment(){
 		if(!empty($this->getData)){
 			
 			$getPaymentArray = [
 				'original_sub_total'=>$this->getData['data']['original_price'],
 				'user_id'=>$this->getData['user_id'],
 				'order_id'=>$this->order_id,
 				'sub_total'=>$this->getData['data']['subTotal'],
 				'vat'=>$this->getData['data']['vat'],
 				'shipping'=>$this->getData['data']['shippingCharge'],
 				'delivery_charge'=>$this->getData['data']['deliveryChange'],
 				'token'=>$this->getCartData->token,
 				'payment_mode'=>$this->getData['paymentMode'],
 				'payment_id'=>'',
				'payment_status' => 'NOT_PAID',
 				'total'=>$this->getData['data']['total']

 			];
 			$getOrderPayment = $this->getOrderPayment->getOrderPayment($this->order_id);
 			if($getOrderPayment == null){
 				 $this->getOrderPayment->saveOrderPayment($getPaymentArray);
 			}else{
 				 $this->getOrderPayment->updateOrderPayment($getOrderPayment->id,$getPaymentArray);

 			}
 	}
 }

 	public function saveShippingStatus(){
 		if(!empty($this->getData)){
 			$getShippingArray = [
 				'user_id'=>$this->getData['user_id'],
 				'order_id'=>$this->order_id,
 				'step'=>1,
 				'status'=>'N',
 			];
 			$getOrderStatusShipping = $this->getOrderStatusShipping->getOrderShipping($this->order_id);
 			if($getOrderStatusShipping == null){
 				 $this->getOrderStatusShipping->saveOrderShipping($getShippingArray);
 			}else{
 				 $this->getOrderStatusShipping->updateOrderShipping($getOrderStatusShipping->id,$getShippingArray);
 			}
 		}
 	}

 	public function saveUser(){
 		if(!empty($this->getData)){
	 		$getOrderUserArray = array(
	 			'user_id'=>$this->getData['user_id'],
	 			'order_id'=>$this->order_id,
	 			'first_name'=>$this->getCartData->getUser->first_name,
	 			'last_name'=>$this->getCartData->getUser->last_name,
	 			'name'=>$this->getCartData->getUser->name,
	 			'email'=>$this->getCartData->getUser->email,
	 			'mobile'=>$this->getCartData->getUser->mobile,
	 		);
			$getOrderUser = $this->getOrderUser->getOrderUserById($this->order_id);
			if($getOrderUser == null){
				$this->getOrderUser->saveOrderUserItem($getOrderUserArray);
			}else{
				$this->getOrderUser->updateOrderUserItem($getOrderUser->id,$getOrderUserArray);
			}
 	}
 	}

 	public function saveInvoice(){
 		if(!empty($this->getData)){
 			$generateInvoice = $this->order_id;
 			$invoice = 'MR'.++$generateInvoice;
 			$getOrderInvoiceArray = array(
 				'user_id'=>$this->getData['user_id'],
 				'order_id'=>$this->order_id,
 				'invoice'=>$invoice,
 			);
 			$getInvoice = $this->getOrderInvoice->getOrderInvoiceByOrderId($this->order_id);
 			if($getInvoice == null){
 				$this->getOrderInvoice->saveOrderInvoice($getOrderInvoiceArray);
 			}else{
 				$this->getOrderInvoice->updateOrderInvoice($getInvoice->id,$getOrderInvoiceArray);
 			}
 		}
 	}
 	

}