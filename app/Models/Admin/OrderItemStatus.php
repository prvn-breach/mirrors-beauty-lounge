<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
class OrderItemStatus extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'order_id', 'item_id', 'status' ];
}