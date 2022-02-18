<?php
namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use App\Models\Web\OrderStatusShipping;

class Complaint extends Model
{
    protected $fillable = [ 'order_id', 'user_id', 'admin_id', 'message' ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function createComplaint($request) {
        $complaint = $this->create([
            'order_id' => $request['order_id'],
            'user_id' => $request['user_id'],
            'message' => $request['message']
        ]);

        OrderStatusShipping::where('order_id', $request['order_id'])->update([
            'complaint_status' => 'RAISED'
        ]);

        return $complaint;
    }
}