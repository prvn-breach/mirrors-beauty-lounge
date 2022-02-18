<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\OrderStatusShipping;
use JWTAuth;

class Complaint extends Model
{
    protected $fillable = [ 'order_id', 'user_id', 'admin_id', 'message' ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function createComplaint($request) {
        $user = JWTAuth::parseToken()->authenticate();
        $complaint = [];
        
        if (!empty($request['message'])) {
            $this->create([
                'order_id' => $request['order_id'],
                'admin_id' => $user['id'],
                'message' => $request['message']
            ]);
        }

        OrderStatusShipping::where('order_id', $request['order_id'])->update([
            'complaint_status' => $request['complaint_status']
        ]);

        return $complaint;
    }
}