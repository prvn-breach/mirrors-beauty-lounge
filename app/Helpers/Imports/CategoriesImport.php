<?php
   
namespace App\Helpers\Imports;
   
use App\Models\Admin\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
    
class CategoriesImport implements ToModel, WithHeadingRow, WithMultipleSheets
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
        $category_name = preg_replace('/[^a-zA-Z0-9_ -]/s',' ',strtolower($row['name']));
        $slug = str_replace(' ', '_', $category_name);

        return new Category([
            'name' => $row['name'],
            'icon' => 'images/category/'.$row['image'],
            'title' => $row['page_title'],
            'slug' => $slug,
            'seo_title' => $row['seo_title'],
            'seo_description' => $row['seo_description'],
            'seo_keywords' => $row['seo_keywords'],
            'status' => $row['statusai'],
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