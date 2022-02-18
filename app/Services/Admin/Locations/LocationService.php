<?php
namespace App\Services\Admin\Locations;

use App\Models\Admin\Location;
use Illuminate\Support\Str;
use Response;
use Helper;

class LocationService
{ 
    function __construct(Location $location){
		$this->location = $location;
	}

    public function getLocations($request){
        $getLocations = $this->location->getLocations($request);
		return Response::json(['status'=>200,'data'=>$getLocations]);
    }

    public function getLocation($request){
        $getLocation = $this->location->getLocation($request);
		return Response::json(['status'=>200,'data'=>$getLocation]);
    }

    public function getDeletedLocations($request){
        $getDeletedLocations = $this->location->getDeletedLocations($request);
		return Response::json(['status'=>200,'data'=>$getDeletedLocations]);
    }

    public function createLocation($request){
        $createdLocation = $this->location->createLocation($request);
		return Response::json(['status'=>200,'data'=>$createdLocation]);
    }

    public function deleteLocation($request){
        $deletedLocation = $this->location->deleteLocation($request);
		return Response::json(['status'=>200,'data'=>$deletedLocation]);
    }

    public function deleteLocations($request){
        $deletedLocationStatus = $this->location->deleteLocations($request);
		return Response::json(['status'=>200,'data'=>$deletedLocationStatus]);
    }

    public function updateLocation($request){
        $updatedLocation = $this->location->updateLocation($request);
		return Response::json(['status'=>200,'data'=>$updatedLocation]);
    }
}