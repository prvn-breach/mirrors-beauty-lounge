<?php
namespace App\Services\Web\Coupons;

use App\Models\Web\Brand;
use App\Models\Web\Coupon;
use App\Models\Web\CartItem;
use App\Models\Web\Category;
use App\Models\Web\ProductCatlog;
use Illuminate\Support\Str;
use Response,Helper;

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

    public function validateCoupon($request) {
        $items = CartItem::where('cart_id', $request['cart_id'])->get();
        $items_count = count($items);
        $coupon = Coupon::find($request['coupon_id']);

        $items_applicable = [];
        if (!empty($coupon['product_ids']) && count($coupon['product_ids']) > 0) { 
            $products = $items->whereIn('product_id', $coupon['product_ids'])->pluck('product_id');
            $items_applicable = array_unique(array_merge($items_applicable, $products->toArray()));
        }
        if (!empty($coupon['brand_ids']) && count($coupon['brand_ids']) > 0) { 
            $products = $items->whereIn('brand_id', $coupon['brand_ids'])->pluck('product_id');
            $items_applicable = array_unique(array_merge($items_applicable, $products->toArray()));
        }
        if (!empty($coupon['category_ids']) && count($coupon['category_ids']) > 0) { 
            $products = $items->whereIn('category_id', $coupon['category_ids'])->pluck('product_id');
            $items_applicable = array_unique(array_merge($items_applicable, $products->toArray()));
        }
        if (!empty($coupon['sub_category_ids']) && count($coupon['sub_category_ids']) > 0) { 
            $products = $items->whereIn('sub_category_id', $coupon['sub_category_ids'])->pluck('product_id');
            $items_applicable = array_unique(array_merge($items_applicable, $products->toArray()));
        }
        if (!empty($coupon['customer_ids']) && count($coupon['customer_ids']) > 0) {
            if (!in_array($request['user_id'], $coupon['customer_ids'])) {
                return Response::json([ 'status' => 0, 'data' => '', 'message' => 'This coupon was applied on for specific Customers.' ]);
            }
        }

        if($items_count!=count(array_values($items_applicable))) {
            return Response::json([ 'status' => 0, 'data' => '', 'message' => 'This coupon was applied on for specific Brands/Categories/Products.' ]);
        }

        return Response::json([ 'status' => 200,'data' => '' ]);
    }
}