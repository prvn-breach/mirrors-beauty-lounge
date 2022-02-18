<?php
namespace App\Services\Admin\Carts;

use App\Models\Admin\Cart;
use App\Models\Admin\CartItem;
use Helper,Response;

class CartService
{
	function __construct(Cart $cart,CartItem $cartItem){
		$this->cart = $cart;
		$this->cartItem = $cartItem;
	}

	public function getCarts($request){
		$getCarts = $this->cart->getCarts($request);
		return Response::json(['status'=>200,'data'=>$getCarts]);
	}
}