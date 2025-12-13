<?php

namespace Database\Seeders;

use App\Models\Vision;
use Illuminate\Database\Seeder;

class VisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vision::create([
            'content' => 'Menjadi tim Drum Corps Genderang Irama yang berprestasi, profesional, dan berdaya saing tinggi.',
        ]);
    }
}
