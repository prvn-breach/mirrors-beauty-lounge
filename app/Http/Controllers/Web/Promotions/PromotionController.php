<?php
namespace App\Http\Controllers\Web\Promotions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Promotions\PromotionService;

class PromotionController extends Controller
{
    function __construct(PromotionService $promotionService){
		$this->promotionService = $promotionService;
	}

    public function getPromotions(Request $request) {
        return $this->promotionService->getPromotions($request);
    }

    public function getPromotion(Request $request) {
        return $this->promotionService->getPromotion($request);
    }
}