<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Attribute extends Model
{
    use HasFactory;


   
    public function getOptions(){
    	return $this->hasMany('App\Models\Web\Option','attribute_id','id');
    }

    public function updateAttribute($attribut_id,$data){
    	return $this->where('id',$attribut_id)->update($data);	
    } 
    public function saveAttribute($data){
        return $this->insertGetId($data);  
    } 

    public function getAttributeByCategories($category_id){
        return $this->where('category_id',$category_id)->with('getOptions')->get();
    }
    public function getProductFilter($request){
        // $data = $this->getProductFilterParam($params);
        $getAttributes = $this->with('getOptions');
        $getBrands = Brand::where('status', 'A')->whereNull('deleted_at');
        $getCategories = Category::where('status', 'A')->whereNull('deleted_at');
        $getSubCategories = SubCategory::where('status', 'A')->whereNull('deleted_at');

        if(isset($request['category']) && !empty($request['category'])) {
            $category_slugs = explode(',',$request['category']);
            $category_ids = Category::where('status', 'A')->whereIn('slug', $category_slugs)->pluck('id');
            $sub_category_ids = Category::where('status', 'A')->whereIn('parent_id', $category_ids)->pluck('id');
            $category_ids = array_merge($category_ids->toArray(), $sub_category_ids->toArray());
            $getAttributes =  $getAttributes->whereIn('category_id',$category_ids);
            $getBrands = $getBrands->whereIn('category_id', $category_ids);
        }

        if(isset($request['sub_category']) && !empty($request['sub_category'])) {
            $sub_category_slugs = explode(',',$request['sub_category']);
            $sub_category_ids = SubCategory::where('status', 'A')->whereIn('slug', $sub_category_slugs)->pluck('id');
            $nested_sub_category_ids = SubCategory::where('status', 'A')->whereIn('sub_category_id', $sub_category_ids)->pluck('id');
            $category_ids = array_merge($sub_category_ids->toArray(), $nested_sub_category_ids->toArray());
            $getBrands = $getBrands->whereIn('sub_category_id', $sub_category_ids);
        }

        if (isset($request['brand']) && !empty($request['brand'])) {
            $brand_slugs = explode(',',$request['brand']);
            $category_ids = Brand::where('status', 'A')->whereIn('slug', $brand_slugs)->pluck('category_id');
            $sub_category_ids = Category::where('status', 'A')->whereIn('parent_id', $category_ids)->pluck('id');
            $category_ids = array_merge($category_ids->toArray(), $sub_category_ids->toArray());
            $getAttributes =  $getAttributes->whereIn('category_id', $category_ids);
            $getCategories = $getCategories->whereIn('id', $category_ids);
        }

        $attributes = $this->where('status', 'A')->get();
        foreach ($attributes as $attribute) {
            if (isset($request[$attribute['slug']]) && !empty($request[$attribute['slug']])) {
                $category_ids = [$attribute['category_id']];
                $sub_category_ids = Category::where('status', 'A')->whereIn('parent_id', $category_ids)->pluck('id');
                $category_ids = array_merge($category_ids, $sub_category_ids->toArray());
                $getAttributes = $getAttributes->whereIn('category_id', $category_ids);
                $getCategories = $getCategories->whereIn('id', $category_ids);
                $getBrands = $getBrands->whereIn('category_id', $category_ids);
            }
        }
        
        return ['getAttributes'=>$getAttributes->get(),'getCategories'=>$getCategories->get(), 'getSubCategories'=>$getSubCategories->get(),'getBrands'=>$getBrands->get()];
    }
   
     public function getCategorySlug($slug){
        $getCategory = Category::where('status', 'A')->where('slug',$slug)->first();

        return $getCategory;
    }
    public function getBrandSlug($slug){
        $getBrand = Brand::where('status', 'A')->where('slug',$slug)->first();
        return $getBrand;
    }

    public function getProductFilterParam($params){
        if(isset($params[1])){
           switch ($params[1]) {
               case 'product':
                   $getSlug =  $this->getCategorySlug($params[2]);
                    return ['type'=>'product','data'=> $getSlug];
                   break;
                case 'brand':
                   $getSlug =  $this->getBrandSlug($params[2]);
                    return ['type'=>'brand','data'=> $getSlug];
                   break;
                case 'category':
                    $getSlug =  $this->getCategorySlug($params[2]);
                    return ['type'=>'category','data'=> $getSlug];
                   break;
           }
           return $getProducts;
        }
    }

    public function getParentCategoryBySub($id){
         return Category::where('status', 'A')->where('parent_id',$id)->with('getBanner')->get();
    }
    public function getBrands($id){
         return Brand::where('status', 'A')->where('category_id',$id)->get();
    }







    

   

}
