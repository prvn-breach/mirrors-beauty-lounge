<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ExcelResponse;
use App\Models\Admin\OrderItem;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use Carbon\Carbon;
use DB;
use JWTAuth;

class SemExpense extends Model
{
    protected $fillable = [ 'from_date', 'to_date', 'amount', 'type', 'type_id', 'comments', 'created_by' ];

    public function createSemExpense($request){
        $user = JWTAuth::parseToken()->authenticate();
        return $this->create([
            'from_date' => $request['from_date'],
            'to_date' => $request['to_date'],
            'amount' => $request['amount'],
            'type' => $request['type'],
            'type_id' => $request['type_id'],
            'comments' => $request['comments'],
            'created_by' => $user['name']
        ]);
    }

    public function getSemExpenses($request){
        $order = [];
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $sem_expense_query = $this;

        if (isset($request['period']) && $request['period']!='0') {
            if ($request['period'] == 'current_year') {
                $sem_expense_query = $sem_expense_query->whereYear('from_date', date('y'));
            }
            if ($request['period'] == 'current_month') {
                $sem_expense_query = $sem_expense_query->whereMonth('from_date', date('m'));
            }
            if ($request['period'] == 'current_week') {
                $sem_expense_query = $sem_expense_query->whereBetween('from_date', [Carbon::now()->startOfWeek()->format('Y-m-d'), Carbon::now()->format('Y-m-d')]);
            }
            if ($request['period'] == 'current_day') {
                $sem_expense_query = $sem_expense_query->where('from_date', Carbon::now()->format('Y-m-d'));
            }
        }

        if (isset($request['created_by'])) {
            $sem_expense_query = $sem_expense_query->where('created_by', $request['created_by']);
        }

        if (isset($request['date'])) {
            $dates = explode($request['date'], "-");
            $from_date = $dates[0];
            $to_date = $dates[1];
            $sem_expense_query = $sem_expense_query->where('from_date', '>=', $from_date )->where('to_date', '<=', $to_date);
        }

        if (isset($request['type'])) {
            $sem_expense_query = $sem_expense_query->where('type', $request['type']);
        }

        if (isset($request['type_id'])) {
            $sem_expense_query = $sem_expense_query->where('type_id', $request['type_id']);
        }
        
        if (isset($request['sort_by']) && isset($request['order'])) {
            $sem_expense_query = $sem_expense_query->orderBy($request['sort_by'], $request['order']);
        }

        // Excel Download
        if (isset($request['response_type'])) {
            $sem_expenses = $sem_expense_query->get();
            foreach ($sem_expenses as $data) {
                $type_name = '';
                if ($data['type'] == 'category') {
                    $type_name = Category::find($data['type_id'])->name;
                }
                if ($data['type'] == 'brand') {
                    $type_name = Brand::find($data['type_id'])->name;
                }
                $data['type_name'] = $type_name;
                $price = OrderItem::select(DB::raw('SUM(price) as total_price'))->whereHas('orderStatus', function($query){
                    $query->where('status', 'D');
                })->where($data['type'].'_id', $data['type_id'])->first();
                $data['sale_amount'] = $price['total_price'] ?? 0;
                $data['profit_loss'] = $price['total_price'] > $data['amount'] ? 'Profit' : 'Loss';
            }
            $columns = $request['excel_fields'];
            $rows = [];
            foreach ($sem_expenses->toArray() as $data) {
                $row = [];
                foreach ($request['excel_db_columns'] as $index => $excel) {
                    $row[$index] = null;
                    if (isset($excel['table'])) {
                        $row[$index] = $data[$excel['table']];
                    }
                    if (isset($excel['column'])) {
                        $row[$index] = $row[$index] 
                            ? $row[$index][$excel['column']]
                            : $data[$excel['column']];
                    }
                }
                array_push($rows, array_values($row));
            }
            return ExcelResponse::export('SemExpenses', $rows, $columns, 'SemExpenses');
        }

        $sem_expenses = $sem_expense_query->paginate($perPage)->toArray();
        foreach ($sem_expenses['data'] as $index => $data) {
            $type_name = '';
            if ($data['type'] == 'category') {
                $type_name = Category::find($data['type_id'])->name ?? "";
            }
            if ($data['type'] == 'brand') {
                $type_name = Brand::find($data['type_id'])->name ?? "";
            }
            $sem_expenses['data'][$index]['type_name'] = $type_name;
            $price = OrderItem::select(DB::raw('SUM(price) as total_price'))->whereHas('orderStatus', function($query){
                $query->where('status', 'D');
            })->where($data['type'].'_id', $data['type_id'])->first();
            $sem_expenses['data'][$index]['sale_amount'] = $price['total_price'];
            $sem_expenses['data'][$index]['profit_loss'] = $price['total_price'] > $data['amount'] ? 'Profit' : 'Loss';
        }

        return $sem_expenses;
    }
}