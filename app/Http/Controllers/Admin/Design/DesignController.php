<?php
namespace App\Http\Controllers\Admin\Design;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Design\DesignService;

class DesignController extends Controller
{
    function __construct(DesignService $designService){
		$this->designService = $designService;
	}

    public function createCMSPage(Request $request) {
        return $this->designService->createCMSPage($request);
    }

    public function getCMSPages(Request $request) {
        return $this->designService->getCMSPages($request);
    }

    public function getCMSPage(Request $request) {
        return $this->designService->getCMSPage($request);
    }

    public function updateCMSPage(Request $request) {
        return $this->designService->updateCMSPage($request);
    }

    public function deleteCMSPage(Request $request) {
        return $this->designService->deleteCMSPage($request);
    }
}