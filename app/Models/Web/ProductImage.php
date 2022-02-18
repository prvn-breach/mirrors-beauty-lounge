<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class ProductImage extends Model
{

    use HasFactory;
     use SoftDeletes;
    public function getProductImageById($image_id){
    	return $this->where('id',$image_id)->first();
    }
    public function deleteProductImage($image_id){
    	$getImage = $this->getProductImageById($image_id);

    	return $this->where('id',$image_id)->update([
    		'deleted_by'=>1,
    		'deleted_at'=>date('Y-m-d h:i:s')
    	]);
    }
    public function saveImages($data){
    	return $this->insertGetId($data);
    }
    public function updateImages($id,$data){
    	return $this->where('id',$id)->update($data);
    }

}
