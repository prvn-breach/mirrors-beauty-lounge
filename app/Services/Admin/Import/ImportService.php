<?php
namespace App\Services\Admin\Import;

use Illuminate\Support\Str;
use Response,Helper,Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\Imports\BrandsImport;
use App\Helpers\Imports\CategoriesImport;
use App\Helpers\Imports\ProductsImport;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\ProductCatlog;
use App\Models\Admin\ProductImage;
use App\Models\Admin\Category;
use App\Models\Admin\ProductSpecification;
use App\Services\Admin\Users\UserService;
use JWTAuth;

class ImportService
{
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function import($request) {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:brands,categories,products',
            'csv_file' => 'required|mimes:xlsx'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        
        if ($request['type'] == 'brands') {
            return $this->importBrands($request['csv_file']);
        }
        
        if ($request['type'] == 'categories') {
            return $this->importCategories($request['csv_file']);
        }

        if ($request['type'] == 'products') {
            return $this->importProducts($request['csv_file']);
        }
    }

    public function importBrands($file) {
        $this->userService->setAuthAdmin();
        $user = JWTAuth::parseToken()->authenticate();
        $import = new BrandsImport($user);
        $rows = Excel::toArray($import, $file);
        if (count($rows[0]) == 0) {
            return response()->json(['status'=> 0,'data'=> [ 'csv_file' => [ 'File should have records.' ] ]], 200);
        }
        Excel::import($import, $file);
        return Response::json(['status'=>200,'data'=>'', 'message' => 'Successfully Imported']);
    }

    public function importCategories($file) {
        $this->userService->setAuthAdmin();
        $user = JWTAuth::parseToken()->authenticate();
        $rows = Excel::toArray(new CategoriesImport($user), $file);
        if (count($rows[0]) == 0) {
            return response()->json(['status'=> 0,'data'=> [ 'csv_file' => [ 'File should have records.' ] ]], 200);
        }
        Excel::import(new CategoriesImport($user), $file);
        return Response::json(['status'=>200,'data'=>'', 'message' => 'Successfully Imported']);
    }

    public function importProducts($file) {
        $this->userService->setAuthAdmin();
        $user = JWTAuth::parseToken()->authenticate();
        $rows = Excel::toArray(new ProductsImport, $file);
        if (count($rows[0]) == 0) {
            return response()->json(['status'=> 0,'data'=> [ 'csv_file' => [ 'File should have records.' ] ]], 200);
        }
        foreach ($rows[0] as $row) {
            $row_data = [ 'created_by' =>  $user['id'] ];
            $product_excel_columns = config('global.config.products_excel_columns');
            foreach (array_keys($row) as $header) {
                if (isset($product_excel_columns[$header])) {
                    if ($header == 'product_name') {
                        $product_slug = preg_replace('/[^a-zA-Z0-9_ -]/s',' ',strtolower($row[$header]));
                        $row_data['slug'] = str_replace(' ', '_', $product_slug);
                    }

                    if ($header == 'category') {
                        $row_data['category_parent_id'] = $row[$header];
                    }

                    $row_data['model_number'] = uniqid();
                    $row_data[$product_excel_columns[$header]] = $row[$header];
                }
            }
            $validator = Validator::make($row_data, [
                'slug' => 'required|unique:product_catlogs,slug'
            ], [
                'slug.unique' => 'The slug needs to be unique.'
            ]);
            if($validator->fails()){
                return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
            }
            $product = ProductCatlog::create($row_data);

            if (isset($row['product_images'])) {
                $filenames = explode("," ,$row['product_images']);
                foreach ($filenames as $filename) {
                    ProductImage::create([
                        'product_id' => $product['id'],
                        'image' => trim($filename),
                        'atr' => $product['slug'],
                        'priority' => 'P',
                        'status' => 'A'
                    ]);
                }
            }

            if (isset($row['specification_name']) && isset($row['specification_value'])) {
                $specification_names = explode(",", $row['specification_name']);
                $specification_values = explode(",", $row['specification_value']);
                foreach ($specification_names as $index => $name) {
                    if (isset($specification_values[$index])) {
                        ProductSpecification::create([
                            'product_id' => $product['id'],
                            'name' => $name,
                            'value' => $specification_values[$index],
                            'status' => 'A',
                            'created_by' => 1
                        ]);
                    }
                }
            }
        }
        return Response::json(['status'=>200,'data'=>'', 'message' => 'Successfully Imported']);
    }
}