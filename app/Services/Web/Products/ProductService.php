<?php
namespace App\Services\Web\Products;
use App\Models\Web\Attribute;
use App\Models\Web\Brand;
use App\Models\Web\ProductCatlog;
use App\Models\Web\ProductImage;
use App\Models\Web\ProductAttribute;
use App\Models\Web\ProductOption;
use App\Models\Web\ProductSpecification;
use App\Models\Web\Vat;

use Response;
use Helper;
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
		Vat $getTax
	){
		$this->getAttribute = $getAttribute;
		$this->getBrand = $getBrand;
		$this->getProductCatlog = $getProductCatlog;
		$this->getProductImage = $getProductImage;
		$this->getProductAttribute = $getProductAttribute;
		$this->getProductOption = $getProductOption;
		$this->getProductSpecification = $getProductSpecification;
		$this->getTax = $getTax;
		
	}
	public function getTags($request){
		$getTags = $this->getProductCatlog->getTags($request);
		$getPushArray = collect([]);
		if($getTags->count() > 0){
			$getArrays= $getTags->filter(function($item){
				return !empty($item->tags);
			})->each(function($item) use($getPushArray){

				$product = $item;
				$getTagsArray = explode(',',trim($item->tags,'"'));
				collect($getTagsArray)->each(function($item) use($product,$getPushArray){
						//  $getPushArray->push([
						// 	'id'=>$product->id,
						// 	'name'=>$item,
						// 	'category'=>$product->getCategory->slug
						// ]);
						$getPushArray->push($item);
				});
			});
		}
		return $getPushArray->unique();
	}
	public function getVat(){
		$getVat = $this->getTax->getVat();
		return Response::json(['status'=>200,'data'=>$getVat]);
	}
	public function getProduct($request,$product_id){
		$getProduct = $this->getProductCatlog->getProduct($request,$product_id);
		
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
			$tags = explode(trim($getProduct->tags,'"'),',');
		}
		
		$getProduct = array(
			'id'=>$getProduct->id,
			'name'=>$getProduct->name,
			'category_id'=>$getProduct->category_id,
			'sub_category_id'=>$getProduct->sub_category_id,
			'availibility'=>$getProduct->availibility,
			'brand'=>$getProduct->brand_id,
			'product_code'=>$getProduct->product_code,
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
			'rating'=>$getProduct->getReviews->avg('star'),
			
		);
		return Response::json(['status'=>200,'data'=>$getProduct]);
	}
	public function getProducts($request,$params){
		$getProducts = $this->getProductCatlog->getproducts($request,$this->getPage($params));
		$getProducts->map(function($item){
			$item->rating = $item->getReviews->avg('star');
			if($item->rating == null){
				$item->rating = 0;
			}
		});
		return Response::json(['status'=>200,'data'=>$getProducts]);
	}
	public function getProductDeals(){
		$getProducts = $this->getProductCatlog->getProductDeals();
		$getProducts->map(function($item){
			$item->rating = $item->getReviews->avg('star');
			if($item->rating == null){
				$item->rating = 0;
			}
		});
		return Response::json(['status'=>200,'data'=>$getProducts]);
	}
	public function getProductFilter($request){

		$getProducts = $this->getAttribute->getProductFilter($request);
		return Response::json(['status'=>200,'data'=>$getProducts]);
	}
	public function getProductDescription($request,$lang,$slug){
		$getProducts = $this->getProductCatlog->getProductDescription($request,$lang,$slug);
		$getProducts->rating = $getProducts->getReviews->avg('star');
		if($getProducts->rating == null){
				$getProducts->rating = 0;
			}
		return Response::json(['status'=>200,'data'=>$getProducts]);
	}

	public function getPage($slugNum = null)
    {
        if($slugNum) 
        {
            $slugNum = explode('/', $slugNum);
            return $slugNum;
            // all your slugs here.. to play with
        }
        return null;
    }
	


	

	
}