<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class PickupLocation extends Model
{

    use HasFactory;
    use SoftDeletes;
    public function getPickupLocations(){
        return $this->get();
    }
    public function getPickupLocation($pickup_id){
        return $this->where('id',$pickup_id)->first();
    }

 }