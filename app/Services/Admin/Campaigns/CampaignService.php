<?php

namespace App\Services\Admin\Campaigns;

use Illuminate\Http\Request;
use App\Models\Admin\EmailCampaign;
use Helper,Response;
use Validator;

class CampaignService
{
    function __construct(EmailCampaign $emailCampaign){
        $this->emailCampaign = $emailCampaign;
    }

    public function getEmailCampaigns($request){
        $email_campaigns =  $this->emailCampaign->getEmailCampaigns($request);
        return Response::json(['status'=>200,'data'=>$email_campaigns]);
    }

    public function getEmailCampaign($request){
        $email_compaign =  $this->emailCampaign->getEmailCampaign($request);
        return Response::json(['status'=>200,'data'=>$email_compaign]);
    }

    public function createEmailCampaign($request){
        $validator = Validator::make($request->all(), [
            'campaign_title' => 'required',
            'subject_line' => 'required',
            'sender_name' => 'required',
            'sender_email' => 'required',
            'reply_to_email' => 'required',
            'campaign_type' => 'required',
            'content_type' => 'required',
            'message' => 'required',
            'customer_emails' => 'required|array',
            'customer_emails.*' => 'required|exists:users,email',
            'campaign_status' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $email_compaign =  $this->emailCampaign->createEmailCampaign($request);
        return Response::json(['status'=>200,'data'=>$email_compaign]);
    }

    public function updateEmailCampaign($request){
        $validator = Validator::make($request->all(), [
            'email_campaign_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $email_compaign = $this->emailCampaign->updateEmailCampaign($request);
        return Response::json(['status'=>200,'data'=>$email_compaign]);
    }

    public function deleteEmailCampaign($request){
        $validator = Validator::make($request->all(), [
            'email_campaign_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $email_compaign =  $this->emailCampaign->deleteEmailCampaign($request);
        return Response::json(['status'=>200,'data'=>$email_compaign]);
    }
}