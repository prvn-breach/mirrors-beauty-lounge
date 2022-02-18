<?php
namespace App\Http\Controllers\Admin\SubCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\SubCategories\SubCategoriesService;

class SubCategoryController extends Controller
{
	function __construct(SubCategoriesService $subCategoriesService){
		$this->subCategoriesService = $subCategoriesService;
	}

    public function getSubCategories(Request $request){
        return $this->subCategoriesService->getSubCategories($request);
    }

    public function getSubCategory(Request $request){
        return $this->subCategoriesService->getSubCategory($request);
    }

    public function createSubCategory(Request $request){
        return $this->subCategoriesService->createSubCategory($request);
    }

    public function deleteSubCategory(Request $request){
        return $this->subCategoriesService->deleteSubCategory($request);
    }

    public function updateSubCategory(Request $request){
        return $this->subCategoriesService->updateSubCategory($request);
    }
}
