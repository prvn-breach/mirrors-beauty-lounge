<?php
namespace App\Http\Controllers\Web\Addresses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Addresses\AddressService;
class AddressController extends Controller
{
	function __construct(AddressService $getAddressService){
		$this->getAddressService = $getAddressService;
	}

	public function saveCartAddress(Request $request){
		return $this->getAddressService->saveCartAddress($request);
	}
	public function saveAddress(Request $request){
		return $this->getAddressService->saveAddress($request);
	}

	public function getAddresses($user_id){
 		return $this->getAddressService->getAddresses($user_id);
 	}
 	public function getAddressById($address_id){
 		return $this->getAddressService->getAddressById($address_id);
 	}
 	public function deleteAddressById(Request $request){
 		return $this->getAddressService->deleteAddressById($request);
 	}
}