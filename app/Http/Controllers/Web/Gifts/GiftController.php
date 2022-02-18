<?php
namespace App\Http\Controllers\Web\Gifts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Gifts\GiftService;

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
}