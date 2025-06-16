<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventsDescription;

class EventDescriptionSeeder extends Seeder
{
    public function run()
    {

        EventsDescription::create([
            'event_id' => 1,
            'title' => 'DevFest Indonesia 2025',
            'image' => 'image/devfest.jpg',
            'category' => 'Web Programming',
            'overview' => 'Konferensi komunitas teknologi Google di Indonesia.',
            'what_youll_learn' => json_encode([
                'Pemrograman web dengan teknologi Google',
                'Kolaborasi tim developer',
                'Tips karier dari engineer Google'
            ]),
            'terms_conditions' => json_encode([
                'Datang 15 menit sebelum acara',
                'Sertifikat untuk peserta aktif'
            ]),
            'dates' => json_encode(['20 November 2025', '21 November 2025', '22 November 2025']),
            'includes' => json_encode(['Project File', 'Sertifikat', 'Slide Materi']),
            'price_original' => 'Rp. 200.000',
            'price_discounted' => 'Free',
            'speaker_name' => 'Yafa Nanda Putra',
            'speaker_title' => 'Software Engineer',
            'time' => '12.00 WIB - 15.00 WIB',
            'location' => 'Google Meet',
        ]);

        EventsDescription::create([
            'event_id' => 2,
            'title' => 'Google I/O Extended',
            'image' => 'image/hackathon.webp',
            'category' => 'Mobile & Cloud',
            'overview' => 'Update teknologi dari Google langsung!',
            'what_youll_learn' => json_encode([
                'Flutter untuk UI lintas platform',
                'Firebase untuk backend',
                'Integrasi AI dalam aplikasi mobile'
            ]),
            'terms_conditions' => json_encode([
                'Registrasi wajib',
                'Sesi tidak direkam',
                'Tidak ada sertifikat untuk peserta pasif'
            ]),
            'dates' => json_encode(['25 November 2025']),
            'includes' => json_encode(['Live Demo', 'Sertifikat']),
            'price_original' => 'Rp. 150.000',
            'price_discounted' => 'Gratis',
            'speaker_name' => 'Ayu Pratiti',
            'speaker_title' => 'Mobile Developer',
            'time' => '10.00 WIB - 13.00 WIB',
            'location' => 'Zoom Online',
        ]);

        EventsDescription::create([
            'event_id' => 3,
            'title' => 'Google I/O Extended 2025',
            'image' => 'image/design-workshop.webp',
            'category' => 'Mobile & Cloud',
            'overview' => 'Update teknologi dari Google langsung!',
            'what_youll_learn' => json_encode([
                'Flutter untuk UI lintas platform',
                'Firebase untuk backend',
                'Integrasi AI dalam aplikasi mobile'
            ]),
            'terms_conditions' => json_encode([
                'Registrasi wajib',
                'Sesi tidak direkam',
                'Tidak ada sertifikat untuk peserta pasif'
            ]),
            'dates' => json_encode(['25 November 2025']),
            'includes' => json_encode(['Live Demo', 'Sertifikat']),
            'price_original' => 'Rp. 150.000',
            'price_discounted' => 'Gratis',
            'speaker_name' => 'Ayu Pratiti',
            'speaker_title' => 'Mobile Developer',
            'time' => '10.00 WIB - 13.00 WIB',
            'location' => 'Zoom Online',
        ]);

        EventsDescription::create([
            'event_id' => 4,
            'title' => 'DevFest Indonesia 2025',
            'image' => 'image/devfest.jpg',
            'category' => 'Web Programming',
            'overview' => 'Konferensi komunitas teknologi Google di Indonesia.',
            'what_youll_learn' => json_encode([
                'Pemrograman web dengan teknologi Google',
                'Kolaborasi tim developer',
                'Tips karier dari engineer Google'
            ]),
            'terms_conditions' => json_encode([
                'Datang 15 menit sebelum acara',
                'Sertifikat untuk peserta aktif'
            ]),
            'dates' => json_encode(['20 November 2025', '21 November 2025', '22 November 2025']),
            'includes' => json_encode(['Project File', 'Sertifikat', 'Slide Materi']),
            'price_original' => 'Rp. 200.000',
            'price_discounted' => 'Free',
            'speaker_name' => 'Yafa Nanda Putra',
            'speaker_title' => 'Software Engineer',
            'time' => '12.00 WIB - 15.00 WIB',
            'location' => 'Google Meet',
        ]);

        EventsDescription::create([
            'event_id' => 5,
            'title' => 'Full Stack Developer Day: From Zero to Hero',
            'image' => 'image/Full-Stack-Developer.webp',
            'category' => 'Fullstack',
            'overview' => 'Workshop intensif membangun aplikasi web lengkap dari frontend ke backend.',
            'what_youll_learn' => json_encode([
                'Membuat tampilan web dengan React.js',
                'Membuat API backend dengan Node.js',
                'Menghubungkan frontend ke backend',
                'Deploy aplikasi ke internet'
            ]),
            'terms_conditions' => json_encode([
                'Wajib membawa laptop',
                'Internet pribadi wajib',
                'Sertifikat untuk peserta aktif'
            ]),
            'dates' => json_encode(['12 Oktober 2025']),
            'includes' => json_encode(['Sertifikat', 'Source Code', 'Workshop Recording']),
            'price_original' => 'Rp. 200.000',
            'price_discounted' => 'Rp. 120.000',
            'speaker_name' => 'Ilham Surya',
            'speaker_title' => 'Full Stack Developer @StartupTech',
            'time' => '09.00 WIB - 13.00 WIB',
            'location' => 'Universitas Negeri Malang',
        ]);

        EventsDescription::create([
            'event_id' => 6,
            'title' => 'Mastering the Back-End: From API to Database',
            'image' => 'image/Back-End.webp',
            'category' => 'Back-End',
            'overview' => 'Pelatihan teknis membangun API RESTful dan sistem database dari dasar hingga siap produksi.',
            'what_youll_learn' => json_encode([
                'Membuat server dengan Express.js',
                'CRUD API dan autentikasi JWT',
                'Manajemen database dengan MySQL dan MongoDB',
                'Best Practice struktur back-end'
            ]),
            'terms_conditions' => json_encode([
                'Membawa laptop sendiri',
                'Boleh bekerja dalam tim',
                'Kamera wajib on (jika online)'
            ]),
            'dates' => json_encode(['15 Desember 2025']),
            'includes' => json_encode(['Project File', 'Sertifikat', 'Akses Rekaman']),
            'price_original' => 'Rp. 100.000',
            'price_discounted' => 'Rp. 50.000',
            'speaker_name' => 'Rizal Pramana',
            'speaker_title' => 'Senior Backend Engineer @FinTech ID',
            'time' => '10.00 WIB - 14.00 WIB',
            'location' => 'STMIK Surabaya atau Online via Zoom',
        ]);

        EventsDescription::create([
            'event_id' => 3,
            'title' => 'UI/UX Design Workshop',
            'image' => 'image/design-workshop.webp',
            'category' => 'UI/UX',
            'overview' => 'Workshop intensif UI/UX untuk mendalami proses desain antarmuka dan pengalaman pengguna.',
            'what_youll_learn' => json_encode([
                'Dasar-dasar UI/UX',
                'Tools desain seperti Figma atau Adobe XD',
                'Membuat wireframe dan prototipe',
                'User testing dan validasi desain'
            ]),
            'terms_conditions' => json_encode([
                'Bawa laptop sendiri',
                'Gunakan tools yang telah diinstal sebelumnya',
                'Kamera wajib on (jika online)'
            ]),
            'dates' => json_encode(['17 Desember 2025']),
            'includes' => json_encode(['Sertifikat', 'File Materi', 'Akses grup diskusi']),
            'price_original' => 'Rp. 300.000',
            'price_discounted' => 'Rp. 150.000',
            'speaker_name' => 'Tidak tersedia',
            'speaker_title' => 'Tidak tersedia',
            'time' => '10.00 WIB - 13.00 WIB',
            'location' => 'Surabaya atau Online via Zoom',
        ]);
    }
}
