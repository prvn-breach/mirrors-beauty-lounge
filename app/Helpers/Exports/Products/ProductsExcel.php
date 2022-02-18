<?php

namespace App\Helpers\Exports\Products;

// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductsExcel implements WithTitle, WithHeadings, ShouldAutoSize
{
    /**
     * @return Builder
     */

    public function headings(): array
    {
        return [
            'Product Name', 'Product Images', 'Category', 'Brand', 'Product Code', 
            'BarCode', 'Sale Price', 'Discount Price', 'Discount Percentage', 
            'Color', 'Size', 'Size Measurment', 'Is Exclusive Deal', 'Is Feature', 'Is New',
            'Is Authorised Dealer', 'Product Description', 'Warranty', 'Delivery', 'Sku',
            'Upc', 'Product Quantity', 'Specification Name', 'Specification Value',
            'Search Tags', 'SEO Title', 'SEO Description', 'SEO Keywords', 'Avalability(Y/N)', 
            'Status(A/I)' 
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Products';
    }
}