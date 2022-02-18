<?php
namespace App\Http\Controllers\Admin\Countries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Countries\CountryService;

class CountryController extends Controller
{
    function __construct(CountryService $countryService){
		$this->countryService = $countryService;
	}

    public function getCountriesList(Request $request) {
        return $this->countryService->getCountriesList($request);
    }
}