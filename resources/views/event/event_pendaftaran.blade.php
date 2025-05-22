
@extends('layout.headfoot')

@section('content')

    <section class="bg-gray-100 text-gray-800 font-sans">
        <div class="max-w-7xl mx-auto px-4 py-5">
            <div class="mb-5">
                <h1 class="text-3xl md:text-4xl font-bold text-black-900 mb-5">Acara & Konferensi Developer - Google for Developer</h1>
            </div>
            
            <div class="flex flex-col md:flex-row gap-6">
            
                <div class="md:w-2/3">
                    <div>
                        <img src="image/devfest.jpg" alt="DevFest Conference" class="w-full h-96 rounded-xl object-cover">
                        <div class="mt-4 p-3">
                             <span class="inline-block bg-[#564AB1] text-white px-7 py-3 rounded-full text-sm font-medium">Web Programming</span>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                        <h2 class="text-xl font-semibold text-purple-600 mb-4">Overview</h2>
                        <p class="mb-3">DevFest adalah konferensi komunitas teknologi yang diselenggarakan oleh Google Developer Groups (GDG) di seluruh dunia. Acara ini menawarkan kesempatan untuk mempelajari teknologi Google terbaru.</p>
                        <p>Bergabunglah dengan kami untuk sesi interaktif yang dipimpin oleh pakar industri, workshop hands-on, dan kesempatan networking.</p>
                    </div>
                    
                    <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                        <h2 class="text-xl font-semibold text-purple-600 mb-4">What you'll learn</h2>
                        <ul class="list-disc pl-5">
                            <li class="mb-2">Pemrograman web terkini dengan teknologi Google</li>
                            <li class="mb-2">Pengembangan aplikasi Android dengan Kotlin</li>
                            <li class="mb-2">Cloud computing dan teknologi Google Cloud Platform</li>
                            <li class="mb-2">Machine Learning dan TensorFlow</li>
                        </ul>
                    </div>
                    
                    <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                        <h2 class="text-xl font-semibold text-purple-600 mb-4">Term And Condition</h2>
                        <p class="mb-3">Dengan mendaftar pada acara ini, peserta menyetujui ketentuan berikut:</p>
                        <ul class="list-disc pl-5">
                            <li class="mb-2">Peserta wajib hadir minimal 15 menit sebelum acara dimulai</li>
                            <li class="mb-2">Sertifikat hanya diberikan kepada peserta yang mengikuti acara hingga selesai</li>
                            <li class="mb-2">Materi yang dibagikan tidak boleh diperjualbelikan</li>
                        </ul>
                    </div>
                </div>
                
                <div class="md:w-1/3">
                    <div class="bg-white rounded-lg p-5 border border-gray-200">
                        <h2 class="text-2xl font-bold text-black-900 mb-1">Free</h2>
                        <p class="text-gray-500 line-through text-base mb-4">Rp. 200.000</p>
                        <a href="#" class="block bg-[#564AB1] text-white text-center py-3 px-4 rounded-lg font-bold no-underline w-full">Daftar Event</a>
                    </div>
                    
                    <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mr-4">
                                <svg viewBox="0 0 24 24" width="24" height="24" class="text-gray-500" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="10" r="4"></circle>
                                    <path d="M12,14 C8,14 4,16 4,19 L4,20 L20,20 L20,19 C20,16 16,14 12,14 Z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-black-900 m-0">Yafa Nanda Putra</h3>
                                <p class="text-gray-500 text-sm m-0">Software Engineer</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                        <h3 class="text-xl font-semibold text-[#564AB1] mb-4">Event Information</h3>
                        
                        <div class="flex mb-4 ps-6">
                            <div>
                                <h4 class="text-base font-medium text-blue-900 m-0 mb-2">Tanggal</h4>
                                <p class="text-gray-500 m-0 mb-1">20 November 2025</p>
                                <p class="text-gray-500 m-0 mb-1">21 November 2025</p>
                                <p class="text-gray-500 m-0 mb-1">22 November 2025</p>
                            </div>
                        </div>
                        <div class="flex mb-4 ps-6">
                            <div>
                                <h4 class="text-base font-medium text-[#564AB1] m-0 mb-2">Waktu</h4>
                                <p class="text-gray-500 m-0 mb-1">12.20 WIB - 15.20 WIB</p>
                            </div>
                        </div>
                        
                        <div class="flex mb-4 ps-6">
                            <div>
                                <h4 class="text-base font-medium text-blue-900 m-0 mb-2">Lokasi</h4>
                                <p class="text-gray-500 m-0 mb-1">Google Meet</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                        <h3 class="text-xl font-semibold text-[#564AB1] mb-4">This Event Includes</h3>
                        
                        <div class="flex items-center mb-3 ps-6">
                            <div class="font-medium text-blue-900">Project File</div>
                        </div>
                        
                        <div class="flex items-center mb-3 ps-6">
                            <div class="font-medium text-blue-900">Sertifikat</div>
                        </div>
                        
                        <div class="flex items-center mb-3 ps-6">
                            <div class="font-medium text-blue-900">Slide Materi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
