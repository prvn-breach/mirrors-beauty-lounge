<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
use DB;
class ProductWishList extends Model
{

    use HasFactory;
    use SoftDeletes;

    public function getProduct(){
    	return $this->hasOne(ProductCatlog::class,'id','product_id')->withCount(['getReviews as avg_rating' => function($query){
            $query->select(DB::raw('AVG(star)'));
        }])->with('getProductImages')->withCount('productStock');
    }
    public function getWishListByUser($user_id){
    	return $this->where('user_id',$user_id)->with('getProduct')->get();
    }
    public function getWishList($user_id){
    	return $this->where('user_id',$user_id)->with('getProduct')->get();
    }
    public function getDelete($product_id){
        return $this->where('product_id',$product_id)->delete();
    } 
    public function getDeleteById($attribute_id){
        return $this->where('id',$attribute_id)->delete();
    }
    public function saveWishList($data){
        return $this->insertGetId($data);
    }

    public function updateWishList($id,$data){
        return $this->where('id',$id)->update($data);
    }


 }