<?php
namespace App\Helpers\Exports\Brands;

use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BrandsExcel implements WithTitle, WithHeadings, ShouldAutoSize
{

    public function headings(): array
    {
        return [ 'Name', 'Category', 'Title', 'Image', 'SEO Title', 'SEO Description', 'SEO Keywords', 'Status(A/I)' ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Brands';
    }
}