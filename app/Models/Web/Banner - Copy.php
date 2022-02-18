<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class Banner extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function getImages(){
    	return $this->hasMany(BannerImage::class,'banner_id','id')->where('status','A');
    }

   public function getBanner($type){
   		return $this->where('type',$type)->where('status','A')->orderBy('id','DESC')->with('getImages')->first();
   }

}
