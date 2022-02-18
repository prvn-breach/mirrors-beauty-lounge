<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class OrderDiscount extends Model
{
    use HasFactory;

    protected $fillable = [ 'original_price', 'discount_type', 'user_id', 'order_id', 'discount_price', 'discount', 'total' ];
}