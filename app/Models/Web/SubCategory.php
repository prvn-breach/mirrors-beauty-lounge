<?php
namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ExcelResponse;

class SubCategory extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [ 'name', 'slug', 'category_id', 'sub_category_id', 'icon', 'content',	'canonical_url', 'title', 'seo_title', 'seo_description', 'seo_keywords', 'status', 'created_by' ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function products() {
        return $this->hasMany(ProductCatlog::class, 'sub_category_id')->with(['getProductAttributes','getProductImages','getProductOptions','getProductSpecification','getCategory','getReviews','getBrand','getWishList']);
    }

    public function getSubCategories($request) {
        $sub_categories = $this->with(['category', 'products']);
        
        if (isset($request['sortBy']) && isset($request['orderBy'])) {
            $sub_categories = $sub_categories->orderBy($request['sortBy'], $request['orderBy']);
        }

        if (isset($request['category_id'])) {
            $sub_categories = $sub_categories->where('category_id', $request['category_id']);
        }

        if (isset($request['created_by'])) {
            $sub_categories = $sub_categories->where('created_by', $request['created_by']);
        }

        if (isset($request['response_type'])) {
			$columns = [ 'ID', 'Category', 'Sub Category', 'Status' ];
			$rows = [ ];
            $sub_categories = $sub_categories->get();
			foreach ($sub_categories as $sub_category) {
				array_push($rows, [
					$sub_category['id'], $sub_category['category']['name'], $sub_category['name'], $sub_category['status']
				]);
			}
			return ExcelResponse::export('SubCategories', $rows, $columns, 'SubCategories');
		}

        if (isset($request['per_page'])) {
            return $sub_categories->paginate($request['per_page']);
        }

        return $sub_categories->get();
    }

    public function getSubCategory($request) {
        return $this->where('id', $request['sub_category_id'])->first();
    }
}