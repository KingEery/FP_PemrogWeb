@extends('layout.headfoot')

@section('content')
    <div class="container mx-auto px-4 py-20 text-center max-w-3xl">
        <p class="text-sm uppercase text-purple-360 tracking-widest font-semibold">Learning Ecosystem</p>
        <h1 class="text-4xl md:text-5xl font-bold leading-tight mt-2 mb-6 text-gray-800">
            Buka Potensimu Bersama Kursus Interaktif ITQOM
        </h1>
        <p class="text-lg text-gray-600 mb-8 leading-relaxed">
            Temukan <span class="text-purple-800 font-semibold">kursus interaktif</span> yang dirancang untuk membangun
            keahlian praktismu—mulai dari <span class="text-purple-800 font-semibold">pemula</span> hingga <span
                class="text-purple-800 font-semibold">tingkat lanjutan</span>. Dipandu oleh mentor profesional dan materi
            yang selalu diperbarui, setiap kursus memberi pengalaman belajar yang <span
                class="text-purple-800 font-semibold">fleksibel</span>, <span
                class="text-purple-800 font-semibold">terstruktur</span>, dan <span
                class="text-purple-800 font-semibold">relevan</span> dengan dunia kerja saat ini.
        </p>
        <div class="flex justify-center gap-4">
            <a href="/register"
                class="bg-purple-800 text-white font-semibold py-3 px-6 rounded-lg hover:bg-purple-900 transition duration-300">
                Mulai Belajar Sekarang
            </a>
            <a href="/explore"
                class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 text-white font-semibold py-3 px-6 rounded-lg hover:opacity-90 transition duration-300 shadow-lg">
                Jelajahi Dunia ITQOM 🚀
            </a>
        </div>
    </div>

    <div class="flex flex-col md:flex-row items-center gap-8 mt-10">
        <!-- Bagian Kiri: Poin-Poin -->
        <div class="w-full md:w-1/2 flex justify-center">
            <div class="grid grid-cols-1 gap-6 text-gray-800 mx-auto">
                <div class="flex items-start group">
                    <div
                        class="bg-purple-800 text-white p-4 rounded-full shadow-lg group-hover:bg-purple-600 transition duration-300">
                        <i class="fas fa-laptop-code text-2xl"></i>
                    </div>
                    <p class="text-lg ml-4 group-hover:text-purple-800 transition duration-300">Beragam kursus untuk semua
                        level</p>
                </div>
                <div class="flex items-start group">
                    <div
                        class="bg-purple-800 text-white p-4 rounded-full shadow-lg group-hover:bg-purple-600 transition duration-300">
                        <i class="fas fa-user-tie text-2xl"></i>
                    </div>
                    <p class="text-lg ml-4 group-hover:text-purple-800 transition duration-300">E-Sertifikat Bergengsi</p>
                </div>
                <div class="flex items-start group">
                    <div
                        class="bg-purple-800 text-white p-4 rounded-full shadow-lg group-hover:bg-purple-600 transition duration-300">
                        <i class="fas fa-chalkboard-teacher text-2xl"></i>
                    </div>
                    <p class="text-lg ml-4 group-hover:text-purple-800 transition duration-300">Kursus interaktif dan
                        praktis</p>
                </div>
                <div class="flex items-start group">
                    <div
                        class="bg-purple-800 text-white p-4 rounded-full shadow-lg group-hover:bg-purple-600 transition duration-300">
                        <i class="fas fa-clock text-2xl"></i>
                    </div>
                    <p class="text-lg ml-4 group-hover:text-purple-800 transition duration-300">Belajar kapan saja, di mana
                        saja</p>
                </div>
            </div>
        </div>

        <!-- Bagian Kanan: Gambar -->
        <div class="w-full md:w-1/2 flex justify-center">
            <img src="{{ asset('image/learning-illustration.png') }}" alt="Learning Illustration"
                class="w-3/4 md:w-2/3 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
        </div>
    </div>

    <div class="flex justify-center gap-8 mt-10">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center hover:scale-105 transition-transform duration-300">
            <span class="text-3xl font-bold text-purple-800">10K+</span>
            <p class="text-gray-600">Siswa Aktif</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center hover:scale-105 transition-transform duration-300">
            <span class="text-3xl font-bold text-purple-800">500+</span>
            <p class="text-gray-600">Video Tutorial</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center hover:scale-105 transition-transform duration-300">
            <span class="text-3xl font-bold text-purple-800">95%</span>
            <p class="text-gray-600">Success Rate</p>
        </div>
    </div>

    <section class="bg-gray-100 py-10 mt-10">
        <h2 class="text-2xl font-bold text-center mb-6">💫 Apa Kata Mereka?</h2>
        <div class="flex gap-6 justify-center">
            <!-- Testimonial 1 -->
            <div
                class="bg-white shadow-lg rounded-lg p-6 max-w-sm relative transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div
                    class="absolute -top-4 -right-4 bg-purple-800 text-white w-12 h-12 rounded-full flex items-center justify-center transform rotate-12">
                    <span class="text-xl">🌟</span>
                </div>
                <div class="mb-4">
                    <span class="text-purple-800 text-xl">⭐⭐⭐⭐⭐</span>
                </div>
                <p class="text-gray-700 italic relative">
                    <span class="text-4xl text-purple-300 absolute -top-4 -left-2">"</span>
                    Kursus ini sangat membantu saya memahami dasar-dasar pemrograman.
                    <span class="text-4xl text-purple-300 absolute -bottom-8 -right-2">"</span>
                </p>
                <div class="mt-8 flex items-center justify-end gap-3">
                    <div class="w-10 h-10 rounded-full overflow-hidden">
                        <img src="{{ asset('image/hajisodikin.jpg') }}" alt="hajisodikin"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-purple-800">Sugiran</p>
                        <p class="text-sm text-gray-600">Web Developer 👨‍💻</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div
                class="bg-white shadow-lg rounded-lg p-6 max-w-sm relative transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div
                    class="absolute -top-4 -right-4 bg-pink-500 text-white w-12 h-12 rounded-full flex items-center justify-center transform -rotate-12">
                    <span class="text-xl">💼</span>
                </div>
                <div class="mb-4">
                    <span class="text-purple-800 text-xl">⭐⭐⭐⭐⭐</span>
                </div>
                <p class="text-gray-700 italic relative">
                    <span class="text-4xl text-purple-300 absolute -top-4 -left-2">"</span>
                    Materinya sangat relevan dengan kebutuhan industri. Saya berhasil mendapatkan pekerjaan!
                    <span class="text-4xl text-purple-300 absolute -bottom-8 -right-2">"</span>
                </p>
                <div class="mt-8 flex items-center justify-end gap-3">
                    <div class="w-10 h-10 rounded-full overflow-hidden">
                        <img src="{{ asset('image/kaana.jpg') }}" alt="Kaana" class="w-full h-full object-cover">
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-pink-500">Kaana</p>
                        <p class="text-sm text-gray-600">Fresh Graduate 🎓</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div
                class="bg-white shadow-lg rounded-lg p-6 max-w-sm relative transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div
                    class="absolute -top-4 -right-4 bg-red-500 text-white w-12 h-12 rounded-full flex items-center justify-center transform rotate-12">
                    <span class="text-xl">🎮</span>
                </div>
                <div class="mb-4">
                    <span class="text-purple-800 text-xl">⭐⭐⭐⭐⭐</span>
                </div>
                <p class="text-gray-700 italic relative">
                    <span class="text-4xl text-purple-300 absolute -top-4 -left-2">"</span>
                    Disini saya lebih interaktif dikarenakan selalu welcome dan tidak berucap no more biarpun defeat!
                    <span class="text-4xl text-purple-300 absolute -bottom-8 -right-2">"</span>
                </p>
                <div class="mt-8 flex items-center justify-end gap-3">
                    <div class="w-10 h-10 rounded-full overflow-hidden">
                        <img src="{{ asset('image/stredows.jpg') }}" alt="Stredows"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-red-500">Stredows</p>
                        <p class="text-sm text-gray-600">Game Developer 🎯</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="text-center mt-10">
        <a href="/register"
            class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 text-white font-bold py-4 px-8 rounded-lg hover:opacity-90 transition duration-300 shadow-lg">
            Yuk, Mulai Petualanganmu! 🚀
        </a>
    </div>

    <div class="flex justify-center mt-10">
        <div class="bg-gray-200 rounded-full h-4 w-3/4">
            <div class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 h-4 rounded-full" style="width: 95%;">
            </div>
        </div>
    </div>
    <p class="text-sm text-gray-600 text-center mt-2">95% dari pengguna kami berhasil meningkatkan keahlian mereka!</p>
@endsection