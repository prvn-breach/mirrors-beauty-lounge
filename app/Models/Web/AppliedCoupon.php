<?php
namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedCoupon extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'coupon_id' ];

    public function applyCoupon($request) {
        return $this->create($request);
    }
}