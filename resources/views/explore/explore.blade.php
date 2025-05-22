{{-- filepath: resources/views/explore/explore.blade.php --}}
@extends('layout.headfoot')

@section('content')
    <section class="bg-gradient-to-br from-purple-50 to-indigo-50 min-h-screen py-16">
        <div class="max-w-5xl mx-auto px-6 pt-32"> {{-- Tambahkan pt-32 agar isi turun ke bawah --}}
            {{-- Hero --}}
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-extrabold text-purple-800 mb-4">Jelajahi Dunia ITQOM 🚀</h1>
                <p class="text-lg text-gray-600 mb-6">Temukan pengalaman belajar, komunitas, dan peluang baru yang seru
                    untuk Gen Z!</p>
                <img src="{{ asset('image/explore.png') }}" alt="Explore ITQOM" class="mx-auto w-60 md:w-80 mb-4">
            </div>

            {{-- Kategori Eksplorasi --}}
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <a href="{{ route('course') }}"
                    class="bg-white shadow rounded-xl p-6 flex flex-col items-center hover:scale-105 transition group">
                    <span class="text-4xl mb-2 group-hover:animate-bounce">📚</span>
                    <span class="font-bold text-purple-700">Kursus</span>
                    <span class="text-xs text-gray-500 mt-1">Belajar skill baru & upgrade karir</span>
                </a>
                <a href="#"
                    class="bg-white shadow rounded-xl p-6 flex flex-col items-center hover:scale-105 transition group">
                    <span class="text-4xl mb-2 group-hover:animate-bounce">🎤</span>
                    <span class="font-bold text-purple-700">Event & Webinar</span>
                    <span class="text-xs text-gray-500 mt-1">Ikuti event seru & networking</span>
                </a>
                <a href="#"
                    class="bg-white shadow rounded-xl p-6 flex flex-col items-center hover:scale-105 transition group">
                    <span class="text-4xl mb-2 group-hover:animate-bounce">🤝</span>
                    <span class="font-bold text-purple-700">Komunitas</span>
                    <span class="text-xs text-gray-500 mt-1">Gabung & diskusi bareng Gen Z lain</span>
                </a>
            </div>

            {{-- Highlight Fitur --}}
            <div class="bg-white rounded-xl shadow p-8 mb-12">
                <h2 class="text-2xl font-bold text-purple-800 mb-4 text-center">Kenapa ITQOM?</h2>
                <div class="grid md:grid-cols-3 gap-6 text-center">
                    <div>
                        <span class="text-3xl">🧑‍💻</span>
                        <h3 class="font-semibold text-purple-700 mt-2">Belajar Interaktif</h3>
                        <p class="text-xs text-gray-500 mt-1">Video, kuis, dan project nyata.</p>
                    </div>
                    <div>
                        <span class="text-3xl">🎓</span>
                        <h3 class="font-semibold text-purple-700 mt-2">Sertifikat Resmi</h3>
                        <p class="text-xs text-gray-500 mt-1">Bisa dipakai untuk portofolio & karir.</p>
                    </div>
                    <div>
                        <span class="text-3xl">💬</span>
                        <h3 class="font-semibold text-purple-700 mt-2">Forum & Mentor</h3>
                        <p class="text-xs text-gray-500 mt-1">Tanya jawab langsung dengan mentor & teman.</p>
                    </div>
                </div>
            </div>

            {{-- Testimoni/Quote --}}
            <div class="text-center mb-8">
                <blockquote class="italic text-purple-700 text-lg">"Belajar di ITQOM seru banget, materinya relate sama
                    kebutuhan industri sekarang!"</blockquote>
                <div class="text-xs text-gray-500 mt-2">— Nabila, Mahasiswa & Content Creator</div>
            </div>

            {{-- Aksi Cepat --}}
            <div class="text-center">
                <a href="{{ route('register') }}"
                    class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold px-8 py-3 rounded-full shadow hover:scale-105 transition text-lg">Gabung
                    Sekarang</a>
            </div>
        </div>
    </section>
@endsection