<?php
namespace App\Models\Web;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class GiftCertificate extends Model
{
    protected $fillable = [ 'certificate_title', 'certificate_code', 'start_date', 'end_date', 'certificate_discount_type', 'discount', 'accessibility', 'status' ];

    public function getAppliedGifts() {
        return $this->hasMany(AppliedGift::class);
    }

    public function getGiftCertificates($request) {
        return $this->where('status', 1)
            ->where('start_date', '<=', Carbon::now()->format('Y-m-d'))
            ->where('end_date', '>=', Carbon::now()->format('Y-m-d'))
            ->withCount('getAppliedGifts')
            ->get();
    }

    public function getGiftCertificate($request) {
        return $this->where('certificate_code', $request['gift_code'])
            ->where('start_date', '<=', Carbon::now()->format('Y-m-d'))
            ->where('end_date', '>=', Carbon::now()->format('Y-m-d'))
            ->where('status', 1)
            ->withCount('getAppliedGifts')
            ->first();
    }
}