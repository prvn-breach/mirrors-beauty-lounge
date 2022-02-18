<?php
namespace App\Services\Admin\Settings;

use App\Models\Admin\Warehouse;
use Illuminate\Support\Str;
use Response,Helper;

class SettingService
{ 
    function __construct(Warehouse $warehouse){
		$this->warehouse = $warehouse;
	}

    public function getWarehouse($request){
        $getWarehouse = $this->warehouse->getWarehouse($request);
		return Response::json(['status'=>200,'data'=>$getWarehouse]);
    }

    public function createWarehouse($request){
        $createWarehouse = $this->warehouse->createWarehouse($request);
		return Response::json(['status'=>200,'data'=>$createWarehouse]);
    }
}