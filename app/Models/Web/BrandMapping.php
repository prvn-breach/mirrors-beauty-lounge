<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class BrandMapping extends Model
{
    use HasFactory;

    public function getBrand(){
    	return $this->hasOne(Brand::class,'id','brand_id');
    }
}
