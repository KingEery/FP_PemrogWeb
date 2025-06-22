<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\EventsDescription;

class EventDescriptionSeeder extends Seeder
{
    public function run()
    {
        // Nonaktifkan foreign key checks sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Kosongkan tabel jika ada
        EventsDescription::query()->delete();

        // Aktifkan kembali foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Seeder data
        $events = [
            [
                'title' => 'Google I/O Extended',
                'image' => 'events/hackathon.webp',
                'category' => 'Mobile & Cloud',
                'overview' => 'Update teknologi dari Google langsung!',
                'what_youll_learn' => [
                    ['item' => 'Flutter untuk UI lintas platform'],
                    ['item' => 'Firebase untuk backend'],
                    ['item' => 'Integrasi AI dalam aplikasi mobile']
                ],
                'terms_conditions' => [
                    ['term' => 'Registrasi wajib'],
                    ['term' => 'Sesi tidak direkam'],
                    ['term' => 'Tidak ada sertifikat untuk peserta pasif']
                ],
                'dates' => [
                    ['date' => '2025-11-25']
                ],
                'includes' => [
                    ['item' => 'Live Demo'],
                    ['item' => 'Sertifikat']
                ],
                'price_original' => 150000,
                'price_discounted' => 10000,
                'speaker_name' => 'Ayu Pratiti',
                'speaker_title' => 'Mobile Developer',
                'time' => '10.00 WIB - 13.00 WIB',
                'location' => 'Zoom Online',
            ],
            [
                'title' => 'UI/UX Design Workshop',
                'image' => 'events/design-workshop.webp',
                'category' => 'UI/UX',
                'overview' => 'Workshop intensif UI/UX untuk mendalami proses desain antarmuka dan pengalaman pengguna.',
                'what_youll_learn' => [
                    ['item' => 'Dasar-dasar UI/UX'],
                    ['item' => 'Tools desain seperti Figma atau Adobe XD'],
                    ['item' => 'Membuat wireframe dan prototipe'],
                    ['item' => 'User testing dan validasi desain']
                ],
                'terms_conditions' => [
                    ['term' => 'Bawa laptop sendiri'],
                    ['term' => 'Gunakan tools yang telah diinstal sebelumnya'],
                    ['term' => 'Kamera wajib on (jika online)']
                ],
                'dates' => [
                    ['date' => '2025-12-17']
                ],
                'includes' => [
                    ['item' => 'Sertifikat'],
                    ['item' => 'File Materi'],
                    ['item' => 'Akses grup diskusi']
                ],
                'price_original' => 300000,
                'price_discounted' => 150000,
                'speaker_name' => 'Tidak tersedia',
                'speaker_title' => 'Tidak tersedia',
                'time' => '10.00 WIB - 13.00 WIB',
                'location' => 'Surabaya atau Online via Zoom',
            ],
            [
                'title' => 'DevFest Indonesia 2025',
                'image' => 'events/devfest.jpg',
                'category' => 'Web Programming',
                'overview' => 'Konferensi komunitas teknologi Google di Indonesia.',
                'what_youll_learn' => [
                    ['item' => 'Pemrograman web dengan teknologi Google'],
                    ['item' => 'Kolaborasi tim developer'],
                    ['item' => 'Tips karier dari engineer Google']
                ],
                'terms_conditions' => [
                    ['term' => 'Datang 15 menit sebelum acara'],
                    ['term' => 'Sertifikat untuk peserta aktif']
                ],
                'dates' => [
                    ['date' => '2025-11-20'],
                    ['date' => '2025-11-21'],
                    ['date' => '2025-11-22']
                ],
                'includes' => [
                    ['item' => 'Project File'],
                    ['item' => 'Sertifikat'],
                    ['item' => 'Slide Materi']
                ],
                'price_original' => 200000,
                'price_discounted' => 10000,
                'speaker_name' => 'Yafa Nanda Putra',
                'speaker_title' => 'Software Engineer',
                'time' => '12.00 WIB - 15.00 WIB',
                'location' => 'Google Meet',
            ],
            [
                'title' => 'Full Stack Developer Day: From Zero to Hero',
                'image' => 'events/Full-Stack-Developer.webp',
                'category' => 'Fullstack',
                'overview' => 'Workshop intensif membangun aplikasi web lengkap dari frontend ke backend.',
                'what_youll_learn' => [
                    ['item' => 'Membuat tampilan web dengan React.js'],
                    ['item' => 'Membuat API backend dengan Node.js'],
                    ['item' => 'Menghubungkan frontend ke backend'],
                    ['item' => 'Deploy aplikasi ke internet']
                ],
                'terms_conditions' => [
                    ['term' => 'Wajib membawa laptop'],
                    ['term' => 'Internet pribadi wajib'],
                    ['term' => 'Sertifikat untuk peserta aktif']
                ],
                'dates' => [
                    ['date' => '2025-10-12']
                ],
                'includes' => [
                    ['item' => 'Sertifikat'],
                    ['item' => 'Source Code'],
                    ['item' => 'Workshop Recording']
                ],
                'price_original' => 200000,
                'price_discounted' => 120000,
                'speaker_name' => 'Ilham Surya',
                'speaker_title' => 'Full Stack Developer @StartupTech',
                'time' => '09.00 WIB - 13.00 WIB',
                'location' => 'Universitas Negeri Malang',
            ],
            [
                'title' => 'Mastering the Back-End: From API to Database',
                'image' => 'events/Back-End.webp',
                'category' => 'Back-End',
                'overview' => 'Pelatihan teknis membangun API RESTful dan sistem database dari dasar hingga siap produksi.',
                'what_youll_learn' => [
                    ['item' => 'Membuat server dengan Express.js'],
                    ['item' => 'CRUD API dan autentikasi JWT'],
                    ['item' => 'Manajemen database dengan MySQL dan MongoDB'],
                    ['item' => 'Best Practice struktur back-end']
                ],
                'terms_conditions' => [
                    ['term' => 'Membawa laptop sendiri'],
                    ['term' => 'Boleh bekerja dalam tim'],
                    ['term' => 'Kamera wajib on (jika online)']
                ],
                'dates' => [
                    ['date' => '2025-12-15']
                ],
                'includes' => [
                    ['item' => 'Project File'],
                    ['item' => 'Sertifikat'],
                    ['item' => 'Akses Rekaman']
                ],
                'price_original' => 100000,
                'price_discounted' => 50000,
                'speaker_name' => 'Rizal Pramana',
                'speaker_title' => 'Senior Backend Engineer @FinTech ID',
                'time' => '10.00 WIB - 14.00 WIB',
                'location' => 'STMIK Surabaya atau Online via Zoom',
            ],
            [
                'title' => 'Intro to Data Science Bootcamp',
                'image' => 'events/Data-Science-Images.webp',
                'category' => 'Data Science',
                'overview' => 'Pelatihan intensif untuk pemula yang ingin masuk ke dunia data science.',
                'what_youll_learn' => [
                    ['item' => 'Dasar-dasar Python untuk analisis data'],
                    ['item' => 'Pengenalan machine learning'],
                    ['item' => 'Mengolah data dengan Pandas dan Numpy'],
                    ['item' => 'Visualisasi data dengan Matplotlib']
                ],
                'terms_conditions' => [
                    ['term' => 'Laptop dengan Python terinstal'],
                    ['term' => 'Mengikuti seluruh sesi'],
                    ['term' => 'Penilaian akhir wajib untuk sertifikat']
                ],
                'dates' => [
                    ['date' => '2025-10-05']
                ],
                'includes' => [
                    ['item' => 'Sertifikat'],
                    ['item' => 'Modul PDF'],
                    ['item' => 'Akses Google Colab Template']
                ],
                'price_original' => 250000,
                'price_discounted' => 100000,
                'speaker_name' => 'Sinta Ayu',
                'speaker_title' => 'Data Scientist @DataLab',
                'time' => '08.30 WIB - 12.00 WIB',
                'location' => 'Online via Zoom',
            ],
        ];

        foreach ($events as $event) {
            EventsDescription::create($event);
        }
    }
}
