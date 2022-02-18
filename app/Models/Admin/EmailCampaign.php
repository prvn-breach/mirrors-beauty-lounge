<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ExcelResponse;
use App\Models\Admin\User;
use Carbon\Carbon;
use App\Mail\GenericMail;
use Illuminate\Support\Facades\Mail;

class EmailCampaign extends Model
{
    protected $fillable = [ 'campaign_title', 'subject_line', 'sender_name', 'sender_email', 'reply_to_email', 'campaign_type', 'campaign_status', 'content_type', 'message', 'customer_emails' ];

    public function getEmailCampaigns($request) {
        $email_campaigns = $this;
        $perPage = 10;

        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        if (isset($request['search'])) {
            $email_campaigns = $email_campaigns->where('campaign_title');
        }

        if (isset($request['campaign_status'])) {
            $email_campaigns = $email_campaigns->where('campaign_status');
        }

        if (isset($request['campaign_type'])) {
            $email_campaigns = $email_campaigns->where('campaign_type');
        }

        if (isset($request['response_type'])) {
            $email_campaigns = $email_campaigns->get();
            $columns = [ 'ID', 'Campaign Title', 'Subject Line', 'Sender Name', 'Sender Email', 'Reply To Email', 'Campaign Type', 'Content Type', 'Message', 'Customer Emails', 'Campaign Status' ];
            $rows = [];
            foreach ($email_campaigns as $email_campaign) {
                array_push($rows,[
                    $email_campaign['id'], $email_campaign['campaign_title'],
                    $email_campaign['subject_line'], $email_campaign['sender_name'],
                    $email_campaign['sender_email'], $email_campaign['reply_to_email'],
                    $email_campaign['campaign_type'], $email_campaign['content_type'],
                    $email_campaign['message'], $email_campaign['customer_emails'],
                    $email_campaign['campaign_status']
                ]);
            }
            return ExcelResponse::export('EmailCampaigns', $rows, $columns, 'EmailCampaigns');
        }

        return $email_campaigns->paginate($perPage);
    }

    public function getEmailCampaign($request) {
        $email_campaign = $this->where('id', $request['email_campaign_id'])->first();
        $email_campaign['customer_emails'] = json_decode($email_campaign['customer_emails'], true);
        return $email_campaign;
    }

    public function createEmailCampaign($request) {
        $data = [];
        foreach ($this->fillable as $index => $field) {
            if (isset($request[$field])) {
                $data[$field] = $request[$field];
            }
        }
        $template = "emails.default";
        $subject = $data['subject_line'];
        $body = $data['message'];
        $attachments = [];
        Mail::to($data['customer_emails'])
            ->cc([])
            ->bcc([])
            ->send(new GenericMail($template, $subject, $body, $attachments));
        $data['customer_emails'] = json_encode($data['customer_emails'], true);
        return $this->create($data);
    }

    public function updateEmailCampaign($request) {
        $data = [];
        foreach ($this->fillable as $index => $field) {
            if (isset($request[$field])) {
                $data[$field] = $request[$field];
            }
        }
        return $this->where('id', $request['email_campaign_id'])->update($data);
    }

    public function deleteEmailCampaign($request) {
        return $this->where('id', $request['email_campaign_id'])->delete();  
    }
}