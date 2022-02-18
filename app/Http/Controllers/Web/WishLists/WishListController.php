<?php
namespace App\Http\Controllers\Web\WishLists;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\WishLists\WishListService;
class WishListController extends Controller
{
	function __construct(WishListService $getWishListService){
		$this->getWishListService = $getWishListService;
	}

	public function getWishListByUser($user_id){
		return $this->getWishListService->getWishListByUser($user_id);
	}

	public function saveWishList(Request $request){
		return $this->getWishListService->saveWishList($request);
	}
	public function getWishList($user_id){
		return $this->getWishListService->getWishList($user_id);
	}
}