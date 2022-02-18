<?php
namespace App\Services\Admin\Brand;
use Validator;
use Helper,Response;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
class BrandService
{
	
        function __construct(Brand $getBrand){
            $this->getBrand = $getBrand;
        }
        public function updateChangeStatusBrand($request){
            $data = $request->all();
            $getBrand =  $this->getBrand->updateChangeStatusBrand($data['id'],['status'=>$data['status']]);
            return Response::json(['status'=>200,'data'=>$getBrand]);
        } 
        public function getBrand($brand_id){
            $getBrand =  $this->getBrand->getBrand($brand_id);
            return Response::json(['status'=>200,'data'=>$getBrand]);
        } 
        public function getBrands($request){
            return $this->getBrand->getBrands($request);
        }
        public function addBrand($request){

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'supplier_name' => 'required',
                'pageTitle' => 'required',
                'slug' => 'required',
                'status' => 'required',
                'category_id' => 'required',
                'created_by'=> 'required'
            ]);
            if($validator->fails()){
                return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
            }
              
            $data = $request->all();

            $addBrand = array(
                'is_auth' => $data['isAuth'],
                'name' => $data['name'],
                'supplier_name' => $data['supplier_name'],
                'title' => $data['pageTitle'],
                'seo_description' => $data['seoDescription'],
                'seo_keywords' => $data['seoKeywords'],
                'seo_title' => $data['seoTitle'],
                'slug' => $data['slug'],
                'canonical_url'=>$data['slug'],
                'status' => $data['status'],
                'content' => $data['content'],
                'category_id' => $data['category_id'],
                'sub_category_id' => $data['sub_category_id'],
                'created_by'=>$data['created_by'],
            );
           
            if($data['image'] != null){
                $messages = [
                    'dimensions' => 'The brand image dimension should be :max_widthx:max_height.',
                    'max'=> 'The Max size should be less than :maxkb'
                ];
                $validator = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,png,jpg|max:50|dimensions:max_width=150,max_height=50',
                ],$messages);
                if($validator->fails()){
                        return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
                }
                $imageName = uniqid().'.'.$request->image->extension();  
                $request->image->move(public_path('images/brands'), $imageName);
                $addBrand['image'] = $imageName;
            }
            if($data['id'] != null){
                $getId=$this->getBrand->updateBrand($data['id'],$addBrand);
            }else{
                $validator = Validator::make($request->all(), [
                    'slug' => 'unique:brands,slug',
                ]);
                if($validator->fails()){
                    return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
                }
                $getId=$this->getBrand->saveBrand($addBrand);

            }

            return Response::json(['status'=>200,'data'=>'', 'message' => 'Successfully brand created']);
        }

        public function deleteBrands($request) {
            $status =  $this->getBrand->deleteBrands($request);
            return Response::json(['status'=>200,'data'=>$status]);
        }
}
	