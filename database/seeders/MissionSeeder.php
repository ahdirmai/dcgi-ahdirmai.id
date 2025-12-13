<?php

namespace Database\Seeders;

use App\Models\Mission;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $missions = [
            'Mengembangkan potensi anggota dalam bidang musik.',
            'Menanamkan nilai disiplin dan tanggung jawab.',
        ];

        foreach ($missions as $mission) {
            Mission::create(['content' => $mission]);
        }
    }
}
