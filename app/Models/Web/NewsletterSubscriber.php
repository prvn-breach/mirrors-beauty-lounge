<?php
namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    protected $fillable = [ 'email' ];

    public function subscribe($request) {
        return $this->create([
            'email' => $request['email']
        ]);
    }
}