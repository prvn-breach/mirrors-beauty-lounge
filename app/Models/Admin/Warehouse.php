<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [ 'location_name', 'contact_person', 'mobile', 'telephone', 'address', 'city', 'state', 'zip_code', 'country' ];

    public function getWarehouse($request) {
        return $this->first();
    }

    public function createWarehouse($request) {
        if ($this->first()) {
            return $this->where('id', $request['id'])->update($request->only($this->fillable));
        }

        return $this->create($request);
    }
}