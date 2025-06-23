<?php
// database/seeders/FreeTrialSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FreeTrialsSeeder extends Seeder
{
    public function run()
    {
        // Get all consultant IDs - DIPERBAIKI: consultants bukan consultans
        $consultanIds = DB::table('consultants')->pluck('id')->toArray();
        
        if (empty($consultanIds)) {
            $this->command->warn('No consultants found. Please seed consultants table first.');
            return;
        }

        $freeTrials = [];

        // Free trial templates for different specialties
        $trialTemplates = [
            // Business Strategy & Leadership
            [
                'title' => 'Strategic Planning Quick Assessment',
                'description' => 'Dapatkan evaluasi cepat mengenai kondisi strategis bisnis Anda dan rekomendasi awal untuk pengembangan strategi yang lebih efektif. Sesi ini cocok untuk CEO, founder, atau business owner yang ingin memahami posisi kompetitif perusahaan.',
                'duration' => 30,
                'specialty' => 'Business Strategy & Leadership'
            ],
            [
                'title' => 'Leadership Style Evaluation',
                'description' => 'Temukan gaya kepemimpinan Anda dan pelajari cara mengoptimalkannya untuk meningkatkan performa tim. Termasuk mini assessment dan tips praktis untuk pengembangan leadership skills.',
                'duration' => 45,
                'specialty' => 'Business Strategy & Leadership'
            ],
            
            // Digital Marketing & E-commerce
            [
                'title' => 'Digital Marketing Health Check',
                'description' => 'Audit singkat strategi digital marketing Anda saat ini dan identifikasi peluang peningkatan ROI. Cocok untuk UMKM yang ingin memaksimalkan presence online mereka.',
                'duration' => 30,
                'specialty' => 'Digital Marketing & E-commerce'
            ],
            [
                'title' => 'E-commerce Conversion Optimization',
                'description' => 'Analisis website/toko online Anda dan dapatkan rekomendasi praktis untuk meningkatkan conversion rate. Termasuk review user experience dan strategi peningkatan penjualan.',
                'duration' => 45,
                'specialty' => 'Digital Marketing & E-commerce'
            ],
            
            // Human Resources & Career Development
            [
                'title' => 'Career Path Consultation',
                'description' => 'Sesi konsultasi untuk membantu Anda merencanakan jalur karir yang tepat. Termasuk assessment potensi diri dan strategi pengembangan karir jangka panjang.',
                'duration' => 30,
                'specialty' => 'Human Resources & Career Development'
            ],
            [
                'title' => 'Resume & Interview Preparation',
                'description' => 'Dapatkan feedback profesional untuk CV Anda dan tips persiapan interview yang efektif. Sesi ini akan membantu meningkatkan peluang Anda mendapatkan pekerjaan impian.',
                'duration' => 45,
                'specialty' => 'Human Resources & Career Development'
            ],
            
            // Financial Planning & Investment
            [
                'title' => 'Personal Finance Health Check',
                'description' => 'Evaluasi kondisi keuangan personal Anda dan dapatkan roadmap sederhana untuk mencapai tujuan finansial. Cocok untuk yang baru memulai perencanaan keuangan.',
                'duration' => 30,
                'specialty' => 'Financial Planning & Investment'
            ],
            [
                'title' => 'Investment Strategy Consultation',
                'description' => 'Pelajari dasar-dasar investasi yang sesuai dengan profil risiko dan tujuan keuangan Anda. Termasuk review portofolio existing dan rekomendasi diversifikasi.',
                'duration' => 45,
                'specialty' => 'Financial Planning & Investment'
            ],
            
            // Information Technology & Digital Transformation
            [
                'title' => 'IT Infrastructure Assessment',
                'description' => 'Evaluasi sistem IT perusahaan Anda dan identifikasi area yang perlu improvement. Cocok untuk UKM yang ingin meningkatkan efisiensi melalui teknologi.',
                'duration' => 30,
                'specialty' => 'Information Technology & Digital Transformation'
            ],
            [
                'title' => 'Digital Transformation Roadmap',
                'description' => 'Konsultasi awal untuk merencanakan transformasi digital perusahaan Anda. Termasuk assessment current state dan rekomendasi langkah pertama digitalisasi.',
                'duration' => 45,
                'specialty' => 'Information Technology & Digital Transformation'
            ],
            
            // Operations Management & Supply Chain
            [
                'title' => 'Operations Efficiency Review',
                'description' => 'Analisis proses operasional bisnis Anda dan identifikasi peluang peningkatan efisiensi. Cocok untuk bisnis manufaktur atau retail yang ingin mengoptimalkan operasi.',
                'duration' => 30,
                'specialty' => 'Operations Management & Supply Chain'
            ],
            [
                'title' => 'Supply Chain Optimization',
                'description' => 'Review supply chain management perusahaan Anda dan dapatkan rekomendasi untuk mengurangi cost dan meningkatkan reliability. Termasuk vendor evaluation tips.',
                'duration' => 45,
                'specialty' => 'Operations Management & Supply Chain'
            ],
            
            // Corporate Law & Compliance
            [
                'title' => 'Business Legal Compliance Check',
                'description' => 'Konsultasi dasar mengenai aspek legal yang perlu diperhatikan dalam menjalankan bisnis. Cocok untuk startup atau UMKM yang ingin memastikan compliance.',
                'duration' => 30,
                'specialty' => 'Corporate Law & Compliance'
            ],
            [
                'title' => 'Contract Review Basics',
                'description' => 'Pelajari dasar-dasar review kontrak bisnis dan hal-hal penting yang perlu diperhatikan. Termasuk tips negosiasi kontrak yang menguntungkan.',
                'duration' => 45,
                'specialty' => 'Corporate Law & Compliance'
            ],
            
            // Manufacturing & Process Optimization
            [
                'title' => 'Manufacturing Process Assessment',
                'description' => 'Evaluasi efisiensi proses produksi Anda dan identifikasi bottleneck yang menghambat produktivitas. Cocok untuk perusahaan manufaktur skala kecil-menengah.',
                'duration' => 30,
                'specialty' => 'Manufacturing & Process Optimization'
            ],
            [
                'title' => 'Lean Manufacturing Introduction',
                'description' => 'Pengenalan konsep lean manufacturing dan bagaimana implementasinya dapat meningkatkan efisiensi produksi. Termasuk identifikasi waste dalam proses existing.',
                'duration' => 45,
                'specialty' => 'Manufacturing & Process Optimization'
            ],
        ];

        // Create free trials for each consultant
        foreach ($consultanIds as $consultanId) {
            // Get consultant specialty - DIPERBAIKI: consultants bukan consultans
            $consultant = DB::table('consultants')->where('id', $consultanId)->first();
            
            // Find matching templates for this consultant's specialty
            $matchingTemplates = array_filter($trialTemplates, function($template) use ($consultant) {
                return $template['specialty'] === $consultant->specialty;
            });
            
            // If no matching templates, use general business templates
            if (empty($matchingTemplates)) {
                $matchingTemplates = array_slice($trialTemplates, 0, 2);
            }
            
            // Create 1-2 free trials per consultant
            $numTrials = rand(1, 2);
            $selectedTemplates = array_rand($matchingTemplates, min($numTrials, count($matchingTemplates)));
            
            if (!is_array($selectedTemplates)) {
                $selectedTemplates = [$selectedTemplates];
            }
            
            foreach ($selectedTemplates as $templateIndex) {
                $template = array_values($matchingTemplates)[$templateIndex];
                
                // Random max participants (1-5)
                $maxParticipants = rand(1, 5);
                
                // Random used slots (0 to max_participants)
                $usedSlots = rand(0, $maxParticipants);
                
                // Random validity (1-6 months from now)
                $validUntil = Carbon::now()->addMonths(rand(1, 6));
                
                // Some trials might be inactive (10% chance)
                $isActive = rand(1, 100) > 10;
                
                $freeTrials[] = [
                    'consultan_id' => $consultanId,
                    'title' => $template['title'],
                    'description' => $template['description'],
                    'duration' => $template['duration'],
                    'max_participants' => $maxParticipants,
                    'used_slots' => $usedSlots,
                    'is_active' => $isActive,
                    'valid_until' => $validUntil,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert free trials in chunks
        $chunks = array_chunk($freeTrials, 10);
        foreach ($chunks as $chunk) {
            DB::table('free_trials')->insert($chunk);
        }

        $this->command->info('FreeTrialSeeder completed successfully!');
        $this->command->info('Created ' . count($freeTrials) . ' free trial records.');
        
        // Show statistics
        $stats = DB::table('free_trials')
            ->selectRaw('
                COUNT(*) as total,
                COUNT(CASE WHEN is_active = 1 THEN 1 END) as active,
                COUNT(CASE WHEN is_active = 0 THEN 1 END) as inactive,
                SUM(max_participants) as total_slots,
                SUM(used_slots) as used_slots,
                AVG(duration) as avg_duration
            ')
            ->first();
            
        $this->command->info("Statistics:");
        $this->command->info("- Total free trials: {$stats->total}");
        $this->command->info("- Active trials: {$stats->active}");
        $this->command->info("- Inactive trials: {$stats->inactive}");
        $this->command->info("- Total available slots: {$stats->total_slots}");
        $this->command->info("- Used slots: {$stats->used_slots}");
        $this->command->info("- Available slots: " . ($stats->total_slots - $stats->used_slots));
        $this->command->info("- Average duration: " . number_format($stats->avg_duration, 1) . " minutes");
        
        // Show some examples - DIPERBAIKI: consultants bukan consultans
        $examples = DB::table('free_trials')
            ->join('consultants', 'free_trials.consultan_id', '=', 'consultants.id')
            ->select('free_trials.title', 'consultants.name', 'consultants.specialty')
            ->limit(3)
            ->get();
            
        $this->command->info("\nExample free trials:");
        foreach ($examples as $example) {
            $this->command->info("- \"{$example->title}\" by {$example->name} ({$example->specialty})");
        }
    }
}