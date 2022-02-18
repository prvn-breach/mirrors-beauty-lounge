<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
    use HasFactory;

   

   public function getRoleHasPermission(){
   	return $this->hasMany(RoleHasPermission::class,'role_id','id');
   }

}
