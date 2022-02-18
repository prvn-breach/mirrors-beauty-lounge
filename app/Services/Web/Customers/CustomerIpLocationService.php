<?php
namespace App\Services\Web\Customers;
use App\Models\Web\City;
use App\Models\Web\Country;
use App\Models\Web\Continent;
use App\Models\Web\State;
use App\Models\Web\CustomerLog;
use Helper,Response;
class CustomerIpLocationService
{
	function __construct(Continent $getContinent, Country $getCountry, State $getState, City $getCity, CustomerLog $getCustomerLog){
		$this->getContinent = $getContinent;
		$this->getCountry = $getCountry;
		$this->getState = $getState;
		$this->getCity = $getCity;
		$this->getCustomerLog = $getCustomerLog;
	}

	public function getCustomerIpLocation(){
		$getFindIp = in_array($_SERVER["REMOTE_ADDR"], ['::1','127.0. 0.1']);
		$ipAddress = '217.165.61.12';
		if(!$getFindIp){
			$ipAddress = $_SERVER["REMOTE_ADDR"];
		}
		$getCustomerLog = $this->getCustomerLog->getCustomerLog($ipAddress);
		if($getCustomerLog != null){
			$getData = json_decode($getCustomerLog->response);
			$getCity = $this->saveCities($getData);
			if($getCity > 0){
				
				return Response::json([
					'status'=>200,
					'country_code'=>$getData->geoplugin_countryCode,
					'country_name'=>$getData->geoplugin_countryName,
					'ip_address'=>$getData->geoplugin_request,
					'get_countries'=>$this->getCountries($getData),
				]);
		}
		}else{
			$getInfoIp = Helper::ipInfo($ipAddress);
			if($getInfoIp->geoplugin_status == 200){
				$getArrayIp = [
					'ip_address'=>$getInfoIp->geoplugin_request,
					'response'=>json_encode($getInfoIp)
				];
				$this->getCustomerLog->getInsert($getArrayIp);
				$getCity = $this->saveCities($getInfoIp);
				if($getCity > 0){
					return Response::json([
							'status'=>200,
							'country_code'=>$getInfoIp->geoplugin_countryCode,
							'country_name'=>$getInfoIp->geoplugin_countryName,
							'ip_address'=>$getInfoIp->geoplugin_request,
							'get_countries'=>$this->getCountries($getInfoIp),
						]);
				}
			}

		}


	}

	public function saveContinent($data){
		$getContinent = $this->getContinent->getContinent($data->geoplugin_continentCode);
		if($getContinent == null){
			return $this->getContinent->saveContinent([
				'name'=>$data->geoplugin_continentName,
				'code'=>$data->geoplugin_continentCode,
				'status'=>'A'
			]);
		}else{
			return $getContinent->id;
		}
	}
	public function saveCountry($continent_id,$data){
		$getCountry=$this->getCountry->getCountry($data->geoplugin_countryCode);
		if($getCountry == null){
			return $this->getCountry->getInsert([
				'name'=>$data->geoplugin_countryName,
				'code'=>$data->geoplugin_countryCode,
				'continent_id'=>$continent_id,
				'currency_code'=>$data->geoplugin_currencyCode,
				'currency_symbol'=>$data->geoplugin_currencySymbol,
				'currency_symbol_UTF8'=>$data->geoplugin_currencySymbol_UTF8,
				'currency_converter'=>$data->geoplugin_currencyConverter,
				'status'=>'A'
			]);
		}else{
			return $getCountry->id;
		}
	}

	public function saveState($continent_id,$country_id,$data){
		$getState = $this->getState->getState($data->geoplugin_regionCode);
		if($getState == null){
			return $this->getState->getInsert([
				'name'=>$data->geoplugin_regionName,
				'code'=>$data->geoplugin_regionCode,
				'country_id'=>$country_id,
				'continent_id'=>$continent_id,
				'status'=>'A'
			]);
		}else{
			return $getState->id;
		}
	}
	public function saveCities($data){
		$continent_id = $this->saveContinent($data);
		$country_id = $this->saveCountry($continent_id,$data);
		$state_id = $this->saveState($continent_id,$country_id,$data);
		$getCity = $this->getCity->getCity($data->geoplugin_city);
		if($getCity == null){
			$getArrayCity = array(
				'name'=>$data->geoplugin_city,
				'state_id'=>$state_id,
				'country_id'=>$country_id,
				'continent_id'=>$continent_id,
				'status'=>'A',
			);
			return $this->getCity->getInsert($getArrayCity);
		}else{
			return $getCity->id;
		}
	}

	public function getCountries($getData){
		$getCountries = $this->getCountry->getCountries();
		if($getCountries->count() > 0){
			$getCountries = $getCountries->map(function($item) use($getData){
				if($item->code == $getData->geoplugin_countryCode){
					$item->active = 1;
				}else{
					$item->active = 0;
				}
				return $item;
			});
		}
		return $getCountries;
	}

}
	