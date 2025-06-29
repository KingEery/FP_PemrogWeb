@extends('layout.headfoot')

@section('content')
<section class="bg-gray-100 text-gray-800 font-sans">
    <div class="max-w-7xl mx-auto px-4 py-5">
        <!-- Breadcrumb -->
        <div class="mb-5">
            <nav class="text-sm text-gray-600 mb-4">
                <a href="{{ route('events.index') }}" class="hover:text-purple-600">Events</a>
                <span class="mx-2">></span>
                <span class="text-gray-800">{{ $event->description->title ?? $event->title }}</span>
            </nav>
        </div>

        <!-- Page Title -->
        <div class="mb-5">
            <h1 class="text-3xl md:text-4xl font-bold text-black-900 mb-5">
                {{ $event->description->title ?? $event->title }}
            </h1>
        </div>

        <div class="flex flex-col md:flex-row gap-6 mb-16">
            <!-- Main Content -->
            <div class="md:w-2/3">
                <!-- Event Image -->
                <div>
                    <img 
                        src="{{ 
                            $event->description && $event->description->image
                            ? (Str::startsWith($event->description->image, 'image/') 
                                    ? asset($event->description->image) 
                                    : asset('storage/' . $event->description->image))
                            : ($event->image 
                                ? asset('storage/' . $event->image) 
                                : asset('images/default-event.jpg')) 
                        }}" 
                        alt="Event Image" 
                        class="w-full h-96 rounded-xl object-cover">
> 
                    <div class="mt-4 p-3">
                        <span class="inline-block bg-[#564AB1] text-white px-7 py-3 rounded-full text-sm font-medium">
                            {{ ucfirst(str_replace('-', ' ', $event->category)) }}
                        </span>
                    </div>
                </div>

                @if($event->description)
                    <!-- Overview -->
                    @if($event->description->overview)
                    <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                        <h2 class="text-xl font-semibold text-purple-600 mb-4">Overview</h2>
                        <p class="mb-3">{{ $event->description->overview }}</p>
                    </div>
                    @endif

                    <!-- What You'll Learn -->
                    @if(!empty($event->description->what_youll_learn))
                    <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                        <h2 class="text-xl font-semibold text-purple-600 mb-4">What you'll learn</h2>
                        <ul class="list-disc pl-5">
                            @foreach ($event->description->what_youll_learn as $item)
                                <li class="mb-2">{{ is_array($item) ? $item['item'] ?? $item['term'] ?? $item['date'] ?? $item : $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Terms and Conditions -->
                    @if(!empty($event->description->terms_conditions))
                    <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                        <h2 class="text-xl font-semibold text-purple-600 mb-4">Terms & Conditions</h2>
                        <ul class="list-disc pl-5">
                            @foreach ($event->description->terms_conditions as $term)
                                <li class="mb-2">{{ is_array($term) ? $term['term'] ?? $term['item'] ?? $term['date'] ?? $term : $term }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                @endif
            </div>
            
            <!-- Sidebar Information -->
            <div class="md:w-1/3">
                <!-- Price and Registration -->
                <div class="bg-white rounded-lg p-5 border border-gray-200">
                    <h2 class="text-2xl font-bold text-black-900 mb-1">
                        Rp {{ number_format($event->description->final_price ?? $event->price ?? 0) }}
                    </h2>
                    @if($event->description && $event->description->price_original && $event->description->price_discounted)
                        <p class="text-gray-500 line-through text-base mb-4">
                            Rp {{ number_format($event->description->price_original) }}
                        </p>
                    @endif
                    <a href='/payment' class="block bg-[#564AB1] text-white text-center py-3 px-4 rounded-lg font-bold w-full hover:bg-[#463C8F] transition">
                        Daftar Event
                    </a>
                </div>

                <!-- Speaker -->
                @if($event->description && ($event->description->speaker_name || $event->description->speaker_title))
                <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-black-900 m-0">
                                {{ $event->description->speaker_name ?? 'Speaker Name' }}
                            </h3>
                            <p class="text-gray-500 text-sm m-0">
                                {{ $event->description->speaker_title ?? 'Speaker Title' }}
                            </p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Event Information -->
                <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                    <h3 class="text-xl font-semibold text-[#564AB1] mb-4">Event Information</h3>
                    
                    <!-- Date -->
                    <div class="ps-6 mb-4">
                        <h4 class="text-base font-medium text-[#564AB1] mb-2">Tanggal</h4>
                        @if(!empty($event->description->dates))
                            @foreach ($event->description->dates as $date)
                                @php
                                    $dateValue = is_array($date) ? ($date['date'] ?? reset($date)) : $date;
                                @endphp
                                <p class="text-gray-500">{{ \Carbon\Carbon::parse($dateValue)->format('d M Y') }}</p>
                            @endforeach
                        @else
                            <p class="text-gray-500">{{ $event->formatted_date }}</p>
                        @endif
                    </div>

                    <!-- Time -->
                    @if($event->description && $event->description->time)
                    <div class="ps-6 mb-4">
                        <h4 class="text-base font-medium text-[#564AB1] mb-2">Waktu</h4>
                        <p class="text-gray-500">{{ $event->description->time }}</p>
                    </div>
                    @endif

                    <!-- Location -->
                    <div class="ps-6 mb-4">
                        <h4 class="text-base font-medium text-[#564AB1] mb-2">Lokasi</h4>
                        <p class="text-gray-500">{{ $event->description->location ?? $event->location }}</p>
                    </div>
                </div>

                <!-- Event Includes -->
                @if(!empty($event->description->includes))
                <div class="bg-white rounded-lg p-5 border border-gray-200 mt-5">
                    <h3 class="text-xl font-semibold text-[#564AB1] mb-4">This Event Includes</h3>
                    <ul class="list-disc pl-5">
                        @foreach ($event->description->includes as $include)
                            <li class="mb-2">{{ is_array($include) ? $include['item'] ?? reset($include) : $include }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection