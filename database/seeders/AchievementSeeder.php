<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievements = [
            [
                'year' => '2017',
                'title' => '2nd Runner Up',
                'description' => 'JOMC (International Level)',
                'images' => [
                    'https://picsum.photos/600/400?grayscale&random=20',
                    'https://picsum.photos/600/400?grayscale&random=21',
                    'https://picsum.photos/600/400?grayscale&random=22'
                ]
            ],
            [
                'year' => '2020',
                'title' => '1st Brass Battle',
                'description' => 'Borneo Marching Day',
                'images' => [
                    'https://picsum.photos/600/400?grayscale&random=23',
                    'https://picsum.photos/600/400?grayscale&random=24',
                    'https://picsum.photos/600/400?grayscale&random=25'
                ]
            ],
            [
                'year' => '2025',
                'title' => '2nd Place Winner',
                'description' => 'Konser Borneo Marching Day',
                'images' => [
                    'https://picsum.photos/600/400?grayscale&random=26',
                    'https://picsum.photos/600/400?grayscale&random=27',
                    'https://picsum.photos/600/400?grayscale&random=28'
                ]
            ],
            [
                'year' => '2026',
                'title' => '2nd Winner',
                'description' => 'Wali Kota Cup',
                'images' => [
                    'https://picsum.photos/600/400?grayscale&random=29',
                    'https://picsum.photos/600/400?grayscale&random=30',
                    'https://picsum.photos/600/400?grayscale&random=31'
                ]
            ],
        ];

        foreach ($achievements as $data) {
            $achievement = Achievement::create([
                'year' => $data['year'],
                'title' => $data['title'],
                'description' => $data['description'],
            ]);

            foreach ($data['images'] as $index => $imageUrl) {
                $achievement->galleries()->create([
                    'image_path' => $imageUrl,
                    'caption' => 'Documentation ' . ($index + 1)
                ]);
            }
        }
    }
}
