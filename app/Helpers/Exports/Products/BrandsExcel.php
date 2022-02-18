<?php
namespace App\Helpers\Exports\Products;

use App\Models\Admin\Brand;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BrandsExcel implements FromQuery, WithTitle, WithHeadings, ShouldAutoSize
{
    public function query()
    {
        return Brand::query()->select('id', 'name');
    }

    public function headings(): array
    {
        return [ 'Brand ID', 'Name' ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Brands';
    }
}