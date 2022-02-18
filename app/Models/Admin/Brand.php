<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ExcelResponse;

class Brand extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'name', 'supplier_name', 'ar_name', 'category_id', 'sub_category_id', 'image',	'icon',	'seo_title',	'seo_description',	'seo_keywords',	'slug',	'canonical_url',	'content',	'title',	'is_auth',	'status', 'created_by'];
    protected $casts = [
        'created_at' => 'date: Y-m-d H:i:s'
    ];

    public function updateChangeStatusBrand($brand_id,$data){
    	return $this->where('id',$brand_id)->update($data);	
    } 
    public function getBrandByCategory($category_id){
        return $this->where('category_id',$category_id)->get();
    }
    public function getBrand($brand_id){
    	return $this->where('id',$brand_id)->first();	
    }
    public function category() {
        return $this->belongsTo(Category::class)->withTrashed();
    }
    public function subCategory() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id')->withTrashed();
    }
    public function getBrands($request){
    	$data = $request->all();
    	$getBrands = $this->has('category')->with(['category', 'subCategory']);

        if (isset($data['created_by'])) {
            $getBrands = $getBrands->where('created_by', $data['created_by']);
        }

        if (isset($data['status'])) {
            $getBrands=$getBrands->where('status', $data['status']);
        }

        if (isset($request['orderBy']) && isset($request['sortBy'])) {
            $getBrands = $getBrands->orderBy($request['sortBy'], $request['orderBy']);
        }

        if(!empty($data['search'])){
    		$getBrands=$getBrands->where('name','like','%'.$data['search'].'%')
            ->orWhere('supplier_name','like','%'.$data['search'].'%')
            ->orWhere('status','like','%'.$data['search'].'%')
            ->orWhere('id','like','%'.$data['search'].'%');
    	}

        if (isset($data['perPage']) && $data['perPage'] == 'all') {
            $getBrands = $getBrands->get();
        } else {
            $getBrands = $getBrands->paginate(50);	
        }

        if (isset($request['response_type'])) {
            $columns = [ 'ID', 'Brand Name', 'Suppler Name', 'Category', 'SEO Title', 'SEO Description', 'SEO Keywords', 'Content', 'Title', 'Status', 'Created At' ];
            $rows = [];
            foreach ($getBrands->toArray() as $brand) {
                array_push($rows, [
                    $brand['id'], $brand['name'], $brand['supplier_name'], $brand['category']['name'], $brand['seo_title'], $brand['seo_description'],
                    $brand['seo_keywords'], $brand['content'], $brand['title'], $brand['status'], $brand['created_at']
                ]);
            }
            return ExcelResponse::export('Brands', $rows, $columns, 'Brands');
        }

        return $getBrands;
    }

    public function saveBrand($data){
    	return $this->insertGetId($data);
    }

    public function updateBrand($id,$data){
    	return $this->where('id',$id)->update($data);
    }

    public function deleteBrands($request){
        if ($request['brand_id']) {
            return $this->where('id', $request['brand_id'])->delete();
        }

        if ($request['brand_ids']) {
            return $this->whereIn('id', $request['brand_ids'])->delete();
        }
        
        return true;
    }
}
