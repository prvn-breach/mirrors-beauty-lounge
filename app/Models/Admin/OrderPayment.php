<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class OrderPayment extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'order_id', 'sub_total', 'vat', 'shipping', 'delivery_charge', 'original_sub_total', 'total', 'payment_mode', 'payment_status'];

    public function updateOrderPayment($request){
        return $this->where('order_id', $request['order_id'])->update($request);
    }
}