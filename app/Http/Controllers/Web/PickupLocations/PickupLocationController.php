<?php
namespace App\Http\Controllers\Web\PickupLocations;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\PickupLocations\PickupLocationService;
class PickupLocationController extends Controller
{
	function __construct(PickupLocationService $getPickupLocationService){
		$this->getPickupLocationService = $getPickupLocationService;
	}

	

	public function savePickupLocationInCart(Request $request){
 		return $this->getPickupLocationService->savePickupLocationInCart($request);
 	}
 	public function getPickupLocations(){
 		return $this->getPickupLocationService->getPickupLocations();
 	}
 	public function getPickupLocation($pickup_id){
 		return $this->getPickupLocationService->getPickupLocation($pickup_id);
 	}
 	public function deletePickupLocationByCartId(Request $request){
 		return $this->getPickupLocationService->deletePickupLocationByCartId($request);
 	}
 	
}