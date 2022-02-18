<?php
namespace App\Helpers\Exports\Products;

use App\Models\Admin\Category;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CategoriesExcel implements FromQuery, WithTitle, WithHeadings, ShouldAutoSize
{
    public function query()
    {
        return Category::query()->select('id', 'name');
    }

    public function headings(): array
    {
        return [ 'Category ID', 'Name' ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Categories';
    }
}