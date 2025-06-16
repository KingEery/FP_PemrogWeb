@extends('layout.headfoot')

@section('content')
    <section class="bg-gray-50 min-h-screen text-gray-800 font-sans">
        <div class="max-w-6xl mx-auto px-6 pt-24">

            <div class="mb-10 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-extrabold text-purple-800 flex items-center gap-2">
                        🚀 Dashboard Kamu <span class="text-lg bg-yellow-200 text-yellow-800 px-2 py-0.5 rounded-full">Gen
                            Z</span>
                    </h1>
                    <p class="text-gray-600 mt-2">
                        Halo, <span class="font-semibold text-purple-700">{{ Auth::user()->name ?? 'User' }}</span>!
                        <span class="ml-1">👋</span>
                        Siap upgrade skill hari ini? Yuk cek progres dan tantangan barumu!
                    </p>
                </div>

                {{-- User dropdown moved here --}}
                <div x-data="{ open: false, isScrolled: false }"
                    @scroll.window="isScrolled = window.pageYOffset > 100; if(isScrolled) open = false"
                    class="relative">
                    <button @click="open = !open"
                        class="flex items-center bg-white rounded-full px-4 py-2 shadow-md hover:shadow-lg transition group focus:outline-none"
                        :class="{ 'opacity-0 pointer-events-none': isScrolled, 'opacity-100': !isScrolled }">
                        <img src="{{ asset('image/hajisodikin.jpg') }}" alt="Avatar"
                            class="w-10 h-10 rounded-full border-2 border-purple-700 mr-2 animate-float">
                        <span class="font-semibold text-purple-800 mr-1">{{ Auth::user()->name ?? 'User' }}</span>
                        <svg class="w-4 h-4 text-purple-700 group-hover:rotate-180 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2"
                        @click.away="open = false"
                        class="absolute right-0 mt-2 w-64 bg-white rounded-2xl shadow-xl py-6 z-50 border">
                        <div class="flex flex-col items-center mb-4">
                            <img src="{{ asset('image/hajisodikin.jpg') }}" alt="Avatar"
                                class="w-14 h-14 rounded-full border-2 border-purple-700 mb-2">
                            <span class="font-bold text-gray-800">{{ Auth::user()->name ?? 'User' }}</span>
                        </div>
                        <hr class="my-2">
                        <ul class="space-y-1 px-6 text-gray-700 text-sm">
                            <li>
                                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 py-2 hover:text-purple-700">
                                    <span>🏠</span> My Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile') }}" class="flex items-center gap-2 py-2 hover:text-purple-700">
                                    <span>🧑‍💼</span> Profile Saya
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('password.change') }}" class="flex items-center gap-2 py-2 hover:text-purple-700">
                                    <span>🔑</span> Ganti Password
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reward') }}" class="flex items-center gap-2 py-2 hover:text-purple-700">
                                    <span>🎁</span> Reward Saya
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/6281227026268" target="_blank" class="flex items-center gap-2 py-2 hover:text-purple-700">
                                    <span>📞</span> Hubungi Kami
                                </a>
                            </li>
                        </ul>
                        <hr class="my-2">
                        <a href="{{ route('logout') }}"
                            class="block text-center text-red-600 font-bold py-2 hover:underline text-sm">Logout</a>
                    </div>
                </div>
            </div>

            {{-- Ringkasan Informasi --}}
            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-purple-700 flex items-center gap-2">🔥 Program Aktif</h3>
                    <p class="text-2xl font-bold text-purple-800 mt-2">Full Stack Web Development</p>
                    <p class="text-sm text-gray-500 mt-1">Dimulai: 1 Mei 2025</p>
                    <span class="inline-block mt-2 bg-green-100 text-green-700 text-xs px-2 py-0.5 rounded-full">On
                        Fire!</span>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-purple-700 flex items-center gap-2">📈 Progres Belajar</h3>
                    <div class="w-full bg-gray-200 h-4 rounded-full mt-2 relative overflow-hidden">
                        <div id="progressBar"
                            class="bg-gradient-to-r from-purple-500 to-indigo-500 h-4 rounded-full transition-all duration-700"
                            style="width: 45%"></div>
                        <span id="progressPercent"
                            class="absolute right-3 top-0 text-xs font-bold text-purple-700 h-4 flex items-center">45%</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-1"><span id="progressText">9 dari 20 modul selesai</span> <span
                            class="ml-1">🎯</span></p>
                    <button onclick="increaseProgress()"
                        class="mt-3 px-4 py-2 bg-purple-600 text-white rounded-lg font-bold hover:bg-purple-700 transition">Tambah
                        Progress 🚀</button>
                    {{-- <a href="#" class="inline-block mt-2 text-purple-700 hover:underline text-sm font-bold">Lanjutkan
                        Belajar 🚀</a> --}}
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-purple-700 flex items-center gap-2">⏰ Sesi Selanjutnya</h3>
                    <p class="text-base mt-2 font-bold">Senin, 19 Mei 2025 - 19:00 WIB</p>
                    <p class="text-sm text-gray-500">Bareng: <span class="font-semibold text-indigo-700">Unzurna Raja
                            Mid</span></p>
                    <span class="inline-block mt-2 bg-blue-100 text-blue-700 text-xs px-2 py-0.5 rounded-full">Jangan
                        Telat!</span>
                </div>
            </div>

            <div class="bg-gradient-to-r from-indigo-100 to-purple-100 rounded-lg p-4 text-center mb-10">
                <span class="text-purple-800 font-bold">👨‍💻 12.000+</span> Gen Z sudah belajar bareng Dunia Coding!
                <span class="ml-2 text-green-600 font-semibold">#NoMoreSkip</span>
            </div>

            {{-- Aksi Cepat --}}
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white shadow rounded-lg p-6 flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-600">Bab 4: Dasar JavaScript</p>
                    </div>
                    <a href="#"
                        class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold px-4 py-2 rounded-lg hover:scale-105 transition">Mulai</a>
                </div>

                <div class="bg-white shadow rounded-lg p-6 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold text-purple-800 flex items-center gap-2">🎓 Lihat Sertifikat</h3>
                        <p class="text-sm text-gray-600">Sertifikat kompetensi siap diunduh.</p>
                    </div>
                    <a href="{{ route('certificate') }}"
                        class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold px-4 py-2 rounded-lg hover:scale-105 transition">Lihat</a>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <a href="{{ route('courses') }}"
                    class="bg-white shadow rounded-lg p-6 flex flex-col items-center hover:scale-105 transition group">
                    <span class="text-3xl mb-2 group-hover:animate-bounce">📚</span>
                    <span class="font-bold text-purple-700">Kursus</span>
                    <span class="text-xs text-gray-500 mt-1">Lihat semua kelas & promo terbaru</span>
                </a>
                <a href="{{ route('tanyamentor') }}"
                    class="bg-white shadow rounded-lg p-6 flex flex-col items-center hover:scale-105 transition group">
                    <span class="text-3xl mb-2 group-hover:animate-bounce">💬</span>
                    <span class="font-bold text-purple-700">Tanya Mentor</span>
                    <span class="text-xs text-gray-500 mt-1">Diskusi & Tanya jawab</span>
                </a>
                <a href="{{ route('reward') }}"
                    class="bg-white shadow rounded-lg p-6 flex flex-col items-center hover:scale-105 transition group">
                    <span class="text-3xl mb-2 group-hover:animate-bounce">🎁</span>
                    <span class="font-bold text-purple-700">Ambil Reward</span>
                    <span class="text-xs text-gray-500 mt-1">Cek hadiah & voucher</span>
                </a>
            </div>

            <div class="bg-white shadow rounded-lg p-6 flex items-center gap-4 mb-10">
                <div>
                    <div class="text-xs text-gray-500 mb-1">Level Kamu</div>
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-purple-700 text-lg">Level 3</span>
                        <div class="w-40 bg-gray-200 h-3 rounded-full">
                            <div class="bg-gradient-to-r from-purple-500 to-indigo-500 h-3 rounded-full" style="width: 60%">
                            </div>
                        </div>
                        <span class="text-xs text-gray-500">60% ke Level 4</span>
                    </div>
                </div>
                <span class="ml-auto bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full text-xs font-bold">XP:
                    1200</span>
            </div>

            {{-- Info Tambahan --}}
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-bold text-purple-800 mb-4 flex items-center gap-2">🔔 Notifikasi Terbaru</h2>
                <ul class="list-disc pl-6 text-sm text-gray-700 space-y-2">
                    <li>
                        <span class="inline-block bg-green-100 text-green-700 px-2 py-0.5 rounded mr-2">Baru</span>
                        🎉 Congrats! Kamu sudah selesaikan 3 modul awal. #NoMoreSkip
                    </li>
                    <li>
                        <span class="inline-block bg-blue-100 text-blue-700 px-2 py-0.5 rounded mr-2">Info</span>
                        📅 Jadwal sesi mentoring update, siap-siap join bareng bestie!
                    </li>
                    <li>
                        <span class="inline-block bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded mr-2">Promo</span>
                        🤑 Promo alumni: diskon 20% buat next level, buruan cek!
                    </li>
                </ul>
                <a href="#" class="block text-right text-purple-700 hover:underline mt-2 text-sm font-bold">Lihat Semua
                    Notifikasi</a>
            </div>

            <div class="bg-white shadow rounded-lg p-6 mt-8">
                <h3 class="text-lg font-bold text-purple-800 mb-2 flex items-center gap-2">🏆 Leaderboard Mingguan</h3>
                <ol class="list-decimal pl-6 text-gray-700 text-sm space-y-1">
                    <li><span class="font-bold text-purple-700">Kamu</span> - 1200 XP <span
                            class="ml-2 bg-green-200 text-green-800 px-2 py-0.5 rounded-full text-xs">TOP 1</span></li>
                    <li>Bregas - 1100 XP</li>
                    <li>Yafa - 950 XP</li>
                </ol>
            </div>


            <style>
                .animate-float {
                    animation: float 6s ease-in-out infinite;
                }

                @keyframes float {

                    0%,
                    100% {
                        transform: translateY(0px);
                    }

                    50% {
                        transform: translateY(-12px);
                    }
                }

                .transition {
                    transition-property: all;
                    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                    transition-duration: 300ms;
                }

                .opacity-0 {
                    opacity: 0;
                }

                .opacity-100 {
                    opacity: 1;
                }

                .pointer-events-none {
                    pointer-events: none;
                }
            </style>

            <script>
                let progress = 45; // persen
                let modulSelesai = 9;
                const totalModul = 20;

                function increaseProgress() {
                    if (progress < 100) {
                        modulSelesai++;
                        progress = Math.round((modulSelesai / totalModul) * 100);
                        if (progress > 100) progress = 100;
                        document.getElementById('progressBar').style.width = progress + '%';
                        document.getElementById('progressPercent').textContent = progress + '%';
                        document.getElementById('progressText').textContent = modulSelesai + ' dari ' + totalModul + ' modul selesai';
                    }
                }
            </script>

            {{-- filepath: c:\~Amikom~\Semester 4\PemrogWeb\resources\views\user\dashboard.blade.php --}}
            {{-- Turunkan posisi user dropdown agar tidak ketutupan header --}}
            <!-- Pastikan Alpine.js sudah ada -->
            <script src="//unpkg.com/alpinejs" defer></script>
@endsection