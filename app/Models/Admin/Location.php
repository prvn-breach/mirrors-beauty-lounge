<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\ExcelResponse;
use Carbon\Carbon;

class Location extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'location_type', 'location_name', 'contact_person', 'mobile', 'telephone', 'address', 'city', 'state', 'zip_code', 'country', 'start_time', 'end_time', 'latitude', 'longitude', 'status' ];

    public function getLocations($request){
        $locations = [];
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $locations_query = $this;

        if (isset($request['search'])) {
            $locations_query = $locations_query->where('location_name', 'LIKE', "%{$request['search']}%");
        }

        if (isset($request['created_by'])) {
            $locations_query = $locations_query->where('created_by', $request['created_by']);
        }

        if (isset($request['response_type']) || $perPage == 'all') {
            $locations = $locations_query->get();
        } else {
            $locations = $locations_query->paginate($perPage);
        }

        // if (isset($request['search'])) {
        //     if (isset($request['response_type']) || $perPage == 'all') {
        //         $locations = $this->where('location_name', 'LIKE', "%{$request['search']}%")->get();
        //     } else {
        //         $locations = $this->where('location_name', 'LIKE', "%{$request['search']}%")->paginate($perPage);
        //     }
        // } else {
        //     if (isset($request['response_type']) || $perPage == 'all') {
        //         $locations = $this->get();
        //     } else {
        //         $locations = $this->paginate($perPage);
        //     }
        // }

        if (isset($request['response_type'])) {
            $columns = [ 'ID', 'Location Type', 'Location Name', 'Start Time', 'End Time', 'Contact Person', 'Mobile', 'Telephone', 'Address', 'City', 'State', 'ZipCode', 'Country', 'Latitude', 'Longitude' ];
            $rows = [];
            foreach ($locations as $location) {
                array_push($rows, [
                    $location['id'], $location['location_type'], $location['location_name'], $location['start_time'],
                    $location['end_time'], $location['contact_person'], $location['mobile'], $location['telephone'], 
                    $location['address'], $location['city'], $location['state'], $location['zip_code'], $location['country'],
                    $location['latitude'], $location['longitude']
                ]);
            }
            return ExcelResponse::export('Locations', $rows, $columns, 'Locations');
        }
        return $locations;
    }

    public function getLocation($request) {
        return $this->where('id', $request['location_id'])->first();
    }

    public function getDeletedLocations($request){
        $perPage = 10;
        
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $locations_query = $this->onlyTrashed();
        
        if (isset($request['search'])) {
            $locations_query->where('location_name', 'LIKE', "%{$request['search']}%");
        }

        if (isset($request['response_type'])) {
            $locations = $locations_query->get();
            $columns = [ 'ID', 'Location Name', 'Contact Person', 'Mobile', 'Telephone', 'Address', 'City', 'State', 'ZipCode', 'Country' ];
            $rows = [];
            foreach ($locations as $location) {
                array_push($rows, [
                    $location['id'], $location['location_name'], $location['contact_person'],
                    $location['mobile'], $location['telephone'], $location['address'],
                    $location['city'], $location['state'], $location['zip_code'],
                    $location['country']
                ]);
            }
            return ExcelResponse::export('Locations', $rows, $columns, 'Locations');
        }
        return $locations_query->paginate($perPage);
    }

    public function createLocation($request){
        return $this->create([
            'location_name' => $request['location_name'],
            'location_type' => $request['location_type'],
            'contact_person' => $request['contact_person'],
            'mobile' => $request['mobile'],
            'telephone' => $request['telephone'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zip_code' => $request['zip_code'],
            'country' => $request['country'],
            'status' => $request['status'],
            'start_time' => $request['start_time'],
            'end_time' => $request['end_time'],
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude']
        ]);
    }

    public function deleteLocation($request){
        return $this->where('id', $request['location_id'])->delete();
    }

    public function deleteLocations($request){
        if ($request['location_id']) {
            return $this->where('id', $request['location_id'])->delete();
        }

        if ($request['location_ids']) {
            return $this->whereIn('id', $request['location_ids'])->delete();
        }
        
        return true;
    }

    public function updateLocation($request){
        $data = [];
        foreach ($this->fillable as $index => $field) {
            if (isset($request[$field])) {
                $data[$field] = $request[$field];
            }
        }
        return $this->where('id', $request['location_id'])->update($data);
    }
}