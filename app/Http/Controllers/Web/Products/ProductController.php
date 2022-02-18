<?php
namespace App\Http\Controllers\Web\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Products\ProductService;
class ProductController extends Controller
{
	function __construct(ProductService $getProductService){
		$this->getProductService = $getProductService;
	}
  public function getTags(Request $request){
    return $this->getProductService->getTags($request);
  }
  public function getVat(){
    return $this->getProductService->getVat();
  } 
  public function getProduct(Request $request,$product_id){
    return $this->getProductService->getProduct($request,$product_id);
  }
   public function getProductDeals(){
    return $this->getProductService->getProductDeals();
  } 
  public function getProducts(Request $request,$params){
    return $this->getProductService->getProducts($request,$params);
  } 
  public function getProductFilter(Request $request){
    return $this->getProductService->getProductFilter($request);
  }
  public function getProductDescription(Request $request,$lang,$slug){
    return $this->getProductService->getProductDescription($request,$lang,$slug);
  }
  

  
}
