<?php
namespace App\Services\Admin\Categories;
use App\Models\Admin\Category;
use App\Models\Admin\Attribute;
use App\Models\Admin\Option;
use Response;
use Helper;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Helpers\ExcelResponse;

class CategoriesService
{
	function __construct(
		Category $getCategory,
		Attribute $getAttribute,
		Option $getOption
	){
		$this->getCategory = $getCategory;
		$this->getAttribute = $getAttribute;
		$this->getOption = $getOption;
		
		$this->getCategories = collect([]);
	}
	
	public function deleteAttributeOption($option_id){
		$getCategory =  $this->getOption->deleteAttributeOption($option_id);
	}
	
	public function getCategory($category_id){
		
		 $getCategory =  $this->getCategory->getCategory($category_id);
		 $attributes = [];
		 if($getCategory->getAttr->count() > 0){
		 	$attributes = $getCategory->getAttr->map(function($item){
		 		$options = [];
		 		if($item->getOptions->count() > 0){
		 			$options = $item->getOptions->map(function($item){
		 				return [
		 					'id'=>$item->id,
                            'name'=>['data'=>$item->name,'class'=>''],
                            'image'=>(Object)[],
                            'preview'=>Helper::asset('public/images/attributes/'.$item->image),
                            'status'=>$item->status,
		 				];
		 			});
		 		}
		 		return [
		 			 'id' => $item->id,
                     'name' => [
                     	'data'=>$item->name,
                     	'class'=>''
                     ],
                     'options'=>$options
		 		];
		 	});
		 }
		 $addCategory=[
                'id'=>$getCategory->id,
                'name'=>$getCategory->name,
                'category_id'=>$getCategory->parent_id,
                'slug'=>$getCategory->slug,
                'pageTitle'=>$getCategory->title,
                'content'=>$getCategory->content,
                'status'=>$getCategory->status,
                'seoTitle'=>$getCategory->seo_title,
                'seoKeywords'=>$getCategory->seo_keywords,
                'seoDescription'=>$getCategory->seo_description,
                'attributes'=>$attributes,
				'icon' => $getCategory->icon
              ];
              return Response::json(['status'=>200,'data'=>$addCategory]);
	}

	public function updateChangeStatusCategory($request){
		$data = $request->all();
		$getCategory =  $this->getCategory->updateCategory($data['id'],['status'=>$data['status']]);
		return Response::json(['status'=>200,'data'=>$getCategory]);
	} 

	public function saveCategory($request){
		$data = $request->all();
		
		$addCategory = array(
			'name'                         => $data['name'],
			'seo_title'                    => $data['seoTitle'],
			'seo_description'              => $data['seoDescription'],
			'seo_keywords'                 => $data['seoKeywords'],
			'content'                 	   => $data['content'],
			'slug'                         => $data['slug'],
			'canonical_url'                => $data['slug'],
			'title'                        => $data['pageTitle'],
			'status'                       => $data['status'],
			'created_by'                   => $data['created_by']
		);
		if ($data['icon']!=null) {
			$messages = [
				'dimensions' => 'The category image dimension should be :max_widthx:max_height.',
			];
			$validator = Validator::make($request->all(), [
				'icon' => 'required|image|mimes:jpeg,png,jpg|dimensions:max_width=150,max_height=50',
			],$messages);
			if($validator->fails()){
				return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
			}
			$imageName = uniqid().'.'.$request->icon->extension();  
			$request->icon->move(public_path('images/category'), $imageName);
			$addCategory['icon'] = 'images/category/'.$imageName;
		}
		if($data['id'] != null && $data['id'] > 0){
			$category_id = $data['id'];
			$this->getCategory->updateCategory($category_id,  $addCategory);
		}else{
			$category_id = $this->getCategory->saveCategory($addCategory);
		}
		$data['attributes'] = json_decode($data['attributes'], true);
		if(!empty($data['attributes']) && $category_id > 0){
			foreach($data['attributes'] as $attribute){
				$attributeData = array(
					'name'=>$attribute['name']['data'],
					'category_id'=>$category_id,
					'slug'=>Helper::clean($attribute['name']['data']),
					'status'=>'A',
				);
				if($attribute['id'] != null && $attribute['id'] > 0){
					$attribute_id = $attribute['id'];
					$this->getAttribute->updateAttribute($attribute_id,$attributeData);
				}else{
					$attribute_id = $this->getAttribute->saveAttribute($attributeData);
				}
				if($attribute_id > 0 && !empty($attribute['options'])){
					foreach($attribute['options'] as $option){
						$options = array(
							'attribute_id'=>$attribute_id,
							'name'=>$option['name']['data'],
							'slug'=>Helper::clean($option['name']['data']),
							'status'=>$option['status'],
							'created_by'=>1,
						);
						if(!empty($option['image'])){
							$options['image']=$this->uploadImage($option['image']['image']);
						}
						if($option['id'] != null && $option['id'] > 0){
							$option_id = $option['id'];
							$this->getOption->updateOption($option_id,$options);
						}else{
							$option_id = $this->getOption->saveOption($options);
						}
					}
				}
			}

		}

		if($category_id > 0){
			return Response::json(['status'=>200,'message'=>'Successfully saved']);
		}else{
			return Response::json(['status'=>0,'message'=>'Failed to save']);

		}
		
	}

	public function uploadImage($imageBase64){
		 $png_url = "attribute-".time().".jpg";
	    $path = public_path().'/images/attributes/' . $png_url;
	    Image::make(file_get_contents($imageBase64))->save($path);
	    return $png_url;
	}

	public function getPaginatedSelectCategories($request){
		return $this->getCategory->getPaginatedSelectCategories($request);
	}

	public function getSelectCategories($request){
		$getCategories = $this->getCategory->getSelectCategories($request);

		$getCategories->map(function($item,$index){
			$this->getCategories->push([
				'id'=>$item->id,
				'name'=>$item->name,
				'sample_name'=>$item->name,
				'index'=>$item->id,
				'parent_id' => $item->parent_id,
				'status'=>$item->status,
				'icon' => $item->icon
			]);
			if($item->getItems->count() > 0)
			 $this->getCategoryRe($item->getItems,$item,$item->id);
		});

		if (isset($request['response_type'])) {
			$columns = [ 'ID', 'Name', 'Status' ];
			$rows = [ ];
			foreach ($this->getCategories as $category) {
				array_push($rows, [
					$category['id'], $category['name'], $category['status']
				]);
			}
			return ExcelResponse::export('Categories', $rows, $columns, 'Categories');
		}
		
		return $this->getCategories;
	}

	public function getCategoryRe($getItems,$parent_item,$parent_index){
		$getItems->map(function($item) use ($parent_item,$parent_index){
		$getName = $this->getCategories->where('index',$parent_index)->pluck('sample_name')->implode(' >> ');
			$this->getCategories->push([
				'id'=>$item->id,
				'name'=>$getName.' >> '.$item->name,
				'sample_name'=>$item->name,
				'parent_id'=>$item->parent_id,
				'index'=>$parent_index,
				'status'=>$item->status,
				'icon'=>$item->icon,
			]);
			if($item->getItems->count() > 0)
			 $this->getCategoryRe($item->getItems,$item,$parent_index);
		});

	}

	public function getSubCategories($request) {
		$sub_categories = $this->getCategory->getSubCategories($request);
		return Response::json([ 'status' => 200,'data' => $sub_categories ]);
	}

	public function getCategories($request) {
		$categories = $this->getCategory->getCategories($request);
		return Response::json([ 'status' => 200, 'data' => $categories ]);
	}
}