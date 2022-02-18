<?php
namespace App\Http\Controllers\Admin\Promotions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Promotions\PromotionService;

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

    public function createPromotion(Request $request) {
        return $this->promotionService->createPromotion($request);
    }

    public function deletePromotion(Request $request) {
        return $this->promotionService->deletePromotion($request);
    }

    public function updatePromotion(Request $request) {
        return $this->promotionService->updatePromotion($request);
    }
}