<?php
namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Products\ProductService;

class ProductController extends Controller
{
    function __construct(ProductService $getProductService){
        $this->getProductService = $getProductService;
    }
    public function changeProductStatus(Request $request){
        return $this->getProductService->changeProductStatus($request);
    } 
    public function deleteProductImage($image_id){
        return $this->getProductService->deleteProductImage($image_id);
    } 
    public function deleteSpecificationProduct($specification_id){
        return $this->getProductService->deleteSpecificationProduct($specification_id);
    }
    public function deleteProductAttributeOption(Request $request){
        return $this->getProductService->deleteProductAttributeOption($request);
    }
    public function getProduct($product_id){
        return $this->getProductService->getProduct($product_id);
    }
    public function getProducts(Request $request){
        return $this->getProductService->getProducts($request);
    }
    public function getSelectBrand($category_id){
        return $this->getProductService->getSelectBrand($category_id);
    }
    public function saveProducts(Request $request){
        return $this->getProductService->saveProducts($request);
    }
    public function getAttributeByCategories($category_id){
        return $this->getProductService->getAttributeByCategories($category_id);
    }

    public function getBestSellerProducts(Request $request){
        return $this->getProductService->getBestSellerProducts($request);
    }

    public function getNeverPurchasedProducts(Request $request){
        return $this->getProductService->getNeverPurchasedProducts($request);
    }

    public function getStockTransferRecords(Request $request){
        return $this->getProductService->getStockTransferRecords($request);
    }

    public function getStockTransferRecord(Request $request){
        return $this->getProductService->getStockTransferRecord($request);
    }

    public function createStockTransfer(Request $request){
        return $this->getProductService->createStockTransfer($request);
    }
    
    public function updateStockTransfer(Request $request){
        return $this->getProductService->updateStockTransfer($request);
    }

    public function getProductReview(Request $request) {
        return $this->getProductService->getProductReview($request);
    }

    public function getProductReviews(Request $request) {
        return $this->getProductService->getProductReviews($request);
    }

    public function updateProductReview(Request $request) {
        return $this->getProductService->updateProductReview($request);
    }

    public function deleteProductReview(Request $request) {
        return $this->getProductService->deleteProductReview($request);
    }

    public function deleteProductReviews(Request $request) {
        return $this->getProductService->deleteProductReviews($request);
    }

    public function deleteProducts(Request $request) {
        return $this->getProductService->deleteProducts($request);
    }
}
