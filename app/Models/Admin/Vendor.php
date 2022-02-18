<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\ExcelResponse;
use Carbon\Carbon;

class Vendor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 
        'company', 'website', 'phone_no', '	alternate_phone_no', 'address',
        'city', 'state', 'zip_code', 'country', 'email', 'po_box', 'fax',
        'brand_ids','year_started', 'user_department_email', 'site_administrator_email',
        'order_department_email', 'help_support_email', 'active_status'
    ];

    public function getVendors($request) {
        $vendors_query = $this;
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        if (isset($request['search'])) {
            $vendors_query = $vendors_query->where('company', 'LIKE', "%{$request['search']}%");
        }

        if (isset($request['company'])) {
            $vendors_query = $vendors_query->where('company', $request['company']);
        }

        if (isset($request['email'])) {
            $vendors_query = $vendors_query->where('email', $request['email']);
        }

        if (isset($request['phone_no'])) {
            $vendors_query = $vendors_query->where('phone_no', $request['phone_no']);
        }

        $vendors = [];
        if ($perPage == 'all') {
            $vendors = $vendors_query->get();
        } else {
            $vendors = $vendors_query->paginate($perPage);
        }
        
        if (isset($request['response_type'])) {
            $columns = [ 'ID', 'Company', 'Email', 'Website', 'Phone No.', 'Active Status' ];
            $rows = [];
            foreach ($vendors as $vendor) {
                array_push($rows, [
                    $vendor['id'],
                    $vendor['company'],
                    $vendor['email'],
                    $vendor['website'],
                    $vendor['phone_no'],
                    $vendor['active_status']
                ]);
            }
            return ExcelResponse::export('Vendors', $rows, $columns, 'Vendors');
        }

        return $vendors;
    }
    
    public function getVendor($request) {
        return $this->where('id', $request['vendor_id'])->first();
    }

    public function createVendor($request) {
        return $this->create([
            'company' => $request['company'],
            'website' => $request['website'],
            'email' => $request['email'],
            'phone_no' => $request['phone_no'],
            'alternate_phone_no' => $request['alternate_phone_no'],
            'active_status' => $request['active_status'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'country' => $request['country'],
            'zip_code' => $request['zip_code'],
            'year_started' => $request['year_started'],
            'user_department_email' => $request['user_department_email'],
            'site_administrator_email' => $request['site_administrator_email'],
            'order_department_email' => $request['order_department_email'],
            'help_support_email' => $request['help_support_email'],
            'brand_ids' => $request['brand_ids']
        ]);
    }

    public function updateVendor($request) {
        $vendor_id = $request['vendor_id'];
        $data = $request->toArray();
        unset($data['vendor_id']);
        return $this->where('id', $request['vendor_id'])->update($data);
    }

    public function deleteVendor($request) {
        return $this->where('id', $request['vendor_id'])->delete();
    }
}