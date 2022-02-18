<?php
namespace App\Helpers\Exports\Categories;

use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CategoriesExcel implements WithTitle, WithHeadings, ShouldAutoSize
{

    public function headings(): array
    {
        return [ 'Name', 'Image', 'Page Title', 'SEO Title', 'SEO Description', 'SEO Keywords','Status(A/I)' ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Categories';
    }
}