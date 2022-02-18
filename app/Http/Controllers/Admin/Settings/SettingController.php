<?php
namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Settings\SettingService;

class SettingController extends Controller
{
    function __construct(SettingService $settingService){
		$this->settingService = $settingService;
	}

    public function getWarehouse(Request $request) {
        return $this->settingService->getWarehouse($request);
    }

    public function createWarehouse(Request $request) {
        return $this->settingService->createWarehouse($request);
    }
}