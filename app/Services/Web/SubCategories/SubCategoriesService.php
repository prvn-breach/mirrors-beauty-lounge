<?php
namespace App\Services\Web\SubCategories;

use App\Models\Web\SubCategory;
use Response,Helper,Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Helpers\ExcelResponse;

class SubCategoriesService
{
	function __construct(SubCategory $subCategory){
		$this->subCategory = $subCategory;
	}

    public function getSubCategories($request) {
        $sub_categories = $this->subCategory->getSubCategories($request);
        return Response::json([ 'status' => 200,'data' => $sub_categories ]);
    }

    public function getSubCategory($request) {
        $sub_category = $this->subCategory->getSubCategory($request);
        return Response::json([ 'status' => 200,'data' => $sub_category ]);
    }
}