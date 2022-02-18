<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Helpers\ExcelResponse;
use Carbon\Carbon;
use DB;

class OrderAddress extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'order_id', 'address', 'city', 'postal_code', 'state', 'country', 'mobile', 'telephone', 'type' ];

    public function getCountryReport($request){
        $perPage = 10;
        if (isset($request['perPage'])){
            $perPage = $request['perPage'];
        }
        $country_report_query = $this->select('country', DB::raw('COUNT(*) as no_of_orders'), DB::raw('SUM(order_payments.total) as total_amount'))
            ->join('order_payments', 'order_addresses.order_id', '=', 'order_payments.order_id')
            ->join('order_status_shippings', 'order_addresses.order_id', '=', 'order_status_shippings.order_id')
            ->where('order_status_shippings.status', 'D');
        if (isset($request['search'])) {
            $country_report_query->where('country', 'LIKE',  "%{$request['search']}%");
        }

        $country_report_data = $country_report_query->groupBy('country')->get();

        if (isset($request['response_type'])) {
            $columns = ['Sr.No', 'Country', 'No of Orders', 'Total Amount'];
            $rows = [];
            foreach ($country_report_data as $index => $report) {
                array_push($rows, [ $index+1, $report['country'], $report['no_of_orders'], $report['total_amount'] ]);
            }
            return ExcelResponse::export('CountryReport', $rows, $columns, 'CountryReport');
        }

        return $country_report_data;
    }

    public function getMostActiveCustomerLocations($request) {
        $perPage = 10;
        if (isset($request['perPage'])){
            $perPage = $request['perPage'];
        }

        $locations_query = $this->select('order_addresses.state', DB::raw('COUNT(DISTINCT(order_addresses.user_id)) as total_customers'), DB::raw('COUNT(*) as total_orders'), DB::raw('SUM(order_payments.total) as total_price'))
            ->join('order_payments', 'order_addresses.order_id', '=', 'order_payments.order_id')
            ->join('order_status_shippings', 'order_addresses.order_id', '=', 'order_status_shippings.order_id')
            ->where('order_status_shippings.status', 'D');

        if (isset($request['sort_by']) && isset($request['order'])) {
            $locations_query->orderBy($request['sort_by'], $request['order']);
        }

        if (isset($request['search'])) {
            $locations_query->where('order_addresses.state', 'LIKE', "%{$request['search']}%");
        }

        if (isset($request['period']) && $request['period']!='0') {
            if ($request['period'] == 'current_year') {
                $locations_query->whereYear('order_status_shippings.created_at', date('Y'));
            }
            if ($request['period'] == 'current_month') {
                $locations_query->whereMonth('order_status_shippings.created_at', date('m'));
            }
            if ($request['period'] == 'current_week') {
                $locations_query->whereDate('order_status_shippings.created_at', '>=', Carbon::now()->startOfWeek()->format('Y-m-d'))
                    ->whereDate('order_status_shippings.created_at', '<=', Carbon::now()->format('Y-m-d'));
            }
            if ($request['period'] == 'current_day') {
                $locations_query->whereDate('order_status_shippings.created_at', Carbon::now()->format('Y-m-d'));
            }
        }  

        if (isset($request['period']) && $request['period']=='0' && isset($request['date'])) {
            $dates = explode("-", $request['date']);
            $from_date = $dates[0];
            $to_date = $dates[1];
            $locations_query->whereDate('order_status_shippings.created_at', '>=', $from_date )->whereDate('created_at', '<=', $to_date);
        }

        $locations_data = $locations_query->groupBy(['state'])->get();

        // Excel Download
        if (isset($request['response_type'])) {
            $columns = ['Location', 'Customers', 'Total Amount'];
            $rows = [];
            foreach($locations_data->toArray() as $data){
                array_push($rows, [
                    $data['state'],
                    $data['total_customers'], 
                    $data['total_price']
                ]);
            }
            return ExcelResponse::export('MostActiveCustomerLocationsReport', $rows, $columns, 'MostActiveCustomerLocationsReport');
        }

        return $locations_data;
    }
}