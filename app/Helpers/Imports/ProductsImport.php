<?php
   
namespace App\Helpers\Imports;
   
use App\Models\Admin\ProductCatlog;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
    
class ProductsImport implements ToModel, WithHeadingRow, WithMultipleSheets
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function uniqueBy()
    {
        return 'slug';
    }

    public function model(array $row)
    {
        return new ProductCatlog($row);
    }

    // public function collection(Collection $rows)
    // {
    //     foreach ($rows as $row) {
    //         $product = ProductCatlog::create([
    //             'name' => $row[1],
    //             'slug' => $row[2],
    //             'category_id' => $row[3],
    //             'category_parent_id' => $row[5],
    //             'brand_id' => $row[6],
    //             'tax_rate_id' => $row[7],
    //             'vendor_id' => $row[8],
    //             'product_code' => $row[9],
    //             'barcode' => $row[10],
    //             'sale_price' => $row[11],
    //             'discount_price' => $row[12],
    //             'discount' => $row[13],
    //             'sku' => $row[14],
    //             'upc' => $row[15],
    //             'availability' => $row[16],
    //             'model_number' => $row[17],
    //             'is_exclusive_deal' => $row[18],
    //             'is_feature' => $row[19],
    //             'is_new' => $row[20],
    //             'is_authorised_dealer' => $row[21],
    //             'active' => $row[22],
    //             'description' => $row[23],
    //             'warranty' => $row[24],
    //             'delivery' => $row[25],
    //             'status' => $row[26],
    //             'tags' => $row[27],
    //             'seo_title' => $row[28],
    //             'seo_keywords' => $row[29],
    //             'seo_description' => $row[30],
    //         ]);
    //     }
    // }

    public function sheets(): array
    {
        return [
            '0' => $this
        ];
    }
}