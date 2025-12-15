<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AchievementsTemplateExport implements FromArray, WithHeadings, ShouldAutoSize
{
    public function array(): array
    {
        return [
            ['Sample Title', date('Y'), 'Short Category/Description', 'Detailed long description here...'],
        ];
    }

    public function headings(): array
    {
        return [
            'title',
            'year',
            'description',
            'long_description',
        ];
    }
}
