<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Attribute extends Model
{
    use HasFactory;


   
    public function getOptions(){
    	return $this->hasMany('App\Models\Admin\Option','attribute_id','id');
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

    

   

}
