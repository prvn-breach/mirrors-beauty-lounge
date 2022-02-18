<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class Shipping extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getShippings(){
    	return $this->first();
    }
    

}
