<?php
namespace App\Services\Web\Shippings;
use App\Models\Web\Shipping;

use Response;
use Helper;

class ShippingService
{
	function __construct(Shipping $getShipping){
		$this->getShipping = $getShipping;
 	}

 	public function getShippings(){
 		$getShipping = $this->getShipping->getShippings();
 		return Response::json(['status'=>200,'data'=>$getShipping]);
 	}

 	
 	

}