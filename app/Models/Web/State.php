<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class State extends Model
{
    use HasFactory;

    public function getState($code){
    	return $this->where('code',$code)->orderBy('id','DESC')->first();
    }

    public function getInsert($data){
    	return $this->insertGetId($data);
    }
}
