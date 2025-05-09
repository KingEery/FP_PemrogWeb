@extends('layout.headfoot')

@section('content')
  <section class="bg-primary-light text-white px-[5%] py-16 flex justify-between items-center flex-wrap gap-8">
    <div class="max-w-lg">
      <h1 class="text-4xl font-bold mb-5 leading-tight">Get Closer with Mentoring</h1>
      <p class="mb-8 opacity-90 text-lg leading-relaxed">Nikmati pengalaman belajar yang intensif dan private melalui program Mentoring kami. Semua dilakukan secara privat dengan mentor berpengalaman, memastikan setiap sesi dirancang khusus untuk kebutuhan dan tujuanmu</p>
      <div class="flex gap-4">
        <button class="px-7 py-3 rounded-md bg-white text-primary-light font-medium transition-all duration-300 hover:bg-gray-100 hover:-translate-y-0.5">Get Started</button>
        <button class="px-7 py-3 rounded-md border-2 border-white text-white font-medium transition-all duration-300 hover:bg-white/10">Learn More</button>
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

  <section class="px-[5%] py-12 flex-1">
    <div class="flex flex-wrap md:flex-nowrap gap-8">
      
      <div class="flex-1">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
          <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="web-programming">
            <img src="image/devfest-stockholm.png" alt="DevFest Jakarta" class="w-full h-[180px] object-cover">
            <div class="p-5">
              <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Jakarta</h3>
              <p class="text-sm text-gray-600 mb-4">1 Oktober 2023 • Jakarta</p>
              <a href="#" class="text-primary-light font-bold text-base inline-block py-1.5 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Gratis</a>
            </div>
          </div>
          
          <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="mobile-programming">
            <img src="image/devfest-stockholm.png" alt="DevFest Bandung" class="w-full h-[180px] object-cover">
            <div class="p-5">
              <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Bandung</h3>
              <p class="text-sm text-gray-600 mb-4">5 Oktober 2023 • Bandung</p>
              <a href="#" class="text-primary-light font-bold text-base inline-block py-1.5 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Gratis</a>
            </div>
          </div>
          
          <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="fullstack">
            <img src="image/devfest-stockholm.png" alt="DevFest Surabaya" class="w-full h-[180px] object-cover">
            <div class="p-5">
              <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Surabaya</h3>
              <p class="text-sm text-gray-600 mb-4">10 Oktober 2023 • Surabaya</p>
              <a href="#" class="text-primary-light font-bold text-base inline-block py-1.5 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Gratis</a>
            </div>
          </div>
          
          <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="backend">
            <img src="image/devfest-stockholm.png" alt="DevFest Yogyakarta" class="w-full h-[180px] object-cover">
            <div class="p-5">
              <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Yogyakarta</h3>
              <p class="text-sm text-gray-600 mb-4">15 Oktober 2023 • Online</p>
              <a href="#" class="text-primary-light font-bold text-base inline-block py-1.5 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Gratis</a>
            </div>
          </div>

          <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="ui-ux">
            <img src="image/devfest-stockholm.png" alt="DevFest Semarang" class="w-full h-[180px] object-cover">
            <div class="p-5">
              <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Semarang</h3>
              <p class="text-sm text-gray-600 mb-4">20 Oktober 2023 • Semarang</p>
              <a href="#" class="text-primary-light font-bold text-base inline-block py-1.5 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Gratis</a>
            </div>
          </div>
          
          <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="product-management">
            <img src="image/devfest-stockholm.png" alt="DevFest Medan" class="w-full h-[180px] object-cover">
            <div class="p-5">
              <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Medan</h3>
              <p class="text-sm text-gray-600 mb-4">25 Oktober 2023 • Medan</p>
              <a href="#" class="text-primary-light font-bold text-base inline-block py-1.5 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Gratis</a>
            </div>
          </div>

          <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="qa">
            <img src="image/devfest-stockholm.png" alt="DevFest Bali" class="w-full h-[180px] object-cover">
            <div class="p-5">
              <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Bali</h3>
              <p class="text-sm text-gray-600 mb-4">5 November 2023 • Bali</p>
              <a href="#" class="text-primary-light font-bold text-base inline-block py-1.5 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Gratis</a>
            </div>
          </div>

          <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="digital-marketing">
            <img src="image/devfest-stockholm.png" alt="DevFest Makassar" class="w-full h-[180px] object-cover">
            <div class="p-5">
              <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Makassar</h3>
              <p class="text-sm text-gray-600 mb-4">10 November 2023 • Makassar</p>
              <a href="#" class="text-primary-light font-bold text-base inline-block py-1.5 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Gratis</a>
            </div>
          </div>

          <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="cyber-security">
            <img src="image/devfest-stockholm.png" alt="DevFest Palembang" class="w-full h-[180px] object-cover">
            <div class="p-5">
              <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Palembang</h3>
              <p class="text-sm text-gray-600 mb-4">15 November 2023 • Palembang</p>
              <a href="#" class="text-primary-light font-bold text-base inline-block py-1.5 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Gratis</a>
            </div>
          </div>

          <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="career-dev">
            <img src="image/devfest-stockholm.png" alt="DevFest Padang" class="w-full h-[180px] object-cover">
            <div class="p-5">
              <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Padang</h3>
              <p class="text-sm text-gray-600 mb-4">20 November 2023 • Padang</p>
              <a href="#" class="text-primary-light font-bold text-base inline-block py-1.5 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Gratis</a>
            </div>
          </div>

          <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="tech-entrepreneur">
            <img src="image/devfest-stockholm.png" alt="DevFest Pontianak" class="w-full h-[180px] object-cover">
            <div class="p-5">
              <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Pontianak</h3>
              <p class="text-sm text-gray-600 mb-4">25 November 2023 • Pontianak</p>
              <a href="#" class="text-primary-light font-bold text-base inline-block py-1.5 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Gratis</a>
            </div>
          </div>

          <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="freelancer">
            <img src="image/devfest-stockholm.png" alt="DevFest Manado" class="w-full h-[180px] object-cover">
            <div class="p-5">
              <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Manado</h3>
              <p class="text-sm text-gray-600 mb-4">30 November 2023 • Manado</p>
              <a href="#" class="text-primary-light font-bold text-base inline-block py-1.5 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Gratis</a>
            </div>
          </div>
        </div>
        </div>
      </div>
  </section>

  <script src="/js/event.js"></script>
  


@endsection
