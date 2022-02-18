<?php
namespace App\Services\Admin\Gifts;

use App\Models\Admin\GiftCertificate;
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

    public function createGiftCertificate($request){
        $validator = Validator::make($request->all(), [
            'certificate_title' => 'required',
            'certificate_code' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'certificate_discount_type' => 'required',
            'discount' => 'required',
            'accessibility' => 'required',
            'status' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $gift_certificate = $this->giftCertificate->createGiftCertificate($request);
		return Response::json(['status'=>200,'data'=>$gift_certificate]);
    }

    public function updateGiftCertificate($request){
        $validator = Validator::make($request->all(), [
            'gift_certificate_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $gift_certificate = $this->giftCertificate->updateGiftCertificate($request);
		return Response::json(['status'=>200,'data'=>$gift_certificate]);
    }

    public function deleteGiftCertificate($request){
        $validator = Validator::make($request->all(), [
            'gift_certificate_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $gift_certificate = $this->giftCertificate->deleteGiftCertificate($request);
		return Response::json(['status'=>200,'data'=>$gift_certificate]);
    }
}