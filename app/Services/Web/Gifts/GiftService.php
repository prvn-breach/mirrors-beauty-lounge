<?php
namespace App\Services\Web\Gifts;

use App\Models\Web\GiftCertificate;
use Illuminate\Support\Str;
use Validator;
use Response;
use Helper;

class GiftService
{ 
    function __construct(GiftCertificate $giftCertificate){
		$this->giftCertificate = $giftCertificate;
	}

    public function getGiftCertificates($request){
        $gift_certificates = $this->giftCertificate->getGiftCertificates($request);
		return Response::json(['status'=>200,'data'=>$gift_certificates]);
    }

    public function getGiftCertificate($request){
        $gift_certificate = $this->giftCertificate->getGiftCertificate($request);
		return Response::json(['status'=>200,'data'=>$gift_certificate]);
    }
}