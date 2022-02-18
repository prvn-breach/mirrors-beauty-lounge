<?php
namespace App\Http\Controllers\Admin\Vendors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Vendors\VendorService;

class VendorController extends Controller
{
    function __construct(VendorService $vendorService){
		$this->vendorService = $vendorService;
	}

    public function getVendors(Request $request){
        return $this->vendorService->getVendors($request);
    }

    public function getVendor(Request $request){
        return $this->vendorService->getVendor($request);
    }

    public function createVendor(Request $request){
        return $this->vendorService->createVendor($request);
    }

    public function updateVendor(Request $request){
        return $this->vendorService->updateVendor($request);
    }

    public function deleteVendor(Request $request){
        return $this->vendorService->deleteVendor($request);
    }
}