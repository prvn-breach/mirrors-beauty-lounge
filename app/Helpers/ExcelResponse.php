<?php

namespace App\Helpers;

use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\ExcelExport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class ExcelResponse{
    final static function export($title, $data, $columns, $report_name)
    {
        $excel_storage_path = Storage::disk('excel_storage')->path('');
        File::deleteDirectory($excel_storage_path);
        if (!is_dir($excel_storage_path)) {
            mkdir($excel_storage_path, 0777, true);
        }
        $file_name = $report_name.'-'.time().'.xlsx';
        Excel::store(new ExcelExport($title,$data,$columns),$file_name,'excel_storage');
        $excel_link_path = env('APP_URL').'public/excels/'.$file_name;
        return $excel_link_path;
    }
}