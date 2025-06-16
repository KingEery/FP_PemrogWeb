<?php

namespace Database\Seeders;

use App\Models\Mentoring;
use Illuminate\Database\Seeder;

class MentoringSeeder extends Seeder
{
    public function run()
    {
        $description = "✔ Chapter 1: Pengenalan Web & HTML Dasar\n";
        $description .= "✔ Chapter 2: Struktur Halaman HTML\n";
        $description .= "✔ Chapter 3: Elemen Multimedia dalam HTML";

        Mentoring::create([
            'title' => 'Program Full Stack Web Development',
            'image' => 'images/Mentoring-Images.jpg',
            'description' => $description,
            'price_normal' => 8000000,
            'price_discount' => 135000,
            'slug' => 'full-stack-web-development'
        ]);

        // Data tambahan contoh
        Mentoring::create([
            'title' => 'Program Mobile App Development',
            'image' => 'images/Mobile-App-Images.jpg',
            'description' => "✔ Chapter 1: Pengenalan Flutter\n✔ Chapter 2: Widget Dasar\n✔ Chapter 3: State Management",
            'price_normal' => 7500000,
            'price_discount' => 150000,
            'slug' => 'mobile-app-development'
        ]);

        Mentoring::create([
            'title' => 'Program Data Science',
            'image' => 'images/Data-Science-Images.jpg',
            'description' => "✔ Chapter 1: Python untuk Data Science\n✔ Chapter 2: Pandas dan Numpy\n✔ Chapter 3: Visualisasi Data",
            'price_normal' => 9000000,
            'price_discount' => 200000,
            'slug' => 'data-science'
        ]);
    }
}