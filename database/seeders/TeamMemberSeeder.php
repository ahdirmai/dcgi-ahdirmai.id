<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leaders = [
            [
                'name' => 'John Doe',
                'role' => 'Band Director',
                'type' => 'leadership',
                'image' => 'https://picsum.photos/400/500?grayscale&random=10'
            ],
            [
                'name' => 'Jane Smith',
                'role' => 'Field Commander',
                'type' => 'leadership',
                'image' => 'https://picsum.photos/400/500?grayscale&random=11'
            ],
            [
                'name' => 'Michael Tan',
                'role' => 'Corps Commander',
                'type' => 'leadership',
                'image' => 'https://picsum.photos/400/500?grayscale&random=12'
            ],
        ];

        $members = [
             [
                'name' => 'Alice Wonderland',
                'role' => 'Trumpet Section',
                'type' => 'member',
                'image' => 'https://picsum.photos/400/500?grayscale&random=13'
            ],
            [
                'name' => 'Bob Builder',
                'role' => 'Snare Drum',
                'type' => 'member',
                'image' => 'https://picsum.photos/400/500?grayscale&random=14'
            ],
        ];

        $allTeam = array_merge($leaders, $members);

        foreach ($allTeam as $data) {
            $member = TeamMember::create([
                'name' => $data['name'],
                'role' => $data['role'],
                'type' => $data['type'],
            ]);

            $member->gallery()->create([
                'image_path' => $data['image'],
                'caption' => $data['name']
            ]);
        }
    }
}
