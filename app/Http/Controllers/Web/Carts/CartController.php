<?php
namespace App\Http\Controllers\Web\Carts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Carts\CartService;
class CartController extends Controller
{
	function __construct(CartService $getCartService){
		$this->getCartService = $getCartService;
	}
	public function deleteCartItem($item_id){
		return $this->getCartService->deleteCartItem($item_id);
	}
	public function getCarts($session_id){
		return $this->getCartService->getCarts($session_id);
	}
    public function saveQtyCartItem(Request $request){
    	return $this->getCartService->saveQtyCartItem($request);
    } 
    public function saveCart(Request $request){
    	return $this->getCartService->saveCart($request);
    }

	public function updateCart(Request $request){
    	return $this->getCartService->updateCart($request);
    }
}
