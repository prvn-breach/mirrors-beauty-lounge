<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ExcelResponse;

class PaymentOption extends Model
{
    protected $fillable = [ 'country_id', 'payment_options', 'status' ];

    protected $casts = [
        'payment_options' => 'array'
    ];

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function getPaymentOptionsByCountry($request) {
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $payment_options_query = $this->with('country');

        if (isset($request['search'])) {
            $payment_options_query = $payment_options_query->whereHas('country', function($query) use ($request){
                $query->where('name', 'LIKE', "%{$request['search']}%");
            });
        }

        $payment_options_by_country = [];
        if ($perPage == 'all') {
            $payment_options_by_country = $payment_options_query->get();
        } else {
            $payment_options_by_country = $payment_options_query->paginate($perPage);
        }

        if (isset($request['response_type'])) {
            $columns = [ 'ID', 'Country', 'Payment Options', 'Status'];
            $rows = [];
            foreach ($payment_options_by_country as $country) {
                array_push($rows, [
                    $country['id'], $country['country_id'],
                    $country['payment_options'], $country['status']
                ]);
            }
            return ExcelResponse::export('PaymentOptionsByCountry', $rows, $columns, 'PaymentOptionsByCountry');
        }
        return $payment_options_by_country;
    }

    public function getPaymentOptionByCountry($request) {
        return $this->with('country')->where('id', $request['payment_option_id'])->first();
    }

    public function createPaymentOptionByCountry($request) {
        return $this->create([
            'country_id' => $request['country_id'],
            'payment_options' => $request['payment_options'],
            'status' => $request['status']
        ]);
    }

    public function updatePaymentOptionByCountry($request) {
        $data = [];
        foreach ($this->fillable as $column) {
            if (isset($request[$column])) {
                $data[$column] = $request[$column];
            }
        }
        return $this->where('id', $request['payment_option_id'])->update($data);
    }

    public function deletePaymentOptionByCountry($request) {
        return $this->where('id', $request['payment_option_id'])->delete();
    }
}