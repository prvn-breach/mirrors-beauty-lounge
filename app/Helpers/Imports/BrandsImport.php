<?php
   
namespace App\Helpers\Imports;
   
use App\Models\Admin\Brand;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Helper;
    
class BrandsImport implements ToModel, WithHeadingRow, WithMultipleSheets
{
    public function __construct($user) {
        $this->user = $user;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $brand_name = preg_replace('/[^a-zA-Z0-9_ -]/s',' ',strtolower($row['name']));
        $slug = str_replace(' ', '_', $brand_name);

        return new Brand([
            'name' => $row['name'],
            'category_id' => $row['category'],
            'image' => $row['image'],
            'title' => $row['title'],
            'slug' => $slug,
            'seo_title' => $row['seo_title'],
            'seo_description' => $row['seo_description'],
            'seo_keywords' => $row['seo_keywords'],
            'created_by' => $this->user['id']
        ]);
    }

    public function sheets(): array
    {
        return [
            '0' => $this
        ];
    }
}