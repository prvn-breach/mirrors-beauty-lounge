<?php
namespace App\Http\Controllers\Web\Banners;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Banners\BannerService;
class BannerController extends Controller
{
	function __construct(BannerService $getBannerService){
		$this->getBannerService = $getBannerService;
	}

	public function getBanner($type){
		return $this->getBannerService->getBanner($type);
	}
	
}