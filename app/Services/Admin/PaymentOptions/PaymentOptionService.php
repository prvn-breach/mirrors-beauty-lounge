<?php
namespace App\Services\Admin\PaymentOptions;

use App\Models\Admin\PaymentOption;
use Illuminate\Support\Str;
use Response,Helper,Validator;

class PaymentOptionService
{ 
    function __construct(PaymentOption $paymentOption){
		$this->paymentOption = $paymentOption;
	}

    public function getPaymentOptionsByCountry($request) {
        $payment_options = $this->paymentOption->getPaymentOptionsByCountry($request);
		return Response::json([ 'status'=> 200, 'data'=> $payment_options ]);
    }

    public function getPaymentOptionByCountry($request) {
        $payment_option = $this->paymentOption->getPaymentOptionByCountry($request);
		return Response::json([ 'status'=> 200, 'data'=> $payment_option ]);
    }

    public function createPaymentOptionByCountry($request) {
		$validator = Validator::make($request->all(), [
            'country_id' => 'required|exists:countries,id',
            'payment_options' => 'required',
            'status' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $payment_option = $this->paymentOption->createPaymentOptionByCountry($request);
		return Response::json([ 'status'=> 200, 'data'=> $payment_option ]);
	}

    public function updatePaymentOptionByCountry($request) {
		$validator = Validator::make($request->all(), [
            'payment_option_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $payment_option = $this->paymentOption->updatePaymentOptionByCountry($request);
		return Response::json([ 'status'=> 200, 'data'=> $payment_option ]);
	}

    public function deletePaymentOptionByCountry($request) {
		$validator = Validator::make($request->all(), [
            'payment_option_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $payment_option = $this->paymentOption->deletePaymentOptionByCountry($request);
		return Response::json([ 'status'=> 200, 'data'=> $payment_option ]);
	}
}