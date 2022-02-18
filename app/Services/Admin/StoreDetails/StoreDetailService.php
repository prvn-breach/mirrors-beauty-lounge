<?php
namespace App\Services\Admin\StoreDetails;

use App\Models\Admin\StoreDetail;
use Illuminate\Support\Str;
use Response,Helper;

class StoreDetailService
{ 
    function __construct(StoreDetail $storeDetail){
		$this->storeDetail = $storeDetail;
	}

    public function createStoreDetail($request) {
        $store_detail = $this->storeDetail->createStoreDetail($request);
		return Response::json([ 'status' => 200,'data' => $store_detail ]);
    }
}