<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class TeamMembersTemplateExport implements WithHeadings
{
    public function headings(): array
    {
        return [
            'name',
            'role',
            'section',
            'type',
        ];
    }
}
