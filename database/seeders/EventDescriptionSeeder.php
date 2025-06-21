<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\EventsDescription;
use App\Models\Event;

class EventDescriptionSeeder extends Seeder
{
    public function run()
    {
        // Nonaktifkan foreign key checks sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Kosongkan tabel dengan urutan yang benar
        Event::query()->delete();
        EventsDescription::query()->delete();
        
        // Aktifkan kembali foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Data contoh
        $events = [
            [
                'title' => 'DevFest Indonesia 2025',
                'image' => 'events/devfest.jpg',
                'category' => 'web-programming',
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
                'price_discounted' => 150000,
                'speaker_name' => 'Yafa Nanda Putra',
                'speaker_title' => 'Software Engineer',
                'time' => '12:00 - 15:00 WIB',
                'location' => 'Google Meet',
            ],
            // ... (data lainnya tetap sama seperti sebelumnya)
        ];

        foreach ($events as $eventData) {
            // Buat EventsDescription
            $description = EventsDescription::create($eventData);
            
            // Event akan otomatis dibuat melalui boot() method di model EventsDescription
        }
    }
}