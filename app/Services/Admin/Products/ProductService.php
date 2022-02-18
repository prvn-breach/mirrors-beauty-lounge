<?php
namespace App\Services\Admin\Products;
use App\Models\Admin\Attribute;
use App\Models\Admin\Brand;
use App\Models\Admin\ProductCatlog;
use App\Models\Admin\ProductImage;
use App\Models\Admin\ProductAttribute;
use App\Models\Admin\ProductOption;
use App\Models\Admin\ProductSpecification;
use App\Models\Admin\Category;
use App\Models\Admin\StockTransfer;
use App\Models\Admin\Review;
use Illuminate\Support\Str;

use Response;
use Helper;
use Validator;

class ProductService
{
	function __construct(
		Attribute $getAttribute,
		Brand $getBrand,
		ProductCatlog $getProductCatlog,
		ProductImage $getProductImage,
		ProductAttribute $getProductAttribute,
		ProductOption $getProductOption,
		ProductSpecification $getProductSpecification,
		Category $getCategory,
		StockTransfer $getStockTransfer,
		Review $review
	){
		$this->getAttribute = $getAttribute;
		$this->getBrand = $getBrand;
		$this->getProductCatlog = $getProductCatlog;
		$this->getProductImage = $getProductImage;
		$this->getProductAttribute = $getProductAttribute;
		$this->getProductOption = $getProductOption;
		$this->getProductSpecification = $getProductSpecification;
		$this->getCategory = $getCategory;
		$this->getStockTransfer = $getStockTransfer;
		$this->review = $review;
		
	}

	public function changeProductStatus($request){
		$getStatus =  $this->getProductCatlog->changeProductStatus($request);
		return Response::json(['status'=>200,'data'=>$getStatus]);
	}

	public function deleteProductImage($image_id){
		$getDeleteProduct=$this->getProductImage->deleteProductImage($image_id);
		return Response::json(['status'=>200,'data'=>$getDeleteProduct]);
	} 

	public function deleteSpecificationProduct($specification_id){
		$getDeleteProduct=$this->getProductSpecification->deleteSpecificationProduct($specification_id);
		return Response::json(['status'=>200,'data'=>$getDeleteProduct]);
	}

	public function deleteProductAttributeOption($request){
		$data = $request->all();
		$getDeleteProduct =  $this->getProductOption->deleteProductAttributeOption($data['option_id']);
		$getAttribute = $this->getProductAttribute->getAttributeData($data['attribute_id']);
		if($getAttribute->getOptions->count() == 0){
			$this->getProductAttribute->getAttributeDeleteById($data['attribute_id']); 
		}
		return Response::json(['status'=>200,'data'=>$getDeleteProduct]);
	}

	public function getProduct($product_id){
		$getProduct = $this->getProductCatlog->getProduct($product_id);
		$getSpecification = [];
		if($getProduct->getProductSpecification->count() > 0){
			$getSpecification = $getProduct->getProductSpecification->map(function($item){
				return [
					'id'=>$item->id,
					'name'=>['data'=>$item->name,'class'=>''],
					'value'=>['data'=>$item->value,'class'=>''],
					'status'=>$item->status,
				];
			});
		}
		
		$images = [];
		if($getProduct->getProductImages->count() > 0){
			$images = $getProduct->getProductImages->map(function($item){
				return [
					'id'=>$item->id,
					'image'=>Helper::asset('public/images/products/'.$item->image),
					'name'=>$item->atr,
				];
			});	
		}
		$getAttribute = [];
		
		if($getProduct->getProductAttributes->count() > 0){
			$getAttribute = $getProduct->getProductAttributes->map(function($item){
				$getOptions = [];
				$attribute = $item;
				if($item->getProductOptions->count() > 0){
					$getOptions = $item->getProductOptions->map(function($item) use($attribute){
						return [
							'id'=>$item->id,
							'name'=>$item->name,
							'attribute_id'=>$item->attribute_id,
							'option_id'=>$item->option_id,
							'image'=>$item->image,
							'status'=>$item->status,
						];
					});
				}
				return [
					'id'=>$item->id,
					'name'=>$item->name,
					'category_id'=>$item->category_id,
					'attribute_id'=>$item->attribute_id,
					'status'=>$item->status,
					'get_options'=>$getOptions,
				];
			});
		}
		$tags = [];
		if(!empty($getProduct->tags)){
			$tags = Str::of(trim($getProduct->tags,'"'))->explode(',');
		}
		
		$getProduct = array(
			'id'=>$getProduct->id,
			'name'=>$getProduct->name,
			'slug' => $getProduct->slug,
			'category_id'=>$getProduct->category_id,
			'sub_category_id'=>$getProduct->sub_category_id,
			'availibility'=>$getProduct->availibility,
			'color'=>$getProduct->color,
			'size'=>$getProduct->size,
			'size_measurment'=>$getProduct->size_measurment,
			'brand'=>$getProduct->brand_id,
			'product_code'=>$getProduct->product_code,
			'product_quantity'=>$getProduct->product_quantity,
			'barcode'=>$getProduct->barcode,
			'sale_price'=>$getProduct->sale_price,
			'discount_price'=>$getProduct->discount_price,
			'discount'=>$getProduct->discount,
			'sku'=>$getProduct->sku,
			'upc'=>$getProduct->upc,
			'model_number'=>$getProduct->model_number,
			'is_exclusive_deal'=>$getProduct->is_exclusive_deal,
			'is_feature'=>$getProduct->is_feature,
			'is_new'=>$getProduct->is_new,
			'is_authorised_dealer'=>$getProduct->is_authorised_dealer,
			'active'=>$getProduct->active,
			'other_description'=>$getProduct->description,
			'warranty'=>$getProduct->warranty,
			'delivery'=>$getProduct->delivery,
			'status'=>$getProduct->status,
			'seo_title'=>$getProduct->seo_title,
			'seo_keyword'=>$getProduct->seo_keywords,
			'description'=>$getProduct->seo_desciption,
			'imagePreview'=>$images,
			'images'=>[],
			'attributes'=>$getAttribute,
			'specification'=>$getSpecification,
			'tags'=>$tags,
			
		);
		return Response::json(['status'=>200,'data'=>$getProduct]);
	}

