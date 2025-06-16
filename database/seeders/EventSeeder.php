<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'title' => 'DevFest Jakarta',
                'location' => 'Jakarta',
                'date' => '2025-11-20',
                'category' => 'web-programming',
                'price' => 'Gratis',
                'image' => 'image/devfest.jpg',
            ],
            [
                'title' => 'Mobile Hackathon',
                'location' => 'Bandung',
                'date' => '2025-11-25',
                'category' => 'mobile-programming',
                'price' => 'Rp100.000',
                'image' => 'image/hackathon.webp',
            ],
            [
                'title' => 'UI/UX Design Workshop',
                'location' => 'Surabaya',
                'date' => '2025-12-17',
                'category' => 'ui-ux',
                'price' => 'Rp150.000',
                'image' => 'image/design-workshop.webp',
            ],
            [
                'title' => 'DevFest Yogyakarta',
                'location' => 'Yogyakarta',
                'date' => '2025-12-05',
                'image' => 'image/devfest.jpg',
                'price' => 'Gratis',
                'category' => 'web-programming',
            ],
            [
                'title' => 'Full Stack Developer Day: From Zero to Hero',
                'location' => 'Malang',
                'date' => '2025-10-10',
                'image' => 'image/Full-Stack-Developer.webp',
                'price' => 'Rp120.000',
                'category' => 'fullstack',
            ],
            [
                'title' => 'Mastering the Back-End: From API to Database',
                'location' => 'Surabaya',
                'date' => '2025-12-15',
                'image' => 'image/Back-End.webp',
                'price' => 'Rp50.000',
                'category' => 'backend',
            ]
        ]);
    }
}
