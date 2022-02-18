<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\ExcelResponse;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\ProductCatlog;
use App\Models\Admin\User;
use Carbon\Carbon;

class Coupon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 
        'title', 'code', 'discount_type', 'discount', 'coupon_condition', 'condition_amount', 
        'accessibility', 'start_date', 'end_date', 'status', 'category_ids', 'sub_category_ids', 
        'brand_ids', 'product_ids', 'customer_ids', 'created_by'
    ];

    public function getCouponsTest($request){
        $coupons = [];
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }
        if (isset($request['discount_type'])) {
            $coupons_query = $this->where('discount_type', $request['discount_type']);

            if (isset($request['search'])) {
                $coupons_query->where('title', 'LIKE', "%{$request['search']}%")
                    ->orWhere('code', 'LIKE', "%{$request['search']}%")
                    ->orWhere('discount_type', 'LIKE', "%{$request['search']}%");
            }

            if (isset($request['response_type'])) {
                $coupons = $coupons_query->get();
            } else {
                $coupons = $coupons_query->paginate($perPage);
            }
        } else {
            if (isset($request['response_type'])) {
                if (isset($request['search'])) {
                    $coupons = $this->where('title', 'LIKE', "%{$request['search']}%")
                        ->orWhere('code', 'LIKE', "%{$request['search']}%")
                        ->orWhere('discount_type', 'LIKE', "%{$request['search']}%")->get();
                } else {
                    $coupons = $this->get();
                }
            } else {
                if (isset($request['search'])) {
                    $coupons = $this->where('title', 'LIKE', "%{$request['search']}%")
                        ->orWhere('code', 'LIKE', "%{$request['search']}%")
                        ->orWhere('discount_type', 'LIKE', "%{$request['search']}%")->paginate($perPage);
                } else {
                    $coupons = $this->paginate($perPage);
                }
            }
        }

        if (isset($request['response_type'])) {
            $columns = [ 'ID', 'Coupon Title', 'Coupon Code', 'Discount Type', 'Discount', 'Coupon Condition', 'Coupon Amount', 'Accessibility', 'Start Date', 'End Date', 'Status' ];
            unset($coupons['created_at']);
            unset($coupons['updated_at']);
            unset($coupons['deleted_at']);
            $rows = $coupons;
            return ExcelResponse::export('Coupons', $rows, $columns, 'Coupons');
        }

        return $coupons;
    }

    public function getCoupons($request){
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $coupons_query = $this;
        if (isset($request['discount_type'])) { 
            $coupons_query = $coupons_query->where('discount_type', $request['discount_type']);
        }

        if (isset($request['created_by'])) {
            $coupons_query = $coupons_query->where('created_by', $request['created_by']);
        }

        if (isset($request['search'])) {
            $coupons_query = $coupons_query->where('title', 'LIKE', "%{$request['search']}%")
                ->orWhere('code', 'LIKE', "%{$request['search']}%")
                ->orWhere('discount_type', 'LIKE', "%{$request['search']}%");
        }

        if (isset($request['response_type'])) {
            $coupons = $coupons_query->get();
            $columns = [ 'ID', 'Coupon Title', 'Coupon Code', 'Discount Type', 'Discount', 'Coupon Condition', 'Condition Amount', 'Accessibility', 'Start Date', 'End Date', 'Status' ];
            $rows = [];
            foreach ($coupons as $coupon) {
                $discount = $coupon['discount_type'] == 'FIXED_PRICE_BASED' ? 'AED '.$coupon['discount'] : $coupon['discount'].' %';
                array_push($rows, [
                    $coupon['id'], $coupon['title'], $coupon['code'],
                    $coupon['discount_type'], $discount, $coupon['coupon_condition'],
                    $coupon['condition_amount'], $coupon['accessibility'], $coupon['start_date'],
                    $coupon['end_date'], $coupon['status']
                ]);
            }
            return ExcelResponse::export('Coupons', $rows, $columns, 'Coupons');
        }

        return $coupons_query->paginate($perPage);
    }

    public function getCoupon($request){
        $coupon = $this->where('id', $request['coupon_id'])->first();
        $brands = Brand::where('status', 'A')->get();
        $categories = Category::where('status', 'A')->get();
        $sub_categories = SubCategory::where('status', 'A')->get();
        $products = ProductCatlog::where('status', 'A')->get();
        $users = User::get();

        return [
            'coupon' => $coupon,
            'brands' => $brands,
            'categories' => $categories,
            'sub_categories' => $sub_categories,
            'products' => $products,
            'customers' => $users
        ];
    }

    public function createCoupon($request){
        return $this->create([
            'title' => $request['title'],
            'code' => $request['code'],
            'discount_type' => $request['discount_type'],
            'discount' => $request['discount'],
            'coupon_condition' => $request['coupon_condition'],
            'condition_amount' => $request['condition_amount'],
            'accessibility' => $request['accessibility'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'status' => $request['status'],
            'category_ids' => $request['category_ids'],
            'sub_category_ids' => $request['sub_category_ids'],
            'brand_ids' => $request['brand_ids'],
            'product_ids' => $request['product_ids'],
            'customer_ids' => $request['customer_ids'],
            'created_by' => $request['created_by']
        ]);
    }

    public function deleteCoupon($request){
        return $this->where('id', $request['coupon_id'])->delete();
    }

    public function updateCoupon($request){
        return $this->where('id', $request['coupon_id'])->update([
            'title' => $request['title'],
            'code' => $request['code'],
            'discount_type' => $request['discount_type'],
            'discount' => $request['discount'],
            'coupon_condition' => $request['coupon_condition'],
            'condition_amount' => $request['condition_amount'],
            'accessibility' => $request['accessibility'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'status' => $request['status'],
            'category_ids' => $request['category_ids'],
            'sub_category_ids' => $request['sub_category_ids'],
            'brand_ids' => $request['brand_ids'],
            'product_ids' => $request['product_ids'],
            'customer_ids' => $request['customer_ids']
        ]);
    }
}