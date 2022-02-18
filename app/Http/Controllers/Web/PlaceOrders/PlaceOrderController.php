<?php
namespace App\Http\Controllers\Web\PlaceOrders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\PlaceOrders\PlaceOrderService;
class PlaceOrderController extends Controller
{
	function __construct(PlaceOrderService $getPlaceOrderService){
		$this->getPlaceOrderService = $getPlaceOrderService;
	}

	

	public function savePlaceOrder(Request $request){
 		return $this->getPlaceOrderService->savePlaceOrder($request);
 	}
 	
 	
}