<?php
// database/seeders/BookingSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingsSeeder extends Seeder
{
    public function run()
    {
        // Pastikan ada data consultans dan free_trials terlebih dahulu
        $consultanIds = DB::table('consultants')->pluck('id')->toArray();
        $freeTrialIds = DB::table('free_trials')->pluck('id')->toArray();

        if (empty($consultanIds)) {
            $this->command->warn('No consultants found. Please seed consultants table first.');
            return;
        }

        $bookings = [];
        $startDate = Carbon::now()->subDays(30); // Bookings from last 30 days
        $endDate = Carbon::now()->addDays(60);   // Bookings for next 60 days

        // Sample client names and emails
        $clients = [
            ['name' => 'Ahmad Rizki', 'email' => 'ahmad.rizki@gmail.com', 'phone' => '081234567890'],
            ['name' => 'Siti Nurhaliza', 'email' => 'siti.nurhaliza@gmail.com', 'phone' => '081234567891'],
            ['name' => 'Budi Santoso', 'email' => 'budi.santoso@gmail.com', 'phone' => '081234567892'],
            ['name' => 'Maya Sari', 'email' => 'maya.sari@gmail.com', 'phone' => '081234567893'],
            ['name' => 'Joko Susanto', 'email' => 'joko.susanto@gmail.com', 'phone' => '081234567894'],
            ['name' => 'Kartika Dewi', 'email' => 'kartika.dewi@gmail.com', 'phone' => '081234567895'],
            ['name' => 'Dwi Putra', 'email' => 'dwi.putra@gmail.com', 'phone' => '081234567896'],
            ['name' => 'Lina Cahyani', 'email' => 'lina.cahyani@gmail.com', 'phone' => '081234567897'],
            ['name' => 'Eko Prasetyo', 'email' => 'eko.prasetyo@gmail.com', 'phone' => '081234567898'],
            ['name' => 'Fani Wijaya', 'email' => 'fani.wijaya@gmail.com', 'phone' => '081234567899'],
        ];

        // Generate 100 bookings
        for ($i = 0; $i < 100; $i++) {
            $isFreeTrial = !empty($freeTrialIds) && rand(0, 100) < 30; // ~30% are free trials
            $consultanId = $consultanIds[array_rand($consultanIds)];
            $client = $clients[array_rand($clients)];

            $bookingDate = $startDate->copy()->addDays(rand(0, $startDate->diffInDays($endDate)));
            // Ensure booking time is within working hours (e.g., 9 AM to 5 PM)
            $bookingTime = Carbon::createFromTime(rand(9, 17), 0, 0);

            $freeTrialId = null;
            $type = 'paid';
            $amount = rand(100000, 500000); // Default amount for paid bookings
            $duration = 60; // Default duration in minutes

            if ($isFreeTrial) {
                // Try to find an active, unexpired free trial with available slots for this consultant
                $freeTrial = DB::table('free_trials')
                    ->where('consultant_id', $consultanId)
                    ->where('is_active', true)
                    ->where('used_slots', '<', DB::raw('max_participants'))
                    ->where(function($query) {
                        $query->whereNull('valid_until')
                              ->orWhere('valid_until', '>', now());
                    })
                    ->inRandomOrder()
                    ->first();

                if ($freeTrial) {
                    $freeTrialId = $freeTrial->id;
                    $type = 'free';
                    $amount = 0; // Free trials have 0 amount
                    $duration = $freeTrial->duration; // Use free trial's duration

                    // Increment used slots for the free trial
                    DB::table('free_trials')->where('id', $freeTrialId)->increment('used_slots');
                } else {
                    // If no suitable free trial is found, make it a paid booking
                    $isFreeTrial = false;
                }
            }

            $statusOptions = ['pending', 'confirmed', 'completed', 'cancelled'];
            $status = $statusOptions[array_rand($statusOptions)];

            // Ensure completed paid bookings have a positive amount
            if ($status === 'completed' && $type === 'paid' && $amount === 0) {
                $amount = rand(100000, 500000);
            }

            // Generate a simple meeting link
            $meetingLink = 'https://meet.example.com/' . uniqid();

            $bookings[] = [
                'consultant_id' => $consultanId,
                'free_trial_id' => $freeTrialId,
                'full_name' => $client['name'],
                'email' => $client['email'],
                'phone' => $client['phone'],
                'booking_date' => $bookingDate->format('Y-m-d'),
                'booking_time' => $bookingTime->format('H:i:s'),
                'duration' => $duration,
                'type' => $type,
                'topic' => ($isFreeTrial ? 'Free Trial: ' . ($freeTrial->title ?? 'General Free Consult') : 'Topik Konsultasi ' . ($i + 1)),
                'notes' => 'Catatan untuk booking ' . ($i + 1) . '. ' . ($isFreeTrial ? 'Ini adalah sesi free trial.' : 'Ini adalah sesi berbayar.'),
                'status' => $status,
                'amount' => $amount,
                'meeting_link' => $meetingLink,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert bookings in chunks to handle potentially large datasets efficiently
        $chunks = array_chunk($bookings, 10);
        foreach ($chunks as $chunk) {
            DB::table('bookings')->insert($chunk);
        }

        $this->command->info('BookingSeeder completed successfully!');
        $this->command->info('Created ' . count($bookings) . ' booking records.');

        // Show some statistics
        $stats = DB::table('bookings')
            ->selectRaw('
                COUNT(*) as total,
                SUM(CASE WHEN type = "free" THEN 1 ELSE 0 END) as free_bookings,
                SUM(CASE WHEN type = "paid" THEN 1 ELSE 0 END) as paid_bookings,
                SUM(CASE WHEN status = "completed" THEN 1 ELSE 0 END) as completed,
                SUM(CASE WHEN status = "confirmed" THEN 1 ELSE 0 END) as confirmed,
                SUM(CASE WHEN status = "pending" THEN 1 ELSE 0 END) as pending,
                SUM(CASE WHEN status = "cancelled" THEN 1 ELSE 0 END) as cancelled
            ')
            ->first();

        $this->command->info("Statistics:");
        $this->command->info("- Total bookings: {$stats->total}");
        $this->command->info("- Free bookings: {$stats->free_bookings}");
        $this->command->info("- Paid bookings: {$stats->paid_bookings}");
        $this->command->info("- Completed: {$stats->completed}");
        $this->command->info("- Confirmed: {$stats->confirmed}");
        $this->command->info("- Pending: {$stats->pending}");
        $this->command->info("- Cancelled: {$stats->cancelled}");
    }
}
