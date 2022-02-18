<?php
namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Brand\BrandService;

class BrandController extends Controller
{
   function __construct(BrandService $getBrandService){
      $this->getBrandService = $getBrandService;
   }

   public function updateChangeStatusBrand(Request $request){
      return $this->getBrandService->updateChangeStatusBrand($request);
   } 

   public function getBrand($brand_id){
      return $this->getBrandService->getBrand($brand_id);
   } 

   public function getBrands(Request $request){
      return $this->getBrandService->getBrands($request);
   }

   public function addBrand(Request $request){
      $getAddBrandResponse = $this->getBrandService->addBrand($request);
      return $getAddBrandResponse;
   }

   public function deleteBrands(Request $request){
      return $this->getBrandService->deleteBrands($request);
   } 
}
