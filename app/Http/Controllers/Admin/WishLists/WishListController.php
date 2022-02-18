<?php
namespace App\Http\Controllers\Admin\WishLists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\WishLists\WishListService;

class WishListController extends Controller
{
	function __construct(WishListService $getWishListService){
		$this->getWishListService = $getWishListService;
	}

	public function getWishlistCountByUser(Request $request){
		return $this->getWishListService->getWishlistCountByUser($request);
	}
}