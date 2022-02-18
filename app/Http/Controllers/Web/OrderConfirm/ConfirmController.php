<?php
namespace App\Http\Controllers\Web\OrderConfirm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\OrderConfirm\ConfirmService;
class ConfirmController extends Controller
{
	function __construct(ConfirmService $getConfirmService){
		$this->getConfirmService = $getConfirmService;
	}

	public function saveStatusOrder(Request $request){
 		return $this->getConfirmService->saveStatusOrder($request);
 	}
 	public function getOrderByUser($user_id){
		
 		return $this->getConfirmService->getOrderByUser($user_id);
 	}
	public function getOrder($session_id){
		
 		return $this->getConfirmService->getOrder($session_id);
 	}
	
}