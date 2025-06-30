<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CourseDescription;

class CourseDescriptionsSeeder extends Seeder
{
    public function run(): void
    {
        CourseDescription::create([
            'course_id' => 1,
            'title' => 'Web Programming Laravel',
            'tag' => 'Web Programming',
            'overview' => 'Kursus ini mengajarkan dasar-dasar pemrograman web menggunakan Laravel',
            'price' => 99000,
            'price_discount' => 200000,
            'instructor_name' => 'Bregas',
            'instructor_position' => 'Software Engineer at ITQOM',
            'video_count' => 27,
            'duration' => '20 Jam',
            'features' => [
                'File Project',
                'Free Career Coaching',
                'Grup Diskusi (Discord)',
                'Sertifikat Kelulusan'
            ],
            'image_url' => 'https://example.com/course.jpg',
            'instructor_image_url' => 'https://example.com/instructor.jpg',
        ]);
    }
}
