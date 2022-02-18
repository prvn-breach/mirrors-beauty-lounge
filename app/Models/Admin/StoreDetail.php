<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class StoreDetail extends Model
{
    protected $fillable = [ 'store_url', 'facebook', 'twitter', 'googleplus', 'pinterest', 'youtube', 'linkedin', 'email', 'quotation_number', 'administrator_email', 'order_number' ];

    public function createStoreDetail($request) {
        $data = [];
        foreach ($this->fillable as $column) {
            if (isset($request[$column])) {
                $data[$column] = $request[$column];
            }
        }
        return $this->create($data);
    }
}