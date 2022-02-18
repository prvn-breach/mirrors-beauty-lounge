<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
class OrderUser extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'order_id', 'first_name', 'last_name', 'name', 'mobile', 'email' ];
}