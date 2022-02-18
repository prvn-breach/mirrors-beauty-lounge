<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CustomerLog extends Model
{
    use HasFactory;


    public function getCustomerLog($ipAddress){
    	return $this->where('ip_address',$ipAddress)->orderBy('id','DESC')->first();
    }

    public function getInsert($data){
    	return $this->insertGetId($data);
    }
}
