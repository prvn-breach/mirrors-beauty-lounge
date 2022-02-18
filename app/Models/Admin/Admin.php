<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Spatie\PermissionTrails\HasRoles;
use LaravelAndVueJS\Traits\LaravelPermissionToVueJS;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Helpers\ExcelResponse;

class Admin extends Authenticatable implements JWTSubject
{
    use HasFactory,LaravelPermissionToVueJS/*,HasRoles*/;

     protected $fillable = [
        'first_name',
        'name',
        'last_name',
        'email',
        'password',
        'mobile',
        'role_id'
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

    public function getRoleNames(){
        return $this->hasOne(Role::class,'id','role_id');
    }
    public function getAllPermission(){
        return $this->hasOne(Role::class,'id','role_id')->with('getRoleHasPermission');
    }
    public function getAllPermissions(){
        dd($this->getAllPermission()->first());
    }

    public function getUser($id){
        return $this->where('id',$id)->first();
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    public function getSellers($request) {
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $sellers_query = $this->where('role_id', 2);

        if (isset($request['search'])) {
            $sellers_query = $sellers_query->where('email', 'LIKE', "%{$request['search']}%");
        }

        if (isset($request['response_type'])) {
            $sellers = $sellers_query->get();
            $columns = [ 'ID', 'Name', 'Email', 'Gender' ];
            $rows = [];
            foreach ($sellers as $seller) {
                array_push($rows, [
                    'id' => $seller['id'],
                    'name' => $seller['name'],
                    'email' => $seller['email'],
                    'gender' => $seller['gender'],
                ]);
            }
            return ExcelResponse::export('Sellers', $rows, $columns, 'sellers');
        }

        return $sellers_query->paginate($perPage);
    }
}
