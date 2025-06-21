<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventsDescription;

class EventDescriptionSeeder extends Seeder
{
    public function run()
    {
        EventsDescription::create([
            'title' => 'DevFest Indonesia 2025',
            'image' => 'events/devfest.jpg',
            'category' => 'Web Programming',
            'overview' => 'Konferensi komunitas teknologi Google di Indonesia.',
            'what_youll_learn' => json_encode([
                ['item' => 'Pemrograman web dengan teknologi Google'],
                ['item' => 'Kolaborasi tim developer'],
                ['item' => 'Tips karier dari engineer Google']
            ]),
            'terms_conditions' => json_encode([
                ['term' => 'Datang 15 menit sebelum acara'],
                ['term' => 'Sertifikat untuk peserta aktif']
            ]),
            'dates' => json_encode([
                ['date' => '20 November 2025'],
                ['date' => '21 November 2025'],
                ['date' => '22 November 2025']
            ]),
            'includes' => json_encode([
                ['item' => 'Project File'],
                ['item' => 'Sertifikat'],
                ['item' => 'Slide Materi']
            ]),
            'price_original' => 'Rp. 200.000',
            'price_discounted' => 'Free',
            'speaker_name' => 'Yafa Nanda Putra',
            'speaker_title' => 'Software Engineer',
            'time' => '12.00 WIB - 15.00 WIB',
            'location' => 'Google Meet',
        ]);

        EventsDescription::create([
            'title' => 'Google I/O Extended',
            'image' => 'events/hackathon.webp',
            'category' => 'Mobile & Cloud',
            'overview' => 'Update teknologi dari Google langsung!',
            'what_youll_learn' => json_encode([
                ['item' => 'Flutter untuk UI lintas platform'],
                ['item' => 'Firebase untuk backend'],
                ['item' => 'Integrasi AI dalam aplikasi mobile']
            ]),
            'terms_conditions' => json_encode([
                ['term' => 'Registrasi wajib'],
                ['term' => 'Sesi tidak direkam'],
                ['term' => 'Tidak ada sertifikat untuk peserta pasif']
            ]),
            'dates' => json_encode([
                ['date' => '25 November 2025']
            ]),
            'includes' => json_encode([
                ['item' => 'Live Demo'],
                ['item' => 'Sertifikat']
            ]),
            'price_original' => 'Rp. 150.000',
            'price_discounted' => 'Gratis',
            'speaker_name' => 'Ayu Pratiti',
            'speaker_title' => 'Mobile Developer',
            'time' => '10.00 WIB - 13.00 WIB',
            'location' => 'Zoom Online',
        ]);

          EventsDescription::create([
            'title' => 'UI/UX Design Workshop',
            'image' => 'events/design-workshop.webp',
            'category' => 'UI/UX',
            'overview' => 'Workshop intensif UI/UX untuk mendalami proses desain antarmuka dan pengalaman pengguna.',
            'what_youll_learn' => json_encode([
                ['item' => 'Dasar-dasar UI/UX'],
                ['item' => 'Tools desain seperti Figma atau Adobe XD'],
                ['item' => 'Membuat wireframe dan prototipe'],
                ['item' => 'User testing dan validasi desain']
            ]),
            'terms_conditions' => json_encode([
                ['term' => 'Bawa laptop sendiri'],
                ['term' => 'Gunakan tools yang telah diinstal sebelumnya'],
                ['term' => 'Kamera wajib on (jika online)']
            ]),
            'dates' => json_encode([
                ['date' => '17 Desember 2025']
            ]),
            'includes' => json_encode([
                ['item' => 'Sertifikat'],
                ['item' => 'File Materi'],
                ['item' => 'Akses grup diskusi']
            ]),
            'price_original' => 'Rp. 300.000',
            'price_discounted' => 'Rp. 150.000',
            'speaker_name' => 'Tidak tersedia',
            'speaker_title' => 'Tidak tersedia',
            'time' => '10.00 WIB - 13.00 WIB',
            'location' => 'Surabaya atau Online via Zoom',
        ]);

        EventsDescription::create([
            'title' => 'DevFest Indonesia 2025',
            'image' => 'events/devfest.jpg',
            'category' => 'Web Programming',
            'overview' => 'Konferensi komunitas teknologi Google di Indonesia.',
            'what_youll_learn' => json_encode([
                ['item' => 'Pemrograman web dengan teknologi Google'],
                ['item' => 'Kolaborasi tim developer'],
                ['item' => 'Tips karier dari engineer Google']
            ]),
            'terms_conditions' => json_encode([
                ['term' => 'Datang 15 menit sebelum acara'],
                ['term' => 'Sertifikat untuk peserta aktif']
            ]),
            'dates' => json_encode([
                ['date' => '20 November 2025'],
                ['date' => '21 November 2025'],
                ['date' => '22 November 2025']
            ]),
            'includes' => json_encode([
                ['item' => 'Project File'],
                ['item' => 'Sertifikat'],
                ['item' => 'Slide Materi']
            ]),
            'price_original' => 'Rp. 200.000',
            'price_discounted' => 'Free',
            'speaker_name' => 'Yafa Nanda Putra',
            'speaker_title' => 'Software Engineer',
            'time' => '12.00 WIB - 15.00 WIB',
            'location' => 'Google Meet',
        ]);

        EventsDescription::create([
            'title' => 'Full Stack Developer Day: From Zero to Hero',
            'image' => 'events/Full-Stack-Developer.webp',
            'category' => 'Fullstack',
            'overview' => 'Workshop intensif membangun aplikasi web lengkap dari frontend ke backend.',
            'what_youll_learn' => json_encode([
                ['item' => 'Membuat tampilan web dengan React.js'],
                ['item' => 'Membuat API backend dengan Node.js'],
                ['item' => 'Menghubungkan frontend ke backend'],
                ['item' => 'Deploy aplikasi ke internet']
            ]),
            'terms_conditions' => json_encode([
                ['term' => 'Wajib membawa laptop'],
                ['term' => 'Internet pribadi wajib'],
                ['term' => 'Sertifikat untuk peserta aktif']
            ]),
            'dates' => json_encode([
                ['date' => '12 Oktober 2025']
            ]),
            'includes' => json_encode([
                ['item' => 'Sertifikat'],
                ['item' => 'Source Code'],
                ['item' => 'Workshop Recording']
            ]),
            'price_original' => 'Rp. 200.000',
            'price_discounted' => 'Rp. 120.000',
            'speaker_name' => 'Ilham Surya',
            'speaker_title' => 'Full Stack Developer @StartupTech',
            'time' => '09.00 WIB - 13.00 WIB',
            'location' => 'Universitas Negeri Malang',
        ]);

        EventsDescription::create([
            'title' => 'Mastering the Back-End: From API to Database',
            'image' => 'events/Back-End.webp',
            'category' => 'Back-End',
            'overview' => 'Pelatihan teknis membangun API RESTful dan sistem database dari dasar hingga siap produksi.',
            'what_youll_learn' => json_encode([
                ['item' => 'Membuat server dengan Express.js'],
                ['item' => 'CRUD API dan autentikasi JWT'],
                ['item' => 'Manajemen database dengan MySQL dan MongoDB'],
                ['item' => 'Best Practice struktur back-end']
            ]),
            'terms_conditions' => json_encode([
                ['term' => 'Membawa laptop sendiri'],
                ['term' => 'Boleh bekerja dalam tim'],
                ['term' => 'Kamera wajib on (jika online)']
            ]),
            'dates' => json_encode([
                ['date' => '15 Desember 2025']
            ]),
            'includes' => json_encode([
                ['item' => 'Project File'],
                ['item' => 'Sertifikat'],
                ['item' => 'Akses Rekaman']
            ]),
            'price_original' => 'Rp. 100.000',
            'price_discounted' => 'Rp. 50.000',
            'speaker_name' => 'Rizal Pramana',
            'speaker_title' => 'Senior Backend Engineer @FinTech ID',
            'time' => '10.00 WIB - 14.00 WIB',
            'location' => 'STMIK Surabaya atau Online via Zoom',
        ]);

      
    }
}