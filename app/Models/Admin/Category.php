<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ExcelResponse;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [ 'name',	'parent_id', 'icon', 'seo_title', 'seo_description', 'seo_keywords', 'slug', 'content',	'canonical_url', 'title', 'status', 'created_by' ];

    public function getCategory($category_id) {
    	return $this->where('id',$category_id)->with('getAttr')->first();
    }

    public function getDepth($id) {
        $categories= $this->where('id',$id)->first();
        if($categories->parent_id > 0) {
            return $this->findCategoryParent($categories->parent_id);
        }
        return $categories;
    }

    public function findCategoryParent($parent_id){
    	$categories= $this->where('id',$parent_id)->first();
    	if ($categories) {
           if ($categories->parent_id == 0) {
               return $categories;
           } else {
               return $this->findCategoryParent($categories->parent_id);
           }
       }
    }

    public function getAttr(){
    	return $this->hasMany(Attribute::class,'category_id')->with('getOptions');
    }

    public function children(){
	    return $this->hasMany('App\Models\Admin\Category', 'parent_id')->orderBy('id','DESC');
	}

	public function parent(){
	    return $this->belongsTo('App\Models\Admin\Category', 'parent_id');
	}

	public function getItems(){
	   return $this->children()->with('getItems');
	}

    public function getPaginatedSelectCategories($request) {
        $categories = Category::with('getItems');
        
        if (isset($request['sortBy']) && isset($request['orderBy'])) {
            $categories = $categories->orderBy($request['sortBy'], $request['orderBy']);
        }

        if (isset($request['created_by'])) {
            $categories = $categories->where('created_by', $request['created_by']);
        }

        return $categories->paginate(50);
    }

	public function getCategories($request){
        $categories = $this;
        
        if (isset($request['sortBy']) && isset($request['orderBy'])) {
            $categories = $categories->orderBy($request['sortBy'], $request['orderBy']);
        }

        if (isset($request['created_by'])) {
            $categories = $categories->where('created_by', $request['created_by']);
        }

        if (isset($request['with_trashed'])) {
            $categories = $categories->withTrashed();
        }

        if (isset($request['response_type'])) {
			$columns = [ 'ID', 'Name', 'Status' ];
			$rows = [ ];
            $categories = $categories->get();
			foreach ($categories as $category) {
				array_push($rows, [
					$category['id'], $category['name'], $category['status']
				]);
			}
			return ExcelResponse::export('Categories', $rows, $columns, 'Categories');
		}

        if (isset($request['per_page'])) {
            return $categories->paginate($request['per_page']);
        }

        return $categories->get();
	}

    public function getSubCategories($request) {
        return $this->where('parent_id','!=', 0)->get();
    }

    public function updateCategory($id, $data){
        return $this->where('id',$id)->update($data);
    }
    
    public function saveCategory($data){
        return $this->insertGetId($data);
    }

    public function deleteCategory($request) {
        $category_ids = [ $request['category_id'] ];
        $category_ids = array_merge($category_ids, $this->where('parent_id', $request['category_id'])->pluck('id'));
        return $this->whereIn('id', $category_ids)->delete();
    }
}
