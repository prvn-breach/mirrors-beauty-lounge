<?php
namespace App\Http\Controllers\Web\Brands;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Brands\BrandService;
class BrandController extends Controller
{
	function __construct(BrandService $getBrandService){
		$this->getBrandService = $getBrandService;
	}

	public function getBrands(){
		return $this->getBrandService->getBrands();
	}
	
}