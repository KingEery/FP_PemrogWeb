<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materi;

class MateriSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan tabel materis dulu agar tidak error duplicate
        Materi::truncate();

        // Isi data baru
        Materi::insert([
            [
                'course_description_id' => 1, // pastikan ini ada
                'judul' => 'Pendahuluan',
                'slug' => 'pendahuluan',
                'konten' => '<p>Selamat datang di kursus Laravel. Ini adalah bagian pendahuluan.</p>',
            ],
            [
                'course_description_id' => 1,
                'judul' => 'Pengertian Laravel',
                'slug' => 'pengertian',
                'konten' => '<p>Laravel adalah framework PHP yang powerful dan elegan.</p>',
            ],
            [
                'course_description_id' => 1,
                'judul' => 'Manfaat Laravel',
                'slug' => 'manfaat',
                'konten' => '<p>Laravel mempermudah proses development dan memiliki banyak fitur.</p>',
            ],
            [
                'course_description_id' => 1,
                'judul' => 'Contoh Penggunaan Laravel',
                'slug' => 'contoh',
                'konten' => '<p>Contoh route: <code>Route::get(\'/halo\', function() { return "Halo"; });</code></p>',
            ],
        ]);
    }
}
