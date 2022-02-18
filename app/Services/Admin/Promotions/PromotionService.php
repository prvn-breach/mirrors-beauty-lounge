<?php
namespace App\Services\Admin\Promotions;

use App\Models\Admin\Promotion;
use Illuminate\Support\Str;
use Helper,Response;
use Validator;

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

    public function createPromotion($request) {
        $validator = Validator::make($request->all(), [
            'promotion_name' => 'required',
            'short_description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'priority' => 'required',
            'status' => 'required',
            'conditions' => 'required',
            'bonus' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $promotion = $this->promotion->createPromotion($request);
		return Response::json(['status'=>200,'data'=>$promotion]);
    }

    public function deletePromotion($request) {
        $validator = Validator::make($request->all(), [
            'promotion_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $promotion = $this->promotion->deletePromotion($request);
		return Response::json(['status'=>200,'data'=>$promotion]);
    }

    public function updatePromotion($request) {
        $validator = Validator::make($request->all(), [
            'promotion_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $promotion = $this->promotion->updatePromotion($request);
		return Response::json(['status'=>200,'data'=>$promotion]);
    }
}