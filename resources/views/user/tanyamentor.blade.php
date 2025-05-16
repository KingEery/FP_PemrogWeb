{{-- filepath: resources/views/user/tanyamentor.blade.php --}}
@extends('layout.headfoot')

@section('content')
    <section class="bg-gradient-to-br from-purple-50 to-indigo-50 min-h-screen py-16">
        <div class="max-w-3xl mx-auto px-6 pt-24">
            <div class="bg-white shadow rounded-xl p-8 mb-12">
                <h2 class="text-3xl font-extrabold text-purple-800 mb-4 flex items-center gap-2">
                    💬 Tanya Mentor
                    <span class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full ml-2">Diskusi & Tanya Jawab</span>
                </h2>
                <p class="text-gray-600 mb-6">Punya pertanyaan soal materi, tugas, atau karir IT? Yuk, tanya mentor dan
                    diskusi bareng teman-teman Gen Z lainnya. Jawaban cepat, no judgement!</p>
                <div class="mb-6 text-center">
                    <button onclick="alert('Fitur form tanya coming soon!')"
                        class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold px-6 py-2 rounded-lg shadow hover:scale-105 transition">Tanya
                        Sekarang 🚀</button>
                </div>
                <div>
                    <h3 class="font-bold text-purple-700 mb-3">Pertanyaan Terbaru</h3>
                    <ul class="space-y-4">
                        <li class="p-4 bg-purple-50 rounded-lg flex flex-col md:flex-row md:items-center justify-between">
                            <div>
                                <span class="font-semibold text-gray-800">Bagaimana cara deploy website ke Vercel?</span>
                                <div class="text-xs text-gray-500 mt-1">oleh <span
                                        class="font-bold text-purple-700">Rizky</span> • 2 jam lalu</div>
                            </div>
                            <span
                                class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full mt-2 md:mt-0">Dijawab</span>
                        </li>
                        <li class="p-4 bg-purple-50 rounded-lg flex flex-col md:flex-row md:items-center justify-between">
                            <div>
                                <span class="font-semibold text-gray-800">Tips biar nggak bosen belajar coding?</span>
                                <div class="text-xs text-gray-500 mt-1">oleh <span
                                        class="font-bold text-purple-700">Nabila</span> • 5 jam lalu</div>
                            </div>
                            <span
                                class="bg-yellow-100 text-yellow-700 text-xs px-3 py-1 rounded-full mt-2 md:mt-0">Pending</span>
                        </li>
                        <li class="p-4 bg-purple-50 rounded-lg flex flex-col md:flex-row md:items-center justify-between">
                            <div>
                                <span class="font-semibold text-gray-800">Apa bedanya UI & UX?</span>
                                <div class="text-xs text-gray-500 mt-1">oleh <span
                                        class="font-bold text-purple-700">Bregas</span> • 1 hari lalu</div>
                            </div>
                            <span
                                class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full mt-2 md:mt-0">Dijawab</span>
                        </li>
                    </ul>
                </div>
                <div class="text-center mt-8">
                    <p class="text-sm text-gray-600 mb-2">Diskusi seru, mentor ramah, dan komunitas Gen Z siap bantu kamu! ✨
                    </p>
                    <a href="#"
                        class="inline-block bg-blue-500 text-white font-bold px-6 py-2 rounded-full shadow hover:scale-105 transition">Lihat
                        Semua Diskusi</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-8 animate-bounce">
            <a href="{{ route('dashboard') }}"
                class="group inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-purple-600 to-purple-800 text-white font-medium rounded-full hover:from-purple-700 hover:to-purple-900 transition-all shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:-translate-x-1 transition-transform"
                    viewBox="0 0 20 20" fill="currentColor">
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