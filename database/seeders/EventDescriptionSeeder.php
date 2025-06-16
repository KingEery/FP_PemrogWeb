<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventsDescription;

class EventDescriptionSeeder extends Seeder
{
    public function run()
    {

        EventsDescription::create([
            'event_id' => 12,
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
    }
}
