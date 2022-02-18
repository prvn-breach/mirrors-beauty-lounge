<?php
namespace App\Http\Controllers\Web\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Categories\CategoriesService;
class CategoryController extends Controller
{
	function __construct(CategoriesService $getCategoriesService){
		$this->getCategoriesService = $getCategoriesService;
	}
    public function getCategoriesHome(){
    	return $this->getCategoriesService->getCategoriesHome();
    }
    public function getCategories(){
    	return $this->getCategoriesService->getCategories();
    }
}
