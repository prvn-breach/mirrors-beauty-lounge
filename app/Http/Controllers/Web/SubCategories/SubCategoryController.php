<?php
namespace App\Http\Controllers\Web\SubCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\SubCategories\SubCategoriesService;

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
}
