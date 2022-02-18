<?php
namespace App\Http\Controllers\Admin\PaymentOptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\PaymentOptions\PaymentOptionService;

class PaymentOptionController extends Controller
{
    function __construct(PaymentOptionService $paymentOptionService){
		$this->paymentOptionService = $paymentOptionService;
	}

    public function getPaymentOptionsByCountry(Request $request) {
        return $this->paymentOptionService->getPaymentOptionsByCountry($request);
    }

    public function getPaymentOptionByCountry(Request $request) {
        return $this->paymentOptionService->getPaymentOptionByCountry($request);
    }

    public function createPaymentOptionByCountry(Request $request) {
        return $this->paymentOptionService->createPaymentOptionByCountry($request);
    }

    public function updatePaymentOptionByCountry(Request $request) {
        return $this->paymentOptionService->updatePaymentOptionByCountry($request);
    }

    public function deletePaymentOptionByCountry(Request $request) {
        return $this->paymentOptionService->deletePaymentOptionByCountry($request);
    }
}