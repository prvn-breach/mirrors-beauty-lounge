<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class ProductCompare extends Model
{

    use HasFactory;
    use SoftDeletes;

    public function getProducts(){
        return $this->hasOne(ProductCatlog::class,'id','product_id')->with(['getProductAttributes','getProductImages','getProductOptions','getProductSpecification','getCategory','getBrand']);
    }
    public function getCompareBySession($session_id){
    	return $this->where('session_id',$session_id)->with(['getProducts'])->get();
    }
    public function getCompareById($id){
        return $this->where('id',$id)->with(['getProducts'])->first();
    }
    public function deleteCompare($id){
    	$getImage = $this->getCompareById($id);
    	return $this->where('id',$id)->delete();
    }
    public function saveCompare($data){
    	return $this->insertGetId($data);
    }
    public function updateCompare($id,$data){
    	return $this->where('id',$id)->update($data);
    }

}
