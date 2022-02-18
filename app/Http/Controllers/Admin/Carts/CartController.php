<?php
namespace App\Http\Controllers\Admin\Carts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Carts\CartService;

class CartController extends Controller
{
    function __construct(CartService $cartService){
		$this->cartService = $cartService;
	}

    public function getCarts(Request $request){
        return $this->cartService->getCarts($request);
    }
}