<?php
namespace App\Http\Controllers\Admin\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Locations\LocationService;

class LocationController extends Controller
{
    function __construct(LocationService $locationService){
		$this->locationService = $locationService;
	}

    public function getLocations(Request $request) {
        return $this->locationService->getLocations($request);
    }

    public function getLocation(Request $request) {
        return $this->locationService->getLocation($request);
    }

    public function getDeletedLocations(Request $request) {
        return $this->locationService->getDeletedLocations($request);
    }

    public function createLocation(Request $request) {
        return $this->locationService->createLocation($request);
    }

    public function deleteLocation(Request $request) {
        return $this->locationService->deleteLocation($request);
    }

    public function deleteLocations(Request $request) {
        return $this->locationService->deleteLocations($request);
    }

    public function updateLocation(Request $request) {
        return $this->locationService->updateLocation($request);
    }
}