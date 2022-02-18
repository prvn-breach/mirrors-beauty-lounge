<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
   
   
    
	public function children()
	{
	    return $this->hasMany('App\Models\Web\Category', 'parent_id')->where('status','A')->with('getBanner')->withCount('getProductWithCategory');
	}  
	public function getProducts()
	{
	    return $this->hasMany(ProductCatlog::class, 'category_parent_id','id')->whereNull('deleted_at')->with(['getProductAttributes','getProductImages','getProductOptions','getProductSpecification','getCategory','getReviews','getBrand','getWishList']);
	}
	public function getProductWithCategory()
	{
	    return $this->hasMany(ProductCatlog::class, 'category_id','id');
	}
	public function getProductWithParentCategory()
	{
	    return $this->hasMany(ProductCatlog::class, 'category_parent_id','id');
	}
	public function getCategoriesHome(){
		return $this->where('parent_id',0)->with('getProducts')->get();
	}
	public function parent()
	{
	    return $this->belongsTo('App\Models\Web\Category', 'parent_id')->where('status','A')->with('getBanner');
	}

	public function getItems()
	{
	   return $this->children()->with('getItems');
	}
	public function getBanner(){
		return $this->hasOne(Banner::class,'category_id','id')->where('type','category')->with('getImages');
	}
	public function getSubCategories() {
		return $this->hasMany(SubCategory::class);
	}
	public function getCategories()
	{
	  $categories = Category::with('getSubCategories')->where('status','A')->where('parent_id',0)->with('getBanner')->withCount('getProductWithParentCategory')->get();
	  return $categories;
	}

	
	    

}
