<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
class OrderFollowUp extends Model
{
    use HasFactory;

    protected $table = 'order_follow_up';
    protected $fillable = [ 'order_id', 'reason_type', 'other_reason_type', 'date', 'reason' ];

    public function insertOrderFollowUp($request) {
        return $this->create([
            'order_id' => $request['order_id'],
            'reason_type' => $request['reason_type'],
            'other_reason_type' => $request['other_reason_type'],
            'date' => $request['date'],
            'reason' => $request['reason'],
        ]);
    }
}