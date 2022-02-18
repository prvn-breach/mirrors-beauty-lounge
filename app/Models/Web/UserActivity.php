<?php
namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $table = "user_activity";
    protected $fillable = [ 'user_id', 'ip', 'login', 'logout' ];
}