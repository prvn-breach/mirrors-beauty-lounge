<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CategoryMapping extends Model
{
    use HasFactory;

     public function getCategoryChild(){
    	return $this->hasOne(Category::class,'id','child_id');
    } 
    public function getBrandMapping(){
    	return $this->hasMany(BrandMapping::class,'category_id','parent_id')->with('getBrand');
    }
    public function getCategoryParent(){
    	return $this->hasOne(Category::class,'id','parent_id');
    }
}
