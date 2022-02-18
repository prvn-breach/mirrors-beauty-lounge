<?php
namespace App\Helpers\Exports\Categories;

use App\Helpers\Exports\Categories\CategoriesExcel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CategoriesExport implements WithMultipleSheets
{
    use Exportable;

    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            new CategoriesExcel()
        ];
    }
}