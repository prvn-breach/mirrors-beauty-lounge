<?php
namespace App\Http\Controllers\Admin\Banners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Banners\BannerService;

class BannerController extends Controller
{
    function __construct(BannerService $bannerService){
		$this->bannerService = $bannerService;
	}

	public function getBanners(Request $request) {
		return $this->bannerService->getBanners($request);
	}

	public function getBannerImages(Request $request) {
		return $this->bannerService->getBannerImages($request);
	}

	public function getBannerImage(Request $request) {
		return $this->bannerService->getBannerImage($request);
	}

	public function createBannerImage(Request $request) {
		return $this->bannerService->createBannerImage($request);
	}

	public function updateBannerImage(Request $request) {
		return $this->bannerService->updateBannerImage($request);
	}

	public function deleteBannerImage(Request $request) {
		return $this->bannerService->deleteBannerImage($request);
	}
}