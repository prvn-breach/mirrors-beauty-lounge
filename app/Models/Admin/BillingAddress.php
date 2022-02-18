<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use DB;

class BillingAddress extends Model
{
    use HasFactory;
    protected $fillable = [ 'user_id', 'order_id', 'address', 'city', 'postal_code', 'state', 'country', 'mobile', 'telephone', 'type' ];
}