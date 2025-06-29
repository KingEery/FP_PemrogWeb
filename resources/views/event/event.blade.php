@extends('layout.headfoot')


@section('content')
  <section class="bg-primary-light text-white px-[5%] py-25 flex justify-between items-center flex-wrap gap-8">
    <div class="max-w-lg">
      <h1 class="text-4xl font-bold mb-5 leading-tight">Cari Bakatmu: Telusuri Event Menarik di Dunia Coding Hari Ini!</h1>
      <p class="mb-8 opacity-90 text-lg leading-relaxed">Temukan event online yang inspiratif dan interaktif! Mulai pelajari event menarik kami dan buka pintu potensimu.</p>
      <div class="flex gap-4">
        <a href="/register" class="px-7 py-3 rounded-md bg-white text-[#564AB1] font-medium transition-all duration-300 hover:bg-gray-100 hover:-translate-y-0.5">Get Started</a>
        <a href="/learnmore" class="px-7 py-3 rounded-md border-2 border-white text-white font-medium transition-all duration-300 hover:bg-white/10">Learn More</a>
      </div>
    </div>
    <div class="w-[630px] h-[400px] bg-[#7C72C3] rounded-xl overflow-hidden mx-auto shadow-lg flex flex-col justify-between pb-4">
      <dotlottie-player class="mx-auto"
            src="https://lottie.host/620f8f75-634f-4bd0-8fd2-4e8f11958ad4/4Vy6Sj6Hk0.lottie"
            background="transparent"
            speed="1"
            style="width: 360px; height: 360px"
            loop
            autoplay>
      </dotlottie-player>
    </div>
  </section>

  <section class="bg-white px-[5%] py-12 flex-1">
    <div class="flex flex-wrap md:flex-nowrap gap-8">
      <!-- Category Filter Sidebar -->
    

      <!-- Events Grid -->
      <div class="flex-1">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7" id="eventsGrid">
          @forelse ($events as $event)
            <a href="{{ route('event.show', $event->id) }}" class="block h-full">
              <div class="h-full flex flex-col bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg event-card" data-category="{{ $event->category }}">
                <!-- Event Image -->
                <img src="{{ $event->description && $event->description->image ? (Str::startsWith($event->description->image, 'image/') 
                              ? asset($event->description->image) : asset('storage/' . $event->description->image)) 
                              : ($event->image 
                                  ? asset('storage/' . $event->image) 
                                  : asset('image/default-event.jpg')) 
                        }}" 
                        alt="{{ $event->description ? $event->description->title : $event->title }}" 
                        class="w-full h-[150px] object-cover aspect-[4/3]"
                      >

                
                <!-- Event Content -->
                <div class="p-5 flex-1 flex flex-col">
                  <h3 class="text-xl font-semibold mb-2 text-gray-800 line-clamp-2">
                    {{ $event->description ? $event->description->title : $event->title }}
                  </h3>
                  
                  <p class="text-sm text-gray-600 mb-4">
                    {{ $event->formatted_date }} • {{ $event->location }}
                  </p>
                  
                  <!-- Category Badge -->
                  <div class="mb-3">
                    <span class="inline-block bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-xs font-medium">
                      {{ ucfirst(str_replace('-', ' ', $event->category)) }}
                    </span>
                  </div>
                  
                  <!-- Price -->
                  <div class="mt-auto">
                    <span class="text-purple-600 font-bold text-base">
                      {{ $event->formatted_price }}
                    </span>
                    @if($event->description && $event->description->price_original && $event->description->price_discounted)
                      <span class="text-gray-500 line-through text-sm ml-2">
                        Rp {{ number_format($event->description->price_original) }}
                      </span>
                    @endif
                  </div>
                </div>
              </div>
            </a>
          @empty
            <div class="col-span-full text-center py-12">
              <div class="text-gray-500 text-lg mb-4">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-6 0v8a1 1 0 01-1 1H5a1 1 0 01-1-1v-8m0 0h4m10 0v8a1 1 0 01-1 1h-4a1 1 0 01-1-1v-8m0 0h4" />
                </svg>
                <p>Belum ada event yang tersedia</p>
                <p class="text-sm">Silakan coba lagi nanti atau hubungi tim kami</p>
              </div>
            </div>
          @endforelse
        </div>
      </div>
    </div>
  </section>
  <script
  src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
  type="module" defer></script>

@endsection

