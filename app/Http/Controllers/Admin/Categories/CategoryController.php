<?php
namespace App\Http\Controllers\Admin\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Categories\CategoriesService;
class CategoryController extends Controller
{
	function __construct(CategoriesService $getCategoriesService){
		$this->getCategoriesService = $getCategoriesService;
	}

    public function deleteAttributeOption($option_id){
        return $this->getCategoriesService->deleteAttributeOption($option_id);
    }

    public function getCategory($category_id){
        return $this->getCategoriesService->getCategory($category_id);
    }

	public function updateChangeStatusCategory(Request $request){
        return $this->getCategoriesService->updateChangeStatusCategory($request);
    } 

    public function getPaginatedSelectCategories(Request $request){
        return $this->getCategoriesService->getPaginatedSelectCategories($request);
    }

    public function getSelectCategories(Request $request){
        return $this->getCategoriesService->getSelectCategories($request);
    }

    public function getCategories(Request $request){
        return $this->getCategoriesService->getCategories($request);
    }

    public function getSubCategories(Request $request){
        return $this->getCategoriesService->getSubCategories($request);
    }

    public function saveCategory(Request $request){
    	return $this->getCategoriesService->saveCategory($request);
    }
}
