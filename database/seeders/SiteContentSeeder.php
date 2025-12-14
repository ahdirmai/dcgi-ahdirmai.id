<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteContent::updateOrCreate(
            ['section' => 'hero', 'key' => 'background_type'],
            ['content' => 'image', 'type' => 'text']
        );

        SiteContent::updateOrCreate(
            ['section' => 'hero', 'key' => 'background_url'],
            ['content' => 'https://picsum.photos/1920/1080?grayscale&blur=2', 'type' => 'image']
        );

        SiteContent::updateOrCreate(
            ['section' => 'about', 'key' => 'image_url'],
            ['content' => 'https://picsum.photos/600/800?grayscale', 'type' => 'image']
        );

        // Seed Sponsorships if none exist
        if (SiteContent::where('section', 'sponsorship')->doesntExist()) {
            $sponsors = [
                'https://placehold.co/200x100/png?text=Sponsor+1',
                'https://placehold.co/200x100/png?text=Sponsor+2',
                'https://placehold.co/200x100/png?text=Sponsor+3',
                'https://placehold.co/200x100/png?text=Sponsor+4',
                'https://placehold.co/200x100/png?text=Sponsor+5',
            ];

            foreach ($sponsors as $index => $url) {
                SiteContent::create([
                    'section' => 'sponsorship',
                    'key' => 'sponsor_seed_'.($index + 1),
                    'content' => $url,
                    'type' => 'image',
                ]);
            }
        }

        // Seed Social Media
        $socials = [
            'instagram' => 'https://instagram.com',
            'tiktok' => 'https://tiktok.com',
            'youtube' => 'https://youtube.com',
            'email' => 'contact@example.com',
        ];

        foreach ($socials as $key => $content) {
            SiteContent::updateOrCreate(
                ['section' => 'social', 'key' => $key],
                ['content' => $content, 'type' => 'text']
            );
        }
    }
}
