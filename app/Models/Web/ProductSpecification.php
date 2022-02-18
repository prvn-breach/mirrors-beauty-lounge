<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProductSpecification extends Model
{
    use HasFactory;
    public function deleteSpecificationProduct($specification_id){
    	return $this->where('id',$specification_id)->delete();
    }
     public function saveProductSpecification($data){
        return $this->insertGetId($data);
    }

    public function updateProductSpecification($id,$data){
        return $this->where('id',$id)->update($data);
    }

}
