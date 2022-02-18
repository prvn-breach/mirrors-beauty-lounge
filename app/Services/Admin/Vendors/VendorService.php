<?php
namespace App\Services\Admin\Vendors;

use App\Models\Admin\Vendor;
use Illuminate\Support\Str;
use Response;
use Helper;

class VendorService
{ 
    function __construct(Vendor $vendor){
		$this->vendor = $vendor;
	}

    public function getVendors($request){
        $vendors = $this->vendor->getVendors($request);
        return Response::json(['status'=>200,'data'=>$vendors]);
    }

    public function getVendor($request){
        $vendor = $this->vendor->getVendor($request);
        return Response::json(['status'=>200,'data'=>$vendor]);
    }

    public function createVendor($request){
        $vendor = $this->vendor->createVendor($request);
        return Response::json(['status'=>200,'data'=>$vendor]);
    }

    public function updateVendor($request){
        $vendor = $this->vendor->updateVendor($request);
        return Response::json(['status'=>200,'data'=>$vendor]);
    }

    public function deleteVendor($request){
        $vendor = $this->vendor->deleteVendor($request);
        return Response::json(['status'=>200,'data'=>$vendor]);
    }
}