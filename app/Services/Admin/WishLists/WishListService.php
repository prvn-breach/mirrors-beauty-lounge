<?php
namespace App\Services\Admin\WishLists;

use App\Models\Admin\ProductWishList;
use Response;

class WishListService
{
	function __construct(ProductWishList $getWishList){
		$this->getWishList = $getWishList;
	}

	public function getWishlistCountByUser($request){
		$getWishlistCountByUser = $this->getWishList->getWishlistCountByUser($request);
		return Response::json(['status'=>200,'data'=>$getWishlistCountByUser]);
	}
}