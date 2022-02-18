<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ExcelResponse;

class Promotion extends Model
{
    protected $fillable = [ 'promotion_name', 'short_description', 'start_date', 'end_date', 'priority', 'status', 'conditions', 'bonus' ];
    protected $casts = [ 
        'conditions' => 'object',
        'bonus' => 'object'
    ];

    public function getPromotions($request) {
        $promotions = $this;
        $perPage = 10;

        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        if (isset($request['search'])) {
            $promotions = $promotions->where('promotion_name');
        }

        if (isset($request['status'])) {
            $promotions = $promotions->where('status');
        }

        if (isset($request['priority'])) {
            $promotions = $promotions->where('priority');
        }

        if (isset($request['response_type'])) {
            $promotions = $promotions->get();
            $columns = [ 'ID', 'Promotion Name', 'Short Description', 'Start Date', 'End Date', 'Priority', 'Status' ];
            $rows = [];
            foreach ($promotions as $promotion) {
                array_push($rows,[
                    $promotion['id'], $promotion['promotion_name'],
                    $promotion['short_description'], $promotion['start_date'],
                    $promotion['end_date'], $promotion['priority'], $promotion['status']
                ]);
            }
            return ExcelResponse::export('Promotions', $rows, $columns, 'Promotions');
        }

        return $promotions->paginate($perPage);
    }

    public function getPromotion($request) {
        return $this->where('id', $request['promotion_id'])->first();
    }

    public function createPromotion($request) {
        $data = [];
        foreach ($this->fillable as $index => $field) {
            if (isset($request[$field])) {
                $data[$field] = $request[$field];
            }
        }
        return $this->create($data);
    }

    public function updatePromotion($request) {
        $data = [];
        foreach ($this->fillable as $index => $field) {
            if (isset($request[$field])) {
                $data[$field] = $request[$field];
            }
        }
        return $this->where('id', $request['promotion_id'])->update($data);
    }

    public function deletePromotion($request) {
        return $this->where('id', $request['promotion_id'])->delete();  
    }
}