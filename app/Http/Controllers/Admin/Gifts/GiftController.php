<?php
namespace App\Http\Controllers\Admin\Gifts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Gifts\GiftService;

class GiftController extends Controller
{
    function __construct(GiftService $giftService){
        $this->giftService = $giftService;
    }

    public function getGiftCertificates(Request $request) {
        return $this->giftService->getGiftCertificates($request);
    }

    public function getGiftCertificate(Request $request) {
        return $this->giftService->getGiftCertificate($request);
    }

    public function createGiftCertificate(Request $request) {
        return $this->giftService->createGiftCertificate($request);
    }

    public function updateGiftCertificate(Request $request) {
        return $this->giftService->updateGiftCertificate($request);
    }

    public function deleteGiftCertificate(Request $request) {
        return $this->giftService->deleteGiftCertificate($request);
    }
}