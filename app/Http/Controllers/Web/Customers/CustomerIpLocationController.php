<?php
namespace App\Http\Controllers\Web\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Customers\CustomerIpLocationService;
class CustomerIpLocationController extends Controller
{
	function __construct(CustomerIpLocationService $getCustomerIpLocationService){
		$this->getCustomerIpLocationService = $getCustomerIpLocationService;
	}
    public function getCustomerIpLocation(){
    	return $this->getCustomerIpLocationService->getCustomerIpLocation();
    }
}
