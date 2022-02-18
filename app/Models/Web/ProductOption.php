<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProductOption extends Model
{
    use HasFactory;


    public function getOption($id){
        return $this->where('id',$id)->first();
    }
    public function getOptionByAttributAndProduct($attribute_id,$product_id){
        return $this->where('product_attribute_id',$attribute_id)->where('product_id',$product_id)->first();
    }
    public function getOptionsDelete($product_id){
        return $this->where('product_id',$product_id)->delete();
    } 
    public function deleteProductAttributeOption($option_id){
        return $this->where('id',$option_id)->delete();
    }

    public function saveProductOption($data){
        return $this->insertGetId($data);
    }

    public function updateProductOption($id,$data){
        return $this->where('id',$id)->update($data);
    }

}
