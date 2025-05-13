@extends('layout.headfoot')

@section('content')


<section class="bg-gray-50 min-h-screen text-gray-800 font-sans">
  <div class="max-w-6xl mx-auto px-6 pt-24">

        <div class="mb-10">
            <h1 class="text-3xl font-bold text-purple-800">Dashboard Pengguna</h1>
            <p class="text-gray-600 mt-2">Selamat datang kembali, <span class="font-semibold text-purple-700"></span>! Berikut ringkasan aktivitas dan progresmu.</p>
        </div>

        {{-- Ringkasan Informasi --}}
        <div class="grid md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700">Program Aktif</h3>
                <p class="text-2xl font-bold text-purple-800 mt-2">Full Stack Web Development</p>
                <p class="text-sm text-gray-500 mt-1">Dimulai: 1 Mei 2025</p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700">Progres Belajar</h3>
                <div class="w-full bg-gray-200 h-4 rounded-full mt-2">
                    <div class="bg-purple-800 h-4 rounded-full" style="width: 45%"></div>
                </div>
                <p class="text-sm text-gray-600 mt-1">45% Selesai</p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700">Sesi Selanjutnya</h3>
                <p class="text-base mt-2">Senin, 19 Mei 2025 - 19:00 WIB</p>
                <p class="text-sm text-gray-500">Bersama: Mentor Unzurna Raja Mid</p>
            </div>
        </div>

        {{-- Aksi Cepat --}}
        <div class="grid md:grid-cols-2 gap-6 mb-10">
            <div class="bg-white shadow rounded-lg p-6 flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-bold text-purple-800">Lanjutkan Belajar</h3>
                    <p class="text-sm text-gray-600">Bab 4: Dasar JavaScript</p>
                </div>
                <a href="#" class="bg-purple-800 text-white font-bold px-4 py-2 rounded-lg hover:bg-purple-900 transition">Mulai</a>
            </div>

            <div class="bg-white shadow rounded-lg p-6 flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-bold text-purple-800">Lihat Sertifikat</h3>
                    <p class="text-sm text-gray-600">Tersedia setelah 100% penyelesaian</p>
                </div>
                <a href="#" class="bg-gray-300 text-gray-600 font-bold px-4 py-2 rounded-lg cursor-not-allowed">Belum Tersedia</a>
            </div>
        </div>

        {{-- Info Tambahan --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-bold text-purple-800 mb-4">Notifikasi Terbaru</h2>
            <ul class="list-disc pl-6 text-sm text-gray-700 space-y-2">
                <li>🎉 Selamat! Kamu telah menyelesaikan 3 modul awal.</li>
                <li>📅 Jadwal sesi mentoring berikutnya telah diperbarui.</li>
                <li>📢 Promo alumni: diskon 20% untuk program lanjutan!</li>
            </ul>
        </div>
    </div>
</section>

@endsection
