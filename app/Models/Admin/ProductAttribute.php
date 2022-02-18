<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProductAttribute extends Model
{
    use HasFactory;


    public function getAttributeByCategoryAndProduct($category_id,$product_id){
        return $this->where('category_id',$category_id)->where('product_id',$product_id)->first();
    } 
    public function getOptions(){
        return $this->hasMany('App\Models\Admin\ProductOption','product_attribute_id','id');
    }
    public function getAttributeData($attribute_id){
        
        return $this->where('id',$attribute_id)->with('getOptions')->first();
    }

    public function getAttributeDelete($product_id){
        return $this->where('product_id',$product_id)->delete();
    } 
    public function getAttributeDeleteById($attribute_id){
        return $this->where('id',$attribute_id)->delete();
    }
    public function saveProductAttribute($data){
        return $this->insertGetId($data);
    }

    public function updateProductAttribute($id,$data){
        return $this->where('id',$id)->update($data);
    }

    public function getProductOptions(){
        return $this->hasMany(ProductOption::class,'product_attribute_id','id');
    } 

}
