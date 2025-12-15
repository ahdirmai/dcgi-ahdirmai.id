<?php

namespace App\Imports;

use App\Models\Achievement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AchievementsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Achievement([
            'title'     => $row['title'],
            'year'      => $row['year'],
            'description' => $row['description'] ?? null,
            'long_description' => $row['long_description'] ?? null,
        ]);
    }
}
