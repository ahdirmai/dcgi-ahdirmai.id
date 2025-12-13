<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $albums = [
            [
                'title' => 'Grand Prix Final',
                'description' => 'Documentation of our Grand Prix Final performance.',
                'cover_image_path' => 'https://picsum.photos/800/800?grayscale&random=1',
            ],
            [
                'title' => 'Brassline',
                'description' => 'Our Brassline section.',
                'cover_image_path' => 'https://picsum.photos/400/800?grayscale&random=2',
            ],
            [
                'title' => 'Percussion',
                'description' => 'Our Percussion section.',
                'cover_image_path' => 'https://picsum.photos/400/400?grayscale&random=3',
            ],
            [
                'title' => 'Color Guard',
                'description' => 'Our Color Guard section.',
                'cover_image_path' => 'https://picsum.photos/400/400?grayscale&random=4',
            ],
        ];

        foreach ($albums as $albumData) {
            Album::create($albumData);
        }
    }
}
