<?php
namespace App\Services\Web\Brands;
use App\Models\Web\Brand;
use Response;
use Helper;

class BrandService
{
	function __construct(Brand $getBrand){
		$this->getBrand = $getBrand;
 	}

 	public function getBrands(){
 		$getBrands = $this->getBrand->getBrands();
 		return Response::json(['status'=>200,'data'=>$getBrands]);
 	}
 

}