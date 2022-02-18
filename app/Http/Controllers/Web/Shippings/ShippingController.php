<?php
namespace App\Http\Controllers\Web\Shippings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Shippings\ShippingService;
class ShippingController extends Controller
{
	function __construct(ShippingService $getShippingService){
		$this->getShippingService = $getShippingService;
	}

	

	public function getShippings(){
 		return $this->getShippingService->getShippings();
 	}
 	
 	
}