	public function getProducts($request){
		$getProducts = $this->getProductCatlog->getproducts($request);
		return Response::json(['status'=>200,'data'=>$getProducts]);
	}

	public function saveProducts($request){
		$data = $request->all();

		$tags  = [];
		if(!empty($data['tags'])){

			$tags = trim(collect($data['tags'])->implode(','),'"');
		}

		$brand = Brand::find($data['brand']);

		$getCategory = $this->getCategory->getDepth($brand['category_id']);
		
		$addProduct = array(
			'name'=>$data['name'],
			'tags'=>json_encode($tags),
			'slug'=>$data['slug'],
			'category_id'=>$brand->category_id,
			'sub_category_id'=>$brand->sub_category_id,
			'category_parent_id'=>$brand->category_id,
			'brand_id'=>$data['brand'],
			'product_code'=>$data['product_code'],
			'product_quantity'=>$data['product_quantity'],
			'barcode'=>$data['barcode'],
			'sale_price'=>$data['sale_price'],
			'discount_price'=>$data['discount_price'],
			'discount'=>$data['discount'],
			'sku'=>$data['sku'],
			'upc'=>$data['upc'],
			'model_number'=>$data['model_number'],
			'is_exclusive_deal'=>$data['is_exclusive_deal'],
			'is_feature'=>$data['is_feature'],
			'is_new'=>$data['is_new'],
			'is_authorised_dealer'=>$data['is_authorised_dealer'],
			'active'=>$data['active'],
			'description'=>$data['other_description'],
			'warranty'=>$data['warranty'],
			'delivery'=>$data['delivery'],
			'status'=>$data['status'],
			'seo_title'=>$data['seo_title'],
			'availibility'=>$data['availibility'],
			'color'=>$data['color'],
			'size'=>$data['size'],
			'size_measurment'=>$data['size_measurment'],
			'seo_keywords'=>$data['seo_keyword'],
			'seo_desciption'=>$data['description'],
			'created_by'=>$data['created_by']
		);
		if($data['id'] != null && $data['id'] > 0 && $data['action'] == 1){
			if (ProductCatlog::where('slug', $data['slug'])->where('id','!=', $data['id'])->count()>0) {
				return response()->json(['status'=> 0,'data'=> [ 'slug' => [ 'The slug has been already taken.' ] ]], 200);
			}
			$this->getProductCatlog->updateProduct($data['id'],$addProduct);
		}else{
			$validator = Validator::make($request->all(), [
				'slug' => 'required|unique:product_catlogs,slug',
			]);
			if($validator->fails()){
				return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
			}
			$data['id'] = $this->getProductCatlog->saveProduct($addProduct);
		}
		if(!empty($data['images'])){
			foreach($data['images'] as $key=>$image){
				$priority = 'S';
				if($key == 0){
					$priority= 'P';
				}
				$saveImage = array(
					'product_id'=>$data['id'],
					'image'=>Helper::uploadImageBase64($image['image'],'product','products'),
					'atr'=>Helper::replace_dashes($data['name']).'-'.$key,
					'priority'=>$priority,
					'status'=>'A',
					'created_by'=>1,
				);
				if($image['id'] != null && $image['id'] > 0 && $data['action'] == 1){
					$this->getProductImage->updateImages($image['id'],$saveImage);
				}else{
					$this->getProductImage->saveImages($saveImage);

				}
			}
		}
		$getAttributeIsNeedDelete = false;
		$getAttributeFirst = $this->getProductAttribute->getAttributeByCategoryAndProduct($data['category_id'],$data['id']);
		if($getAttributeFirst == null && $data['action'] == 1){
			$this->getProductAttribute->getAttributeDelete($data['id']);
			$this->getProductOption->getOptionsDelete($data['id']);
			$getAttributeIsNeedDelete = true;
		}
		if(!empty($data['attributes'])){
			foreach($data['attributes'] as $attribute){
				$saveAttribute = array(
					'name'=>$attribute['name'],
					'slug'=>$this->clean($attribute['name']),
					'product_id'=>$data['id'],
					'category_id'=>$attribute['category_id'],
					'attribute_id'=>$attribute['attribute_id'],
					'status'=>'A',

				);

				if($attribute['id'] != null && $attribute['id'] > 0 && $data['action'] == 1){
					$getAttributeCheck = $this->getProductAttribute->getAttributeData($attribute['id']);
					if($getAttributeCheck == null){
						$attribute['id'] = $this->getProductAttribute->saveProductAttribute($saveAttribute);
					}else{
						$this->getProductAttribute->updateProductAttribute($attribute['id'],$saveAttribute);
					}
				}else{
					$attribute['id'] = $this->getProductAttribute->saveProductAttribute($saveAttribute);
				}

				
				if(!empty($attribute['get_options'])){
					foreach($attribute['get_options'] as $option){
						$saveOption = array(
							'name'=>$option['name'],
							'slug'=>$this->clean($option['name']),
							'product_id'=>$data['id'],
							'product_attribute_id'=>$attribute['id'],
							'attribute_id'=>$option['attribute_id'],
							'option_id'=>$option['option_id'],
							'image'=>$option['image'],
							'status'=>'A',
							'created_by'=>1
						);
						if($option['id'] != null && $option['id'] > 0 && $data['action'] == 1){
							$getOption = $this->getProductOption->getOption($option['id']);
							if($getOption == null){
								$this->getProductOption->saveProductOption($saveOption);
							}else{
								$this->getProductOption->updateProductOption($option['id'],$saveOption);
							}
						}else{
							$this->getProductOption->saveProductOption($saveOption);
						}
					}
				}
				
			}
		}

		if(!empty($data['specification'])){
			foreach($data['specification'] as $specification){
				$saveSpecification = array(
					'product_id'=>$data['id'],
					'name'=>$specification['name']['data'],
					'value'=>$specification['value']['data'],
					'status'=>'A',
					'created_by'=>1,
				);
				
				if($specification['id'] != null && $specification['id'] > 0 && $data['action'] == 1){
					$this->getProductSpecification->updateProductSpecification($specification['id'],$saveSpecification);
				}else{
					$this->getProductSpecification->saveProductSpecification($saveSpecification);

				}
			}
		}

		
		if($data['id'] > 0){
			return Response::json(['status'=>200,'data'=>'Successfully saved']);
		}



	}

