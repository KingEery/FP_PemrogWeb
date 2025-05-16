{{-- filepath: resources/views/user/reward.blade.php --}}
@extends('layout.headfoot')

@section('content')
    <section class="bg-gradient-to-br from-yellow-50 to-green-50 min-h-screen py-16">
        <div class="max-w-3xl mx-auto px-6 pt-24">
            <div class="bg-white shadow rounded-xl p-8 mb-12">
                <h2 class="text-3xl font-extrabold text-green-700 mb-4 flex items-center gap-2">
                    🎁 Ambil Reward
                    <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full ml-2">Cek Hadiah &
                        Voucher</span>
                </h2>
                <p class="text-gray-600 mb-6">Kumpulkan XP, selesaikan tantangan, dan tukarkan dengan hadiah seru atau
                    voucher spesial buat Gen Z! Jangan sampai kelewatan, reward terbatas!</p>
                <div>
                    <h3 class="font-bold text-green-700 mb-3">Reward & Voucher Terbaru</h3>
                    <ul class="space-y-4">
                        <li class="p-4 bg-green-50 rounded-lg flex flex-col md:flex-row md:items-center justify-between">
                            <div>
                                <span class="font-semibold text-gray-800">Voucher Belanja Tokopedia 50K</span>
                                <div class="text-xs text-gray-500 mt-1">Butuh: <span class="font-bold text-green-700">1000
                                        XP</span></div>
                            </div>
                            <button onclick="alert('Selamat! Voucher berhasil diklaim.')"
                                class="bg-green-600 text-white text-xs px-4 py-2 rounded-full font-bold hover:bg-green-700 transition mt-2 md:mt-0">Klaim
                                Sekarang</button>
                        </li>
                        <li class="p-4 bg-yellow-50 rounded-lg flex flex-col md:flex-row md:items-center justify-between">
                            <div>
                                <span class="font-semibold text-gray-800">Merchandise Eksklusif ITQOM</span>
                                <div class="text-xs text-gray-500 mt-1">Butuh: <span class="font-bold text-yellow-700">1500
                                        XP</span></div>
                            </div>
                            <span class="bg-yellow-200 text-yellow-700 text-xs px-3 py-1 rounded-full mt-2 md:mt-0">Segera
                                Hadir</span>
                        </li>
                        <li class="p-4 bg-purple-50 rounded-lg flex flex-col md:flex-row md:items-center justify-between">
                            <div>
                                <span class="font-semibold text-gray-800">Voucher Kelas Premium</span>
                                <div class="text-xs text-gray-500 mt-1">Butuh: <span class="font-bold text-purple-700">800
                                        XP</span></div>
                            </div>
                            <button onclick="alert('Voucher sudah pernah diambil!')"
                                class="bg-gray-400 text-white text-xs px-4 py-2 rounded-full font-bold cursor-not-allowed mt-2 md:mt-0"
                                disabled>Sudah Diambil</button>
                        </li>
                    </ul>
                </div>
                <div class="text-center mt-8">
                    <p class="text-sm text-gray-600 mb-2">Semakin aktif, semakin banyak reward yang bisa kamu klaim! 🚀</p>
                    <a href="#"
                        class="inline-block bg-green-500 text-white font-bold px-6 py-2 rounded-full shadow hover:scale-105 transition">Lihat
                        Semua Reward</a>
                </div>
            </div>
            <div class="text-center mt-8 animate-bounce">
                <a href="{{ route('dashboard') }}"
                    class="group inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-purple-600 to-purple-800 text-white font-medium rounded-full hover:from-purple-700 hover:to-purple-900 transition-all shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 mr-2 group-hover:-translate-x-1 transition-transform" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </section>
@endsection