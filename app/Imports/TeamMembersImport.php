<?php

namespace App\Imports;

use App\Models\TeamMember;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeamMembersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TeamMember([
            'name' => $row['name'],
            'role' => $row['role'],
            'section' => $row['section'] ?? null,
            'type' => $row['type'], // leadership or member
        ]);
    }
}
