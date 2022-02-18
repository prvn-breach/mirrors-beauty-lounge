<?php
namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedGift extends Model
{
    use HasFactory;

protected $fillable = [ 'user_id', 'gift_certificate_id' ];

    public function applyGift($request) {
        return $this->create($request);
    }
}