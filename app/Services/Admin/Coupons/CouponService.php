<?php
namespace App\Services\Admin\Coupons;

use App\Models\Admin\Coupon;
use Illuminate\Support\Str;
use Response,Helper,Validator;

class CouponService
{ 
    function __construct(Coupon $coupon){
		$this->coupon = $coupon;
	}

    public function getCoupons($request) {
        $getCoupons = $this->coupon->getCoupons($request);
		return Response::json(['status'=>200,'data'=>$getCoupons]);
    }

    public function getCoupon($request) {
        $getCoupon = $this->coupon->getCoupon($request);
		return Response::json(['status'=>200,'data'=>$getCoupon]);
    }

    public function createCoupon($request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'code' => 'required|unique:coupons,code',
            'discount_type' => 'required',
            'discount' => 'required',
            'coupon_condition' => 'required',
            'condition_amount' => 'required',
            'accessibility' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $coupon = $this->coupon->createCoupon($request);
		return Response::json(['status'=>200,'data'=>$coupon]);
    }

    public function deleteCoupon($request) {
        $coupon = $this->coupon->deleteCoupon($request);
		return Response::json(['status'=>200,'data'=>$coupon]);
    }

    public function updateCoupon($request) {
        $coupon = $this->coupon->updateCoupon($request);
		return Response::json(['status'=>200,'data'=>$coupon]);
    }
}