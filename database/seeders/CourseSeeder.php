<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'title' => 'Laravel 12 Mastery',
            'instructor' => 'Mbah Bregas',
            'duration' => 270,
            'video_count' => 23,
            'original_price' => 300000,
            'price' => 99000,
            'thumbnail' => 'image/buildwebsite.png'
        ]);
    }
}
