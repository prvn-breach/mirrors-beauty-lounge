<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public function getBanners($request) {
        return $this->get();
    }
}