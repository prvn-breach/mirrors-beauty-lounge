<?php
namespace App\Services\Admin\Export;

use Illuminate\Support\Str;
use Response,Helper,Validator;
use App\Helpers\Exports\Products\ProductsExport;
use App\Helpers\Exports\Categories\CategoriesExport;
use App\Helpers\Exports\Brands\BrandsExport;
use App\Helpers\Exports\Brands\BrandsExcel;
use App\Services\Admin\Users\UserService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use JWTAuth;

class ExportService
{
    public function export($request) {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:brands,categories,products'
        ]);
        
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }

        if ($request['type'] == 'brands') {
            return (new BrandsExport())->download('brands.xlsx');
        }

        if ($request['type'] == 'categories') {
            return (new CategoriesExport())->download('categories.xlsx');
        }

        if ($request['type'] == 'products') {
            return (new ProductsExport())->download('products.xlsx');
        }
    }

    public function getPath($export, $file_name)
    {
        $excel_storage_path = Storage::disk('excel_storage')->path('');
        File::deleteDirectory($excel_storage_path);
        if (!is_dir($excel_storage_path)) {
            mkdir($excel_storage_path, 0777, true);
        }
        Excel::store($export,$file_name,'excel_storage');
        $excel_link_path = env('APP_URL').'public/excels/'.$file_name;
        return $excel_link_path;
    }
}