	public function getSelectBrand($category_id){
		$getBrandByCategory = $this->getBrand->getBrandByCategory($category_id);
		return Response::json(['status'=>200,'data'=>$getBrandByCategory]);
	}
	
	public function getAttributeByCategories($category_id){
		$getAttributes =  $this->getAttribute->getAttributeByCategories($category_id);
		return Response::json(['status'=>200,'data'=>$getAttributes]);
	}

	public function clean($string) {
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		return strtolower($string);
	}

	public function getBestSellerProducts($request){
		$getBestSellerProducts = $this->getProductCatlog->getBestSellerProducts($request);
		return Response::json(['status'=>200,'data'=>$getBestSellerProducts]);
	}
	
	public function getNeverPurchasedProducts($request) {
		$getNeverPurchasedProducts = $this->getProductCatlog->getNeverPurchasedProducts($request);
		return Response::json(['status'=>200,'data'=>$getNeverPurchasedProducts]);
	}
	
	public function getStockTransferRecords($request) {
		$getStockTransferRecords = $this->getStockTransfer->getStockTransferRecords($request);
		return Response::json(['status'=>200,'data'=>$getStockTransferRecords]);
	}
	
	public function getStockTransferRecord($request) {
		$getStockTransferRecord = $this->getStockTransfer->getStockTransferRecord($request);
		return Response::json(['status'=>200,'data'=>$getStockTransferRecord]);
	}

	public function createStockTransfer($request) {
		$stock_transfer = $this->getStockTransfer->createStockTransfer($request);
		return Response::json(['status'=>200,'data'=>$stock_transfer]);
	}

	public function updateStockTransfer($request) {
		$stock_transfer = $this->getStockTransfer->updateStockTransfer($request);
		return Response::json(['status'=>200,'data'=>$stock_transfer]);
	}

	public function getProductReview($request) {
		$product_review = $this->review->getProductReview($request);
		return Response::json(['status'=>200,'data'=>$product_review]);
	}

	public function getProductReviews($request) {
		$product_reviews = $this->review->getProductReviews($request);
		return Response::json(['status'=>200,'data'=>$product_reviews]);
	}

	public function updateProductReview($request) {
		$product_review = $this->review->updateProductReview($request);
		return Response::json(['status'=>200,'data'=>$product_review]);
	}

	public function deleteProductReview($request) {
		$product_review = $this->review->deleteProductReview($request);
		return Response::json(['status'=>200,'data'=>$product_review]);
	}

	public function deleteProductReviews($request) {
		$product_review_status = $this->review->deleteProductReviews($request);
		return Response::json(['status'=>200,'data'=>$product_review_status]);
	}

	public function deleteProducts($request) {
		$product_status = $this->getProductCatlog->deleteProducts($request);
		return Response::json(['status'=>200,'data'=>$product_status]);
	}
}