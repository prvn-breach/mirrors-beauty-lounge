<?php
namespace App\Http\Controllers\Web\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Cms\CmsService;

class CmsController extends Controller
{
    function __construct(CmsService $cmsService){
		$this->cmsService = $cmsService;
	}

    public function getCMSPages(Request $request) {
        return $this->cmsService->getCMSPages($request);
    }

    public function getCMSPage(Request $request) {
        return $this->cmsService->getCMSPage($request);
    }
}