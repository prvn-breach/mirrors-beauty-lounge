<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class City extends Model
{
    use HasFactory;

    public function getCity($cityName){
    	return $this->where('name',$cityName)->first();
    }

    public function getInsert($data){
    	return $this->insertGetId($data);
    }
}
