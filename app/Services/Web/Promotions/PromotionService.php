<?php
namespace App\Services\Web\Promotions;

use App\Models\Web\Promotion;
use Illuminate\Support\Str;
use Helper,Response;

class PromotionService
{ 
    function __construct(Promotion $promotion){
		$this->promotion = $promotion;
	}

    public function getPromotions($request) {
        $promotions = $this->promotion->getPromotions($request);
		return Response::json(['status'=>200,'data'=>$promotions]);
    }

    public function getPromotion($request) {
        $promotion = $this->promotion->getPromotion($request);
		return Response::json(['status'=>200,'data'=>$promotion]);
    }
}