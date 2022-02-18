<?php
namespace App\Helpers\Exports\Brands;

use App\Helpers\Exports\Brands\BrandsExcel;
use App\Helpers\Exports\Brands\CategoriesExcel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class BrandsExport implements WithMultipleSheets
{
    use Exportable;

    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            new BrandsExcel(),
            new CategoriesExcel(),
        ];
    }
}