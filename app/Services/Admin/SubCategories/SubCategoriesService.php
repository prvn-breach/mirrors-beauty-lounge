<?php
namespace App\Services\Admin\SubCategories;

use App\Models\Admin\SubCategory;
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

    public function createSubCategory($request) {
        $messages = [
            'dimensions' => 'The category image dimension should be :max_widthx:max_height.',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg|dimensions:max_width=150,max_height=50',
        ],$messages);
        if($validator->fails()){
            return response()->json([ 'status'=>0, 'data'=>$validator->errors() ], 200);
        }
        $imageName = uniqid().'.'.$request->icon->extension();  
        $request->icon->move(public_path('images/category'), $imageName);
        $data = $request->all();
        $data['icon'] = 'images/category/'.$imageName;
        $sub_category = $this->subCategory->createSubCategory($data);
        return Response::json([ 'status' => 200,'data' => $sub_category ]);
    }

    public function updateSubCategory($request) {
        $data = $request->all();
        if ($request['icon']!=null) {
            $messages = [
                'dimensions' => 'The category image dimension should be :max_widthx:max_height.',
            ];
            $validator = Validator::make($request->all(), [
                'icon' => 'required|image|mimes:jpeg,png,jpg|dimensions:max_width=150,max_height=50',
            ],$messages);
            if($validator->fails()){
                return response()->json([ 'status'=>0, 'data'=>$validator->errors() ], 200);
            }
            $imageName = uniqid().'.'.$request->icon->extension();  
            $request->icon->move(public_path('images/category'), $imageName);
            
            $data['icon'] = 'images/category/'.$imageName;
        } else {
            unset($data['icon']);
        }
        $updated_sub_category = $this->subCategory->updateSubCategory($data);
        return Response::json([ 'status' => 200,'data' => $updated_sub_category ]);
    }

    public function deleteSubCategory($request) {
        $sub_category = $this->subCategory->deleteSubCategory($request);
        return Response::json([ 'status' => 200,'data' => $sub_category ]);
    }
}