<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        TeamMember::create([
            'name' => 'Dimas Saputra',
            'photo' => 'team/dimas.jpg',
            'github' => 'https://github.com/DimsDwi',
            'instagram' => 'https://instagram.com/smokingkillmyslf',
        ]);

        TeamMember::create([
            'name' => 'Rani Nuraini',
            'photo' => 'team/rani.jpg',
            'github' => 'https://github.com/rani',
            'instagram' => 'https://instagram.com/rani',
        ]);
    }
}

