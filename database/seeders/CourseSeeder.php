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
            'thumbnail' => 'https://www.angon.co.id/wp-content/uploads/2023/10/1686539179.png'
        ]);
        Course::create([
            'title' => 'c++',
            'instructor' => 'mulyono',
            'duration' => 30,
            'video_count' => 2,
            'original_price' => 200000,
            'price' => 50000,
            'thumbnail' => 'https://miro.medium.com/v2/resize:fit:1400/0*Nx-rPatNPrza5lys'
        ]);
        Course::create([
            'title' => 'vue',
            'instructor' => 'unzurna',
            'duration' => 55,
            'video_count' => 4,
            'original_price' => 320000,
            'price' => 80000,
            'thumbnail' => 'https://res.cloudinary.com/ddxwdqwkr/image/upload/f_auto/v1689120136/patterns.dev/Images/vue/og-images/introduction.png'
        ]);
        Course::create([
            'title' => 'Javascript',
            'instructor' => 'satrio',
            'duration' => 120,
            'video_count' => 6,
            'original_price' => 400000,
            'price' => 130000,
            'thumbnail' => 'https://techvccloud.mediacdn.vn/2018/11/23/js-15429579443112042672363-crop-1542957949936317424252.png'
        ]);
        Course::create([
            'title' => 'CSS + Html',
            'instructor' => 'satrio',
            'duration' => 200,
            'video_count' => 6,
            'original_price' => 2500000,
            'price' => 100000,
            'thumbnail' => 'https://danielpietrasik.pl/wp-content/uploads/css-formy-i-struktury-850x438.png'
        ]);
        Course::create([
            'title' => 'python',
            'instructor' => 'Raihan',
            'duration' => 260,
            'video_count' => 8,
            'original_price' => 400000,
            'price' => 200000,
            'thumbnail' => 'https://miro.medium.com/v2/resize:fit:700/1*3IcLSFuT8PQg4cUBaRXH1A.png'
        ]);
    }
}
