<?php
namespace App\Http\Controllers\Admin\Coupons;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Coupons\CouponService;

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

    public function createCoupon(Request $request) {
        return $this->couponService->createCoupon($request);
    }

    public function deleteCoupon(Request $request) {
        return $this->couponService->deleteCoupon($request);
    }

    public function updateCoupon(Request $request) {
        return $this->couponService->updateCoupon($request);
    }
}