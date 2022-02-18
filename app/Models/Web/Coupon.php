<?php
namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Coupon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 
        'title', 'code', 'discount_type', 'discount', 'coupon_condition', 'condition_amount', 
        'accessibility', 'start_date', 'end_date', 'status', 'category_ids', 'sub_category_ids', 
        'brand_ids', 'product_ids' 
    ];

    protected $casts = [ 
        'category_ids' => 'array', 
        'sub_category_ids' => 'array', 
        'brand_ids' => 'array',
        'product_ids' => 'array',
        'customer_ids' => 'array'
    ];

    public function brands() {
        return $this->belongsToMany(Brand::class, 'id', 'brand_ids');
    }

    public function products() {
        return $this->belongsToMany(ProductCatlog::class, 'id', 'product_ids');
    }

    public function getCoupons($request){
        $coupons_query = $this;
        if (isset($request['discount_type'])) {
            $coupons_query = $coupons_query->where('discount_type', $request['discount_type']);
        }

        if (isset($request['search'])) {
            $coupons_query = $coupons_query->where('title', 'LIKE', "%{$request['search']}%")
                ->orWhere('code', 'LIKE', "%{$request['search']}%")
                ->orWhere('discount_type', 'LIKE', "%{$request['search']}%");
        }

        return $coupons_query->where('status', 1)
            ->where('start_date', '<=', Carbon::now()->format('Y-m-d'))
            ->where('end_date', '>=', Carbon::now()->format('Y-m-d'))
            ->get();
    }

    public function getCoupon($request){
        return $this->where('code', $request['coupon_code'])
            ->where('start_date', '<=', Carbon::now()->format('Y-m-d'))
            ->where('end_date', '>=', Carbon::now()->format('Y-m-d'))
            ->where('status', 1)
            ->first();
    }
}