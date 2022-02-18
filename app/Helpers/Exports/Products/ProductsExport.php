<?php
namespace App\Helpers\Exports\Products;

use App\Helpers\Exports\Products\ProductsExcel;
use App\Helpers\Exports\Products\BrandsExcel;
use App\Helpers\Exports\Products\CategoriesExcel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ProductsExport implements WithMultipleSheets
{
    use Exportable;

    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            new ProductsExcel(),
            new BrandsExcel(),
            new CategoriesExcel()
        ];
        // $sheets = [];

        // for ($month = 1; $month <= 12; $month++) {
        //     $sheets[] = new InvoicesPerMonthSheet($this->year, $month);
        // }

        // return $sheets;
    }
}