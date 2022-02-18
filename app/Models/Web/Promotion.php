<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ExcelResponse;
use Carbon\Carbon;

class Promotion extends Model
{
    protected $fillable = [ 'promotion_name', 'short_description', 'start_date', 'end_date', 'priority', 'status', 'conditions', 'bonus' ];
    protected $casts = [ 
        'conditions' => 'object',
        'bonus' => 'object'
    ];

    public function getPromotions($request) {
        return $this->where('status', 1)
            ->where('start_date', '<=', Carbon::now()->format('Y-m-d'))
            ->where('end_date', '>=', Carbon::now()->format('Y-m-d'))
            ->orderBy('priority', 'desc')
            ->get();
    }

    public function getPromotion($request) {
        return $this->where('id', $request['promotion_id'])->where('status', 1)->first();
    }
}