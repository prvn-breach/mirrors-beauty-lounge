<?php
namespace App\Services\Web\WishLists;
use App\Models\Web\ProductWishList;


use Response;
use Helper;
class WishListService
{
	function __construct(ProductWishList $getWishList){
		$this->getWishList = $getWishList;
	}
	public function getWishListByUsern($user_id){
		$getWishList = $this->getWishList->getWishListByUser($user_id);
		return Response::json(['status'=>200,'data'=>$getWishList]);
	}
	public function saveWishList($request){
		$data = $request->all();
		$getData = array(
			'user_id'=>$data['user_id'],
			'product_id'=>$data['product_id'],
			'created_by'=>1,
		);
		if($data['wishList'] != null){
			$getProduct = $this->getWishList->getDeleteById($data['wishList']['id']);
		}else{
			$getProduct = $this->getWishList->saveWishList($getData);
		}
		return Response::json(['status'=>200,'data'=>$getProduct]);
	}
	public function getWishList($user_id){
		$getProduct = $this->getWishList->getWishList($user_id);
		return Response::json(['status'=>200,'data'=>$getProduct]);
	}
}