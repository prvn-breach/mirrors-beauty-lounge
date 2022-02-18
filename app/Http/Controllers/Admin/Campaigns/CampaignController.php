<?php

namespace App\Http\Controllers\Admin\Campaigns;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Campaigns\CampaignService;

class CampaignController extends Controller
{
	function __construct(CampaignService $campaignService){
		$this->campaignService = $campaignService;
	}

    public function getEmailCampaigns(Request $request) {
        return $this->campaignService->getEmailCampaigns($request);
    }

    public function getEmailCampaign(Request $request) {
        return $this->campaignService->getEmailCampaign($request);
    }

    public function createEmailCampaign(Request $request) {
        return $this->campaignService->createEmailCampaign($request);
    }

    public function updateEmailCampaign(Request $request) {
        return $this->campaignService->updateEmailCampaign($request);
    }

    public function deleteEmailCampaign(Request $request) {
        return $this->campaignService->deleteEmailCampaign($request);
    }
}