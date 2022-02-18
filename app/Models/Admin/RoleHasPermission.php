<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class RoleHasPermission extends Model
{
    use HasFactory;

    public function getPermissions(){
    	return $this->hasOne(Permission::class,'id','permission_id');
    }

}
