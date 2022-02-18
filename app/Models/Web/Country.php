<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Country extends Model
{
    use HasFactory;

    public function getCountry($code){
    	return $this->where('code',$code)->orderBy('id','DESC')->first();
    }

    public function getCountries(){
    	return $this->where('status','A')->get();
    }

    public function getInsert($data){
    	return $this->insertGetId($data);
    }
}
