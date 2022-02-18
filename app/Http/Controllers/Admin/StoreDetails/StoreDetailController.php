<?php
namespace App\Http\Controllers\Admin\StoreDetails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\StoreDetails\StoreDetailService;

class StoreDetailController extends Controller
{
    function __construct(StoreDetailService $storeDetailService){
		$this->storeDetailService = $storeDetailService;
	}

    public function createStoreDetail(Request $request) {
        return $this->storeDetailService->createStoreDetail($request);
    }
}