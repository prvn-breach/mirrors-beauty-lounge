<?php
namespace App\Services\Admin\Countries;

use App\Models\Admin\Country;
use Illuminate\Support\Str;
use Response,Helper;

class CountryService
{
    function __construct(Country $country){
		$this->country = $country;
	}

    public function getCountriesList($request) {
        $countries = $this->country->getCountries();
        return Response::json([ 'status'=> 200,'data'=> $countries ]);
    }
}