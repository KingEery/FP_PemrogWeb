<?php
// database/seeders/ConsultantSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultant;
use App\Models\FreeTrial;

class ConsultantsSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample consultant
        $consultant = Consultant::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '+62812345678',
            'bio' => 'Experienced software developer with 10+ years in the industry. Specialized in web development and mobile applications.',
            'specialty' => 'Full Stack Development',
            'rating' => 4.8,
            'total_reviews' => 156,
            'hourly_rate' => 150000,
            'is_active' => true,
        ]);

        // Create free trial for the consultant
        FreeTrial::create([
            'consultant_id' => $consultant->id,
            'title' => 'Free Trial Konsultasi',
            'description' => 'Konsultasi gratis 30 menit untuk mengenal lebih dekat dan membahas kebutuhan Anda',
            'duration' => 30,
            'max_participants' => 100,
            'used_slots' => 0,
            'is_active' => true,
        ]);

        // Add more consultants if needed
        $consultant2 = Consultant::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'phone' => '+62823456789',
            'bio' => 'UI/UX Designer with passion for creating beautiful and functional user interfaces.',
            'specialty' => 'UI/UX Design',
            'rating' => 4.9,
            'total_reviews' => 89,
            'hourly_rate' => 120000,
            'is_active' => true,
        ]);

        FreeTrial::create([
            'consultant_id' => $consultant2->id,
            'title' => 'Free UI/UX Consultation',
            'description' => 'Konsultasi gratis untuk review design dan memberikan feedback',
            'duration' => 30,
            'max_participants' => 50,
            'used_slots' => 0,
            'is_active' => true,
        ]);
    }
}