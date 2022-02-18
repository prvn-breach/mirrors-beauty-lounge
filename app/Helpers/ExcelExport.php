<?php

namespace App\Helpers;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ExcelExport implements FromCollection, WithHeadings, WithTitle,  ShouldAutoSize, WithEvents, WithStrictNullComparison
{
    public $title;
    public $data;
    public $columns;

    public function __construct($title, $data, $columns){
        $this->title = $title;
        $this->data = $data;
        $this->columns = $columns;
    }

    // /**
    // * @return \Illuminate\Support\Collection
    // */
    public function collection()
    {
        //
        return collect($this->data);
    }

    public function headings(): array
    {
        return $this->columns;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $columns = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
                $align = 'left';
                foreach($columns as $column){
                    $event->sheet->getDelegate()->getStyle($column)->getAlignment()->setHorizontal($align);
                }
            },
        ];
    }
}