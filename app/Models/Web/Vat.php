<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class Vat extends Model
{

    use HasFactory;
    use SoftDeletes;

    public function getVat(){
    	return $this->first();
    }

   






    

   

}
