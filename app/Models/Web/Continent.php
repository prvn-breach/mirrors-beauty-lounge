<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Continent extends Model
{
    use HasFactory;


    public function getContinent($code){
    	return $this->where('code',$code)->orderBy('id','DESC')->first();
    }

    public function saveContinent($data){
    	return $this->insertGetId($data);
    }
}
