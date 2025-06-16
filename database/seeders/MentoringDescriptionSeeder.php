<?php

namespace Database\Seeders;

use App\Models\Mentoring;
use App\Models\MentoringDescription;
use Illuminate\Database\Seeder;

class MentoringDescriptionSeeder extends Seeder
{
    public function run()
    {

         MentoringDescription::create([
            'mentoring_id' => 1,
            'title' => 'Full Stack Web Developer – Raih Penghasilan dari Proyek Freelance!',
            'short_description' => 'Belajar coding dari nol hingga mahir dengan HTML, CSS, dan JavaScript.',
            'long_description' => 'Program Exclusive Mentoring dari Dunia Coding menawarkan mentoring one-to-one yang dirancang khusus untuk kamu yang kesulitan belajar di lingkungan formal atau mandiri.',
            'original_price' => 8000000,
            'discounted_price' => 135000,
            'image_path' => 'image/Mentoring-Mendaftar.avif',
            'target_audience' => [
                ['title' => 'Mahasiswa', 'description' => 'Mahasiswa dengan ilmu komputer yang ingin memperkuat keterampilan fundamental programming.'],
                ['title' => 'IT Professional', 'description' => 'Profesional yang ingin beralih ke pengembangan web.'],
                ['title' => 'Freelancer', 'description' => 'Freelancer pemula yang ingin membangun karir.']
            ],
            'about_program' => 'Program ini dirancang khusus untuk kamu yang ingin mempercepat perjalanan karimu:',
            'basic_materials' => [
                'HTML5 & Semantic Web',
                'CSS3 & Responsive Design',
                'JavaScript Fundamentals',
                'Version Control dengan Git'
            ],
            'intermediate_materials' => [
                'ReactJS Framework',
                'State Management',
                'API Integration',
                'UI/UX Best Practices'
            ],
            'advanced_materials' => [
                'Node.js & Express',
                'Database Design (SQL & NoSQL)',
                'Authentication & Authorization',
                'RESTful API Development'
            ],
            'benefits' => [
                'Bimbingan 1-on-1 dengan mentor berpengalaman',
                'Kurikulum yang disesuaikan dengan kebutuhan',
                'Proyek portofolio lengkap untuk melamar pekerjaan',
                'Fleksibilitas jadwal sesuai ketersediaan waktu'
            ],
            'max_participants' => 10,
            'slug' => 'full-stack-web-developer-detail',
            'is_active' => true,
            'duration_months' => 3

            
        ]);
        MentoringDescription::create([
            'mentoring_id' => 2,
            'title' => 'Mobile App Development with Flutter',
            'short_description' => 'Kuasai pembuatan aplikasi mobile dengan Flutter untuk iOS dan Android.',
            'long_description' => 'Program mentoring Flutter yang komprehensif untuk membangun aplikasi mobile cross-platform. Dari dasar hingga deployment ke App Store dan Google Play.',
            'original_price' => 7500000,
            'discounted_price' => 150000,
            'image_path' => 'images/flutter-mentoring.jpg',
            'target_audience' => [
                ['title' => 'Web Developer', 'description' => 'Web developer yang ingin ekspansi ke mobile development.'],
                ['title' => 'Fresh Graduate', 'description' => 'Lulusan baru yang ingin berkarir di mobile development.'],
                ['title' => 'Entrepreneur', 'description' => 'Yang ingin membuat aplikasi untuk bisnis sendiri.']
            ],
            'about_program' => 'Program Flutter terlengkap dengan pendekatan praktis dan project-based learning.',
            'basic_materials' => [
                'Dart Programming Language',
                'Flutter Fundamentals',
                'Widget System',
                'State Management Basics'
            ],
            'intermediate_materials' => [
                'Advanced State Management (Provider, Bloc)',
                'Navigation & Routing',
                'API Integration & HTTP',
                'Local Storage & Database'
            ],
            'advanced_materials' => [
                'Firebase Integration',
                'Push Notifications',
                'App Store Deployment',
                'Performance Optimization'
            ],
            'benefits' => [
                'Build 3+ real-world applications',
                'Deploy apps to both platforms',
                'Personal mentoring sessions',
                'Code review dan feedback',
                'Career guidance',
                'Certificate of completion'
            ],
            'max_participants' => 8,
            'slug' => 'flutter-mobile-development',
            'is_active' => true,
            'duration_months' => 4
        ]);
        MentoringDescription::create([
            'mentoring_id' => 3, 
            'title' => 'Program Data Science',
            'short_description' => 'Pelajari data science dari dasar hingga mahir dengan Python, Pandas, dan visualisasi data.',
            'long_description' => 'Mentoring intensif selama 4 bulan yang membahas seluruh fondasi data science. Mulai dari Python dasar, manipulasi data dengan Pandas dan Numpy, hingga visualisasi dan analisis data yang mendalam.',
            'original_price' => 9000000,
            'discounted_price' => 200000,
            'image_path' => 'image/Data-Science-Images.jpg',
            'target_audience' => [
                ['title' => 'Mahasiswa', 'description' => 'Mahasiswa yang ingin memperdalam ilmu data science untuk karir masa depan.'],
                ['title' => 'Career Switcher', 'description' => 'Profesional yang ingin beralih ke bidang data dan analitik.'],
                ['title' => 'Entrepreneur', 'description' => 'Pebisnis yang ingin memahami data untuk pengambilan keputusan.']
            ],
            'about_program' => 'Mentoring berbasis proyek yang dirancang untuk membentuk keterampilan analisis data, pemrograman Python, dan visualisasi yang relevan di dunia kerja.',
            'basic_materials' => [
                'Dasar Python untuk Data Science',
                'Struktur Data Python',
                'Pengenalan Jupyter Notebook',
                'Pandas & Numpy dasar'
            ],
            'intermediate_materials' => [
                'Manipulasi Data Lanjut dengan Pandas',
                'Data Cleaning dan Preprocessing',
                'Visualisasi dengan Matplotlib & Seaborn',
                'Studi Kasus Industri'
            ],
            'advanced_materials' => [
                'Machine Learning Dasar (scikit-learn)',
                'Model Evaluation & Validation',
                'Mini Project: Data Analysis',
                'Deploy Model ke Cloud (Streamlit/Gradio)'
            ],
            'benefits' => [
                'Akses materi seumur hidup',
                'Mentoring privat mingguan',
                'Studi kasus real-world',
                'Umpan balik langsung dari mentor',
                'Sertifikat penyelesaian',
                'Persiapan portfolio karir'
            ],
            'max_participants' => 10,
            'slug' => 'data-science',
            'is_active' => true,
            'duration_months' => 4
        ]);
    }
}