<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class UserAddress extends Model
{

    use HasFactory;
    use SoftDeletes;

    public function saveAddress($data){
    	return $this->insert($data);
    }

    public function getAddresses($user_id){
    	return $this->where('user_id',$user_id)->get();
    }
    public function updateAddress($id,$data){
    	return $this->where('id',$id)->update($data);
    }

    public function deleteAddressById($id){
    	return $this->where('id',$id)->delete();
    }

    public function getAddressById($id){
    	return $this->where('id',$id)->first();
    }
 }