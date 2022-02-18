<?php
namespace App\Services\Web\Banners;
use App\Models\Web\Banner;
use Response;
use Helper;

class BannerService
{
	function __construct(Banner $getBanner){
		$this->getBanner = $getBanner;
 	}

 	public function getBanner($type){
 		$getBanner = $this->getBanner->getBanner($type);
 		return Response::json(['status'=>200,'data'=>$getBanner]);
 	}
 	

}