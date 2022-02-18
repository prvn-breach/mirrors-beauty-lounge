<?php
namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\Web\User;
use App\Models\Web\Order;
use App\Models\Web\Review;
use App\Models\Web\Attribute;
use DB;

class ProductCatlog extends Model
{
    use HasFactory;
    use SoftDeletes;
   

    function __construct(){
        $this->user_id = '';
    }
    public function getTags($request){
        $data = $request->all();
        return $this->where("tags",'like','%'.$data['q'].'%')->with('getCategory')->get();
    }
     public function getProductDeals(){
        return $this->with(['getProductAttributes','getProductImages','getProductOptions','getProductSpecification','getCategory','getReviews','getBrand','getWishList'])->withCount(['getReviews as avg_rating' => function($query){
            $query->select(DB::raw('AVG(star)'));
        }])->where('is_exclusive_deal',1)->get();
    }
    public function changeProductStatus($request){
        $data = $request->all();
        return $this->where('id',$data['id'])->update(['status'=>$data['status']]);
    }
    public function getReviews(){
        return $this->hasMany(Review::class,'product_id','id')->with('getUser');
    }
   
    public function saveProduct($data){
        return $this->insertGetId($data);
    }

    public function updateProduct($id,$data){
        return $this->where('id',$id)->update($data);
    }

    public function getProductAttributes(){
        return $this->hasOne(ProductAttribute::class,'product_id','id')->with('getProductOptions');
    }  
    public function getProductImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    } 

    public function getProductOptions(){
        return $this->hasMany(ProductOption::class,'product_id','id');
    } 
    

    public function getProductSpecification(){
        return $this->hasMany(ProductSpecification::class,'product_id','id');
    }

    public function getCategory(){
        return $this->hasOne(Category::class,'id','category_id')->with('getBanner');
    }

    public function getBrand(){
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    public function productStock(){
        return $this->hasMany(ProductStock::class, 'product_id', 'id')->where('purchased',0)->whereHas('stockTransfer', function($query){
            $query->where('status','RECEIVED');
        });
    }

    public function getproduct($request,$product_id){
        $data = $request->all();
        if(isset($data['user_id']) && $data['user_id'] > 0){
            $this->user_id = $data['user_id'];
        }
        return $this->with(['getProductAttributes','getProductImages','getProductOptions','getProductSpecification','getCategory','getBrand','getReviews','getWishList','getWishList'=>function($query){
                $query->where('user_id',$this->user_id);
        }])->withCount(['getReviews as avg_rating' => function($query){
            $query->select(DB::raw('AVG(star)'));
        }])->where('id',$product_id)->first();
    } 
    public function searchBrands($brands){
        return Brand::whereIn('slug',$brands)->get()->pluck(['id']);
    }

    public function searchCategories($categories){
        return Category::whereIn('slug',$categories)->get()->pluck(['id']);
    }

    public function searchSubCategories($sub_categories){
        return SubCategory::whereIn('slug',$sub_categories)->get()->pluck(['id']);
    }

    public function subCategories($parent_ids) {
        return Category::whereIn('parent_id',$parent_ids)->pluck('id');
    }

    public function getWishList(){
       return $this->hasOne(ProductWishList::class,'product_id','id');
    }

    public function getCartItem() {
        return $this->hasOne(CartItem::class, 'product_id', 'id');
    }

    public function getAttributeFilter($filters){
        $getCollect = new Collection();
        $getKeys = collect($filters)->keys();
        $getProductAttrMatches = ProductAttribute::whereIn('slug',$getKeys)->get()->pluck(['slug']);
        if(!empty($getProductAttrMatches)){
            foreach($getProductAttrMatches as $key=>$item){
                $getFilter = $filters[$item];
               if(!empty($getFilter)){
                $getFilter = collect(explode(',', $getFilter));
                $getCollect = $getCollect->concat($getFilter);
               }
            }
            $getProductAttrMatches = ProductAttribute::whereIn('slug',$getKeys)->get()->pluck(['id']);
            if(!empty($getCollect)){
               return ProductOption::whereIn('slug',$getCollect)->whereIn('product_attribute_id',$getProductAttrMatches)->get()->pluck(['product_id']);
            }else{
                 return collect([]);
            }
        }
       return collect([]);
    }
    public function checkFilterCount($filters){
         $getCountFilters = 0;
           
            $getKeys = collect($filters)->keys();
            $getProductAttrMatches = ProductAttribute::whereIn('slug',$getKeys)->get()->pluck(['slug']);
            if(!empty($getProductAttrMatches)){
                foreach($getProductAttrMatches as $key=>$item){
                    $getFilter = $filters[$item];
                    if(!empty($getFilter)){
                        $getCountFilters = $getCountFilters+1;
                    }
                }
            }
            return $getCountFilters;
    }

    public function getProductDescription($request,$lang,$slug){
       $data = $request->all();
        if(isset($data['user_id']) && $data['user_id'] > 0){
            $this->user_id = $data['user_id'];
        }
        $getProducts =  $this->with(['getCartItem','getProductAttributes','getProductImages','getProductOptions','getProductSpecification','getCategory','getBrand','getReviews','getWishList','getWishList'=>function($query){
                $query->where('user_id',$this->user_id);
        }])->withCount(['getReviews as avg_rating' => function($query){
            $query->select(DB::raw('AVG(star)'));
        }])->where('slug',$slug);
       
        $product = $getProducts->first();
        $product['current_user_review'] = Review::where('product_id', $product['id'])->where('user_id', $this->user_id)->first();
        $product['users_count'] = User::count();

        $stars = [];
        $group_stars = $product['getReviews']->groupBy('star');
        for ($i=1;$i<=5;$i++) {
            $stars[$i]['count'] = isset($group_stars[$i]) ? $group_stars[$i]->count() : 0;
            $stars[$i]['percentage'] = ($stars[$i]['count'] / $product['users_count']) * 100;
        }
        $product['stars'] = $stars;
        $product['is_auth_user_purchased_this_product'] = Order::where('orders.user_id', $this->user_id)
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('order_status_shippings', 'order_status_shippings.order_id', '=', 'orders.id')
            ->whereIn('order_status_shippings.status', [ 'D', 'R' ])
            ->where('order_items.product_id',$product['id'])->count() > 0 ? true : false;
        return $product;
    }
    public function getproducts($request,$params){
        $perPage = 50;
        $data = $request->all();
        if(isset($data['user_id']) && $data['user_id'] > 0){
            $this->user_id = $data['user_id'];
        }
        if(isset($data['perPage']) && $data['perPage'] > 0){
            $perPage = $data['perPage'];
        }
        $sortDir = 'desc';
        if(isset($data['sortDir']) && !empty($data['sortDir'])){
            $sortDir = $data['sortDir'];
        }
        $getProducts =  $this->with(['getProductAttributes','getProductImages','getProductOptions','getProductSpecification','getCategory','getReviews','getBrand','getWishList'=>function($query){
            $query->where('user_id',$this->user_id);
        }])->withCount(['getReviews as avg_rating' => function($query){
            $query->select(DB::raw('AVG(star)'));
        }]);
        
        if(isset($data['brand']) && !empty($data['brand'])){
            $getBrands = explode(',', $data['brand']);
            $getBrandIds = $this->searchBrands($getBrands);
            $getProducts = $getProducts->whereIn('brand_id',$getBrandIds);
        }
        if(isset($data['category']) && !empty($data['category'])){
            $getCategories = explode(',', $data['category']);
            $getCategoryIds = $this->searchCategories($getCategories);
            // $getCategoryIds = array_merge($getCategoryIds->toArray(), $this->subCategories($getCategoryIds)->toArray());
            $getProducts = $getProducts->whereIn('category_id',$getCategoryIds);
        }
        if(isset($data['sub_category']) && !empty($data['sub_category'])){
            $getSubCategories = explode(',', $data['sub_category']);
            $getSubCategoryIds = $this->searchSubCategories($getSubCategories);
            $getSubCategoryIds = array_merge($getSubCategoryIds->toArray(), $this->subCategories($getSubCategoryIds)->toArray());
            $getProducts = $getProducts->whereIn('sub_category_id',$getSubCategoryIds);
        }
        if(!empty($data) && isset($data['slug'])){
            if($this->checkFilterCount($data) > 0){
                $getFilters = $this->getAttributeFilter($data);
                $getProducts = $getProducts->whereIn('id',$getFilters);
            }
        }
        if(isset($data['sortBy']) && !empty($data['sortBy'])){
            if($data['sortBy']!='price'){
                $data['sortBy'] = 'id';
            }else{
                $data['sortBy'] = 'discount_price';
            }
            $getProducts=$getProducts->orderBy($data['sortBy'],$sortDir);
        }
        if(!empty($data['q'])){
            $getProducts=$getProducts->where('tags','like','%'.$data['q'].'%');
        }
        
        if (isset($params[1]) && !isset($request[$params[1]]) && empty($request[$params[1]])) {
            $getProducts = $this->getProductParam($getProducts,$params);
        }

        $attributes = Attribute::where('status', 'A')->get();
        foreach ($attributes as $attribute) {
            if (isset($request[$attribute['slug']]) && !empty($request[$attribute['slug']])) {
                $getProducts = $getProducts->whereHas('getProductAttributes', function($query) use($attribute) {
                    $query->where('slug', $attribute['slug']);
                });
            }
        }

        return $getProducts->whereNull('deleted_at')->paginate($perPage);
    }
    public function getProductSlug($slug){
        return Category::where('slug',$slug)->first();
    } 
    public function getCategorySlug($slug){
        return $getCategory = Category::where('slug',$slug)->first();
        // return Category::where('parent_id',$getCategory->id)->get()->pluck(['id']);
    }
    public function getBrandSlug($slug){
        $getBrand = Brand::where('slug',$slug)->first();
        return $getBrand;
    }
    public function getProductParam($getProducts,$params){
        if(isset($params[1])){
           switch ($params[1]) {
               case 'product':
                   $getSlug =  $this->getProductSlug($params[2]);
                    $getProducts = $getProducts->where('category_id',$getSlug->id);
                   break;
                case 'brand':
                   $getSlug =  $this->getBrandSlug($params[2]);
                    $getProducts = $getProducts->where('brand_id',$getSlug->id);
                   break;
                case 'category':
                    $getSlug =  $this->getCategorySlug($params[2]);
                    // $getProducts = $getProducts->whereIn('category_id',$getSlug);
                    $getProducts = $getProducts->where('category_id',$getSlug->id);
                   break;
           }
           return $getProducts;
        }
    }
}
