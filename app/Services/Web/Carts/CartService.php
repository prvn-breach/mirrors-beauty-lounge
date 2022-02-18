<?php
namespace App\Services\Web\Carts;

use App\Models\Web\Cart;
use App\Models\Web\CartItem;
use Helper,Response;
use App\Models\Web\ProductStock;
use App\Models\Web\ProductCatlog;

class CartService
{
	function __construct(Cart $getCart,CartItem $getCartItem){
		$this->getCart = $getCart;
		$this->getCartItem = $getCartItem;
	}
	public function deleteCartItem($item_id){
		return $this->getCartItem->deleteCartItem($item_id);
	}
	public function getCarts($session_id){
		$getCarts =  $this->getCart->getCartBySession($session_id);
		return Response::json(['status'=>200,'data'=>$getCarts]);
	}
	public function saveQtyCartItem($request){
		$data = $request->all();
		// $available_quantity = ProductStock::where('product_id', $request['product_id'])->whereHas('stockTransfer', function($query){
		// 	$query->where('status', 'RECEIVED');
		// })->count();
		$product = ProductCatlog::find($request['product_id']);
		if ($product['product_quantity'] < $data['qty']) {
			return Response::json(['status'=>0,'message'=>'This Product have only '.$product['product_quantity'].' pieces.']);
		}
		$vat = (($data['price']*$data['qty'])*$data['vat']);
		$getCarts =  $this->getCartItem->updateCartItem($data['cart_id'],['quantity'=>$data['qty'],'vat'=>$vat]);
		return Response::json(['status'=>200,'message'=>'Updated successfully']);
	}
	public function saveCart($request){
		$data = $request->all();
		$getCart = $this->getCart->getCartBySession($data['session_id']);
		if($getCart == null){
			$cart = array(
				'user_id'=>$data['user_id'],
				'session_id'=>$data['session_id'],
				'token'=>$data['token'],
				'vat_percentage'=>$data['vat'],
				'status'=>'N'
			);
			$this->getCart->saveCart($cart);
			$getCart = $this->getCart->getCartBySession($data['session_id']);
		}
		$getCartItem = $this->getCartItem->getCartItemByCartId($data['id'],$getCart->id);
		
		if($getCartItem == null){
			$salePrice = $data['price'];
			if($data['discount'] > 0){
				$salePrice = $data['discount_price'];
			}
			$getVat = ($salePrice*$data['vat']);
			$cartItem = array(
				'product_id'=>$data['id'],
				'product_name'=>$data['name'],
				'cart_id'=>$getCart->id,
				'vat'=>$getVat,
				'sku'=>$data['sku'],
				'original_price'=>$data['price'],
				'price'=>$salePrice,
				'discount'=>$data['discount'],
				'barcode'=>$data['barcode'],
				'category_id'=>$data['category_id'],
				'sub_category_id'=>$data['sub_category_id'],
				'brand_id'=>$data['brand_id'],
				'quantity'=>$data['qty'],
				'image'=>$data['image'],
				'warranty'=>$data['warranty'],
				'delivery'=>$data['delivery'],
				'active'=>1,
			);
			$product = ProductCatlog::find($data['id']);
			if ($product['product_quantity'] == 0) {
				return Response::json(['status'=>0,'message'=>'This Product out of stock.']);
			}
			$this->getCartItem->saveCartItem($cartItem);
		}else{
			/*$this->getCartItem->updateCartItem($getCartItem->id,[
				'quantity'=>$data['qty']
			]);*/
		}
		$getCartItem = $this->getCartItem->getCartItemByCartId($data['id'],$getCart->id);
		if($getCartItem != null){
			return Response::json(['status'=>200,'message'=>'Save successfully']);
		}else{
			return Response::json(['status'=>0,'message'=>'Save Failed']);
		}

	}

	public function updateCart($request){
		$cart =  $this->getCart->updateCart($request['cart_id'], $request->toArray());
		return Response::json(['status'=>200,'data'=>$cart]);
	}


	

	
}