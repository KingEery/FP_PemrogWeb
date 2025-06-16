@extends('layout.headfoot')


@section('content')
<section class="bg-gray-100 text-gray-800 font-sans">
    <div class="max-w-7xl mx-auto px-4 py-5">
        <div class="mb-5">
            <h1 class="text-3xl md:text-4xl font-bold text-black-900 mb-5">{{ $event->title }}</h1>
        </div>

        <div class="flex flex-col md:flex-row gap-6 mb-16">
            <!-- Bagian Konten Utama -->
            <div class="md:w-2/3">
                <!-- Gambar Event -->
                <div>
                    <img src="{{ asset($event->description->image ?? $event->image) }}" 
                        alt="Event Image" class="w-full h-96 rounded-xl object-cover">
                    <div class="mt-4 p-3">
                        <span class="inline-block bg-[#564AB1] text-white px-7 py-3 rounded-full text-sm font-medium">
                            {{ $event->description->category ?? $event->category }}
                        </span>
                    </div>
                </div>

                <!-- Overview -->
                <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                    <h2 class="text-xl font-semibold text-purple-600 mb-4">Overview</h2>
                    <p class="mb-3">{{ $event->description->overview ?? 'Deskripsi tidak tersedia' }}</p>
                </div>

                <!-- What You'll Learn -->
                <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                    <h2 class="text-xl font-semibold text-purple-600 mb-4">What you'll learn</h2>
                    <ul class="list-disc pl-5">
                        @foreach (json_decode($event->description->what_youll_learn ?? '[]', true) as $topic)
                            @if(!empty($topic))
                                <li class="mb-2">{{ $topic }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <!-- Terms and Conditions -->
                <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                    <h2 class="text-xl font-semibold text-purple-600 mb-4">Terms and Conditions</h2>
                    <ul class="list-disc pl-5">
                        @foreach  (json_decode($event->description->terms_conditions ?? '[]', true) as $term)
                            @if(!empty($term))
                                <li class="mb-2">{{ $term }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Sidebar Informasi -->
            <div class="md:w-1/3">
                <!-- Harga dan Pendaftaran -->
                <div class="bg-white rounded-lg p-5 border border-gray-200">
                    <h2 class="text-2xl font-bold text-black-900 mb-1">
                        {{ $event->description->price_discounted ?? 'Free' }}
                    </h2>
                    @if ($event->description->price_original ?? false)
                        <p class="text-gray-500 line-through text-base mb-4">{{ $event->description->price_original }}</p>
                    @endif
                    <a href="{{ route('event.show', $event->id) }}" 
                    class="block bg-[#564AB1] text-white text-center py-3 px-4 rounded-lg font-bold no-underline w-full hover:bg-[#463C8F] transition">
                        Daftar Event
                    </a>
                </div>

                <!-- Pembicara -->
                <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-black-900 m-0">{{ $event->description->speaker_name ?? 'Speaker Name' }}</h3>
                            <p class="text-gray-500 text-sm m-0">{{ $event->description->speaker_title ?? 'Speaker Title' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Event -->
                <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                    <h3 class="text-xl font-semibold text-[#564AB1] mb-4">Event Information</h3>
                    
                    <!-- Tanggal -->
                    <div class="ps-6 mb-4">
                        <h4 class="text-base font-medium text-blue-900 mb-2">Tanggal</h4>
                        @foreach (json_decode($event->description->dates ?? '[]', true) as $date)
                            <p class="text-gray-500">{{ $date }}</p>
                        @endforeach
                    </div>

                    <!-- Waktu -->
                    <div class="ps-6 mb-4">
                        <h4 class="text-base font-medium text-[#564AB1] mb-2">Waktu</h4>
                        <p class="text-gray-500">{{ $event->description->time ?? '00:00 - 00:00' }}</p>
                    </div>

                    <!-- Lokasi -->
                    <div class="ps-6 mb-4">
                        <h4 class="text-base font-medium text-blue-900 mb-2">Lokasi</h4>
                        <p class="text-gray-500">{{ $event->description->location ?? 'Online' }}</p>
                    </div>
                </div>

                <!-- Includes -->
                <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                    <h3 class="text-xl font-semibold text-[#564AB1] mb-4">This Event Includes</h3>
                    @foreach (json_decode($event->description->includes ?? '[]', true) as $include)
                        <div class="ps-6 mb-3 font-medium text-blue-900">{{ $include }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection