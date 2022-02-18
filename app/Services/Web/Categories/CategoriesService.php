<?php
namespace App\Services\Web\Categories;
use App\Models\Web\Category;
use Helper;
use Response;
class CategoriesService
{
	function __construct(Category $getCategory){
		$this->getCategory = $getCategory;
	}
	
	public function getCategoriesHome(){
		$getCategory =  $this->getCategory->getCategoriesHome();
		$getCategory = $getCategory->filter(function($item){
			return $item->getProducts->count() > 0;
		});
		
		 return Response::json(['status'=>200,'data'=>$getCategory]);
	}
	public function getCategories(){
		$getCategories = $this->getCategory->getCategories();
		return $getCategories;
	}


	

	
}