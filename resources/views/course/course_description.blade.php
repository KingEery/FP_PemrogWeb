@extends('layout.app')

@section('content')

    <div class="max-w-7xl mx-auto px-4 py-6 flex flex-col lg:flex-row gap-6">
        <!-- Left content -->
        <div class="flex-1 space-y-6">
            <!-- Tag -->
            <div>
                <span class="inline-block text-[#5c4ac7] text-[18px] font-semibold px-2 py-[2px] rounded">
                    Web Programming
                </span>
            </div>
            <!-- Overview box -->
            <section class="border border-[#e5e7eb] rounded-md p-4 text-[13px] text-[#1a1a1a] leading-[1.4]">
                <h3 class="text-[#3b3b98] font-semibold text-[15px] mb-2">
                    Overview
                </h3>
                <div class="text-[17px] leading-[1.4]">
                <p class="mb-2">
                    Laravel 12 hadir dengan berbagai fitur baru yang lebih efisien dan
                    powerful.
                    <strong>
                        Smart Blog Apps dengan Integrasi AI
                    </strong>
                    adalah aplikasi
                    blog modern yang memanfaatkan teknologi kecerdasan buatan untuk
                    meningkatkan pengalaman pengguna, membantu penulis menghasilkan
                    konten berkualitas, dan mengoptimalkan performa blog secara
                    keseluruhan.
                </p>
                <p class="mb-2">
                    Dunia Coding menghadirkan
                    <strong>
                        course eksklusif
                    </strong>
                    bagi kamu yang ingin menguasai
                    <strong>
                        Laravel 12 Mastery: Membuat Smart Blog Apps dengan Integrasi
                        AI
                    </strong>
                    . Dipandu oleh
                    <strong>
                        Dimas Bregas Full Stack Web Developer di ITQOM
                    </strong>
                    ,
                    course ini dirancang untuk membantu kamu membangun
                    <strong>
                        Smart Blog dengan Laravel 12
                    </strong>
                    .
                </p>
                <p class="mb-2">
                    Dalam course ini, kamu akan memulai dari dasar dengan
                    <em>
                        mempelajari
                    </em>
                    pengenalan, instalasi, dan konfigurasi Laravel
                    12, lalu melanjutkan ke penggunaan
                    <strong>
                        Faker &amp; Seeder
                    </strong>
                    untuk mengisi database secara
                    otomatis, sehingga proses pengelolaan data menjadi lebih efisien.
                    Tak hanya itu, kamu juga akan
                    <strong>
                        menguasai fitur CRUD (Create, Read, Update, Delete)
                    </strong>
                    untuk postingan blog, serta membangun sistem autentikasi yang aman
                    menggunakan Laravel Breeze dan middleware.
                </p>
                <p>
                    Yang membuat course ini semakin menarik adalah
                    <strong>
                        integrasi Gemini AI
                    </strong>
                    , yang memungkinkan blog kamu
                    memiliki fitur
                    <em>
                        smart content suggestions
                    </em>
                    untuk memberikan
                    rekomendasi konten secara otomatis. Di akhir pembelajaran, kamu akan
                    mampu
                    <strong>
                        mendesain halaman utama blog yang menarik, interaktif,
                        dan responsif.
                    </strong>
                </p>
                </div>
            </section>
        </div>

        <!-- Right sidebar -->
        <aside class="w-full max-w-xs space-y-4">
            <div class="border border-[#e5e7eb] rounded-md p-4 flex flex-col items-center gap-3">
                <img alt="Course promotional image with orange background and course content preview"
                    class="w-full rounded" height="150"
                    src=""
                    width="300" />
                <div class="w-full">
                    <p class="text-[15px] font-semibold text-[#1a1a1a]">
                        Rp 99.000
                    </p>
                    <p class="text-[13px] line-through text-[#9ca3af]">
                        Rp 200.000
                    </p>
                </div>
                <button
                    class="w-full bg-[#564AB1] text-white text-[13px] font-semibold py-2 rounded hover:bg-[#4a3db0] transition-colors">
                    Beli Course
                </button>
            </div>
            <div class="border border-[#e5e7eb] rounded-md p-4 flex items-center gap-3 text-[12px]">
                <img alt="" class="w-10 h-10 rounded-full object-cover" height="40"
                    src=""
                    width="40" />
                <div class="flex flex-col">
                    <span class="font-semibold text-[13px] text-[#1a1a1a]">
                        Bregas
                    </span>
                    <span class="text-[#6b7280]">
                        Software Engineer at ITQOM
                    </span>
                </div>
            </div>
            <div class="border border-[#e5e7eb] rounded-md p-4 text-[12px] text-[#1a1a1a]">
                <p class="font-semibold mb-3 text-[13px]">
                    This Course Include
                </p>
                <ul class="space-y-2">
                    <li class="flex items-center gap-2">
                        <i class="far fa-file-video text-[#5c4ac7] text-[14px]">
                        </i>
                        27
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="far fa-clock text-[#5c4ac7] text-[14px]">
                        </i>
                        20 Jam
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="far fa-folder text-[#5c4ac7] text-[14px]">
                        </i>
                        File Project
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="far fa-briefcase text-[#5c4ac7] text-[14px]">
                        </i>
                        Free Career Coacing
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="far fa-id-badge text-[#5c4ac7] text-[14px]">
                        </i>
                        Akses Selamanya
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="far fa-certificate text-[#5c4ac7] text-[14px]">
                        </i>
                        Sertifikat Kelulusan
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="far fa-comments text-[#5c4ac7] text-[14px]">
                        </i>
                        Group Diskusi
                    </li>
                </ul>
            </div>
        </aside>
    </div>
@endsection