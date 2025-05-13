@extends('layout.headfoot')

@section('content')
  <section class="bg-primary-light text-white px-[5%] py-25 flex justify-between items-center flex-wrap gap-8">
    <div class="max-w-lg">
      <h1 class="text-4xl font-bold mb-5 leading-tight">Get Closer with Mentoring</h1>
      <p class="mb-8 opacity-90 text-lg leading-relaxed">Nikmati pengalaman belajar yang intensif dan private melalui program Mentoring kami. Semua dilakukan secara privat dengan mentor berpengalaman, memastikan setiap sesi dirancang khusus untuk kebutuhan dan tujuanmu</p>
      <div class="flex gap-4">
        <a href="/register"><button class="px-7 py-3 rounded-md bg-white text-[#564AB1] font-medium transition-all duration-300 hover:bg-gray-100 hover:-translate-y-0.5">Get Started</button></a>
        <a href="/learnmore"><button class="px-7 py-3 rounded-md border-2 border-white text-white font-medium transition-all duration-300 hover:bg-white/10">Learn More</button></a>
      </div>
    </div>
    <div class="w-[630px] h-[380px] bg-primary-dark rounded-xl overflow-hidden mx-auto shadow-lg flex flex-col justify-between pb-4">
      <div class="mt-5 text-center">
        <img class="w-[576px] h-[324px] mx-auto rounded-xl object-cover" src="image/devfest-stockholm.png" alt="Event Image" />
      </div>
      <div class="flex justify-center gap-2.5 mt-4">
        <button type="button" class="w-3 h-3 rounded-full border-2 border-white bg-white" data-slide="1"></button>
        <button type="button" class="w-3 h-3 rounded-full border-2 border-white bg-transparent hover:scale-110 transition-transform" data-slide="2"></button>
        <button type="button" class="w-3 h-3 rounded-full border-2 border-white bg-transparent hover:scale-110 transition-transform" data-slide="3"></button>
      </div>
    </div>
  </section>

  <section class="bg-white px-[5%] py-12 flex-1">
    <div class="bg-white py-6 px-[0%]">
      <div class="flex flex-wrap gap-4 justify-start">
        <button id="btn-mentoring" class="px-6 py-3 rounded-full font-medium transition-all duration-300 text-white bg-[#564AB1] hover:bg-[#473D94]">
          Exclusive Mentoring
        </button>
        <button id="btn-consultan" class="px-6 py-3 rounded-full font-medium transition-all duration-300 border-2 border-[#564AB1] text-[#564AB1] hover:bg-[#564AB1]/5">
          Consultan
        </button>
      </div>
    </div>

    {{-- Mentoring Section --}}
    <div id="mentoring-section" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7 mt-8">
      {{-- Salin semua blok mentoring kamu di sini --}}
      {{-- ...potongan mentoring program yang sudah kamu punya... --}}
      {{-- Misalnya: --}}
      @for ($i = 0; $i < 6; $i++)
        <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
          <img src="image/devfest-stockholm.png" alt="DevFest Jakarta" class="w-full h-[180px] object-cover">
          <div class="p-5">
            <h3 class="text-xl font-semibold mb-2 text-gray-800">Program Full Stack Web Development</h3>
            <p class="text-sm text-gray-600 mb-4">✔ Chapter 1: Pengenalan Web & HTML Dasar</p>
            <p class="text-sm text-gray-600 mb-4">✔ Chapter 2: Struktur Halaman HTML</p>
            <p class="text-sm text-gray-600 mb-4">✔ Chapter 3: Elemen Multimedia dalam HTML</p>
            <h4 class="text-xl font-semibold mb-2 text-gray-800">Investasi Murah</h4>
            <p class="text-sm text-gray-600 mb-4 line-through">Rp. 8.000.000</p>
            <p class="text-sm text-[#30B34C] mb-4">Rp. 135.000</p>
            <div class="text-right">
              <a href="/mentoring_mendaftar" class="text-purple-600 font-bold text-base inline-block py-1.5 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-purple-600 after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Lihat Detail</a>
            </div>
          </div>
        </div>
      @endfor
    </div>

    {{-- Consultan Section --}}
    <div id="consultan-section" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7 mt-8 hidden">
      <div class="w-full bg-white rounded-xl shadow-md overflow-hidden">
        <img src="/image/hajisodikin.jpg" alt="Mas Nungnung" class="h-48 w-full object-cover">
        <div class="p-5">
          <p class="text-sm text-gray-500 mb-1">Product Management</p>
          <h3 class="text-xl font-semibold mb-2 text-gray-800">Mas Nungnung</h3>
          <div class="bg-gray-100 rounded-lg p-3 space-y-2">
            <div class="flex items-center gap-2 text-sm text-gray-700">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h13V7H2v4h7v6z" />
              </svg>
              Product Engineer at Zero One Group
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-700">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z" />
              </svg>
              5 Tahun Pengalaman
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <script src="/js/event.js"></script>

@endsection
