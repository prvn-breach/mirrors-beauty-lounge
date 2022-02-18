<?php
namespace App\Http\Controllers\Web\Coupons;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Coupons\CouponService;

class CouponController extends Controller
{
    function __construct(CouponService $couponService){
		$this->couponService = $couponService;
	}

    public function getCoupons(Request $request) {
        return $this->couponService->getCoupons($request);
    }

    public function getCoupon(Request $request) {
        return $this->couponService->getCoupon($request);
    }

    public function validateCoupon(Request $request) {
        return $this->couponService->validateCoupon($request);
    }
}