<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

     protected $fillable = [
        'first_name',
        'name',
        'last_name',
        'email',
        'password',
        'mobile'
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function updateUser($id,$data){
        return $this->where('id',$id)->update($data);
    }
    
    public function getUser($id){
        return $this->where('id',$id)->first();
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
