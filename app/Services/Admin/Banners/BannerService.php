<?php
namespace App\Services\Admin\Banners;

use App\Models\Admin\Banner;
use App\Models\Admin\BannerImage;
use Response,Helper,Validator;

class BannerService
{
	function __construct(Banner $banner, BannerImage $bannerImage){
		$this->banner = $banner;
		$this->bannerImage = $bannerImage;
 	}

	public function getBanners($request) {
		$banners = $this->banner->getBanners($request);
		return Response::json([ 'status'=> 200, 'data'=> $banners ]);
	}

	public function getBannerImages($request) {
		$banner_images = $this->bannerImage->getBannerImages($request);
		return Response::json([ 'status'=> 200, 'data'=> $banner_images ]);
	}

	public function getBannerImage($request) {
		$banner_image = $this->bannerImage->getBannerImage($request);
		return Response::json([ 'status'=> 200, 'data'=> $banner_image ]);
	}

	public function createBannerImage($request) {
		$validator = Validator::make($request->all(), [
            'banner_id' => 'required|exists:banners,id',
			'image' => 'required',
			'mobile_image' => 'required',
			'link' => 'required',
			'status' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $banner_image = $this->bannerImage->createBannerImage($request);
		return Response::json([ 'status'=> 200, 'data'=> $banner_image ]);
	}

	public function updateBannerImage($request) {
		$validator = Validator::make($request->all(), [
            'banner_image_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
		$banner_image = $this->bannerImage->updateBannerImage($request);
		return Response::json([ 'status'=> 200, 'data'=> $banner_image ]);
	}

	public function deleteBannerImage($request) {
		$validator = Validator::make($request->all(), [
            'banner_image_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
		$banner_image = $this->bannerImage->deleteBannerImage($request);
		return Response::json([ 'status'=> 200, 'data'=> $banner_image ]);
	}
}