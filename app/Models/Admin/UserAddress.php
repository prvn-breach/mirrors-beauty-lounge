<?php
namespace App\Models\Admin;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Helpers\ExcelResponse;

class UserAddress extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getActiveCustomerLocations($request) {
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $user_address_query = $this->with('user');

        if (isset($request['search'])) {
            $user_address_query->whereHas('user', function ($query) use ($request){
                $query->where('name', 'LIKE', "%{$request['search']}%");
            });
        }

        // Excel Download
        if (isset($request['response_type'])) {
            $user_addresses = $user_address_query->get();
            $columns = ['User ID', 'UserName', 'Address', 'City', 'Zip Code', 'State', 'Country', 'Telephone', 'Mobile', 'Type' ];
            $rows = [];
            foreach($user_addresses->toArray() as $address){
                array_push($rows, [
                    $address['user']['id'], $address['user']['name'], $address['user']['address'],
                    $address['user']['city'], $address['user']['postal_code'], $address['user']['state'],
                    $address['user']['country'], $address['user']['mobile'], $address['user']['type']
                ]);
            }
            return ExcelResponse::export('ActiveCustomerLocations', $rows, $columns, 'ActiveCustomerLocations');
        }

        return $user_address_query->paginate(10);
    }
}