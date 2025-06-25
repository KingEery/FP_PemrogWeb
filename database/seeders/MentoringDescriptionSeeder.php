<?php

namespace Database\Seeders;

use App\Models\MentoringDescription;
use Illuminate\Database\Seeder;

class MentoringDescriptionSeeder extends Seeder
{
    public function run()
    {
        MentoringDescription::create([
            'title' => 'Full Stack Web Developer – Raih Penghasilan dari Proyek Freelance!',
            'short_description' => 'Belajar coding dari nol hingga mahir dengan HTML, CSS, dan JavaScript.',
            'long_description' => 'Program Exclusive Mentoring dari Dunia Coding menawarkan mentoring one-to-one yang dirancang khusus untuk kamu yang kesulitan belajar di lingkungan formal atau mandiri.',
            'original_price' => 8000000,
            'discounted_price' => 135000,
            'image_path' => 'image/Mentoring-Mendaftar.avif',
            'target_audience' => [
                ['item' => 'Mahasiswa', 'description' => 'Mahasiswa dengan ilmu komputer yang ingin memperkuat keterampilan fundamental programming.'],
                ['item' => 'IT Professional', 'description' => 'Profesional yang ingin beralih ke pengembangan web.'],
                ['item' => 'Freelancer', 'description' => 'Freelancer pemula yang ingin membangun karir.']
            ],
            'about_program' => 'Program ini dirancang khusus untuk kamu yang ingin mempercepat perjalanan karimu:',
            'basic_materials' => [
                ['item' => 'HTML5 & Semantic Web'],
                ['item' => 'CSS3 & Responsive Design'],
                ['item' => 'JavaScript Fundamentals'],
                ['item' => 'Version Control dengan Git']
            ],
            'intermediate_materials' => [
                ['item' => 'ReactJS Framework'],
                ['item' => 'State Management'],
                ['item' => 'API Integration'],
                ['item' => 'UI/UX Best Practices']
            ],
            'advanced_materials' => [
                ['item' => 'Node.js & Express'],
                ['item' => 'Database Design (SQL & NoSQL)'],
                ['item' => 'Authentication & Authorization'],
                ['item' => 'RESTful API Development']
            ],
            'benefits' => [
                ['item' => 'Bimbingan 1-on-1 dengan mentor berpengalaman'],
                ['item' => 'Kurikulum yang disesuaikan dengan kebutuhan'],
                ['item' => 'Proyek portofolio lengkap untuk melamar pekerjaan'],
                ['item' => 'Fleksibilitas jadwal sesuai ketersediaan waktu']
            ],
            'max_participants' => 10,
            'slug' => 'full-stack-web-developer-detail',
            'is_active' => true,
            'duration_months' => 3
        ]);

        MentoringDescription::create([
            'title' => 'Mobile App Development with Flutter',
            'short_description' => 'Kuasai pembuatan aplikasi mobile dengan Flutter untuk iOS dan Android.',
            'long_description' => 'Program mentoring Flutter yang komprehensif untuk membangun aplikasi mobile cross-platform. Dari dasar hingga deployment ke App Store dan Google Play.',
            'original_price' => 7500000,
            'discounted_price' => 150000,
            'image_path' => 'image/mobile-app.webp',
            'target_audience' => [
                ['item' => 'Web Developer', 'description' => 'Web developer yang ingin ekspansi ke mobile development.'],
                ['item' => 'Fresh Graduate', 'description' => 'Lulusan baru yang ingin berkarir di mobile development.'],
                ['item' => 'Entrepreneur', 'description' => 'Yang ingin membuat aplikasi untuk bisnis sendiri.']
            ],
            'about_program' => 'Program Flutter terlengkap dengan pendekatan praktis dan project-based learning.',
            'basic_materials' => [
                ['item' => 'Dart Programming Language'],
                ['item' => 'Flutter Fundamentals'],
                ['item' => 'Widget System'],
                ['item' => 'State Management Basics']
            ],
            'intermediate_materials' => [
                ['item' => 'Advanced State Management (Provider, Bloc)'],
                ['item' => 'Navigation & Routing'],
                ['item' => 'API Integration & HTTP'],
                ['item' => 'Local Storage & Database']
            ],
            'advanced_materials' => [
                ['item' => 'Firebase Integration'],
                ['item' => 'Push Notifications'],
                ['item' => 'App Store Deployment'],
                ['item' => 'Performance Optimization']
            ],
            'benefits' => [
                ['item' => 'Build 3+ real-world applications'],
                ['item' => 'Deploy apps to both platforms'],
                ['item' => 'Personal mentoring sessions'],
                ['item' => 'Code review dan feedback'],
                ['item' => 'Career guidance'],
                ['item' => 'Certificate of completion']
            ],
            'max_participants' => 8,
            'slug' => 'flutter-mobile-development',
            'is_active' => true,
            'duration_months' => 4
        ]);

        MentoringDescription::create([
            'title' => 'Program Data Science',
            'short_description' => 'Pelajari data science dari dasar hingga mahir dengan Python, Pandas, dan visualisasi data.',
            'long_description' => 'Mentoring intensif selama 4 bulan yang membahas seluruh fondasi data science. Mulai dari Python dasar, manipulasi data dengan Pandas dan Numpy, hingga visualisasi dan analisis data yang mendalam.',
            'original_price' => 9000000,
            'discounted_price' => 200000,
            'image_path' => 'image/Data-Science-Images.webp',
            'target_audience' => [
                ['item' => 'Mahasiswa', 'description' => 'Mahasiswa yang ingin memperdalam ilmu data science untuk karir masa depan.'],
                ['item' => 'Career Switcher', 'description' => 'Profesional yang ingin beralih ke bidang data dan analitik.'],
                ['item' => 'Entrepreneur', 'description' => 'Pebisnis yang ingin memahami data untuk pengambilan keputusan.']
            ],
            'about_program' => 'Mentoring berbasis proyek yang dirancang untuk membentuk keterampilan analisis data, pemrograman Python, dan visualisasi yang relevan di dunia kerja.',
            'basic_materials' => [
                ['item' => 'Dasar Python untuk Data Science'],
                ['item' => 'Struktur Data Python'],
                ['item' => 'Pengenalan Jupyter Notebook'],
                ['item' => 'Pandas & Numpy dasar']
            ],
            'intermediate_materials' => [
                ['item' => 'Manipulasi Data Lanjut dengan Pandas'],
                ['item' => 'Data Cleaning dan Preprocessing'],
                ['item' => 'Visualisasi dengan Matplotlib & Seaborn'],
                ['item' => 'Studi Kasus Industri']
            ],
            'advanced_materials' => [
                ['item' => 'Machine Learning Dasar (scikit-learn)'],
                ['item' => 'Model Evaluation & Validation'],
                ['item' => 'Mini Project: Data Analysis'],
                ['item' => 'Deploy Model ke Cloud (Streamlit/Gradio)']
            ],
            'benefits' => [
                ['item' => 'Akses materi seumur hidup'],
                ['item' => 'Mentoring privat mingguan'],
                ['item' => 'Studi kasus real-world'],
                ['item' => 'Umpan balik langsung dari mentor'],
                ['item' => 'Sertifikat penyelesaian'],
                ['item' => 'Persiapan portfolio karir']
            ],
            'max_participants' => 10,
            'slug' => 'data-science',
            'is_active' => true,
            'duration_months' => 4
        ]);
    }
}