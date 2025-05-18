@extends('layout.headfoot')

@section('content')
<link rel="stylesheet" href="{{ asset (path: 'css1/home.css') }}">

<!-- page 1 -->
  <section class="homepage" id="home" data-aos="fade-up">
    <div class="homepage-text">
      <h1>Develop your skills in a new and unique way</h1>
      <p>Discover the best coding course for your kids. Learn Coding from basic</p>
    </div>
    <div class="homepage-img md:w-1/2 flex justify-center">
        <img class = "homepage-img" src="image/homepsge-img.png "alt="">
        <img class = "homepage-img" src="image/homepage-img.png "alt="">

    </div>
  </section>

<!-- page 2 -->
 <!-- Partner Logos Section -->
<div class="partners-section text-center mt-8">
  <p class="text-gray-700 text-lg font-medium mb-6">Dunia Coding telah bekerja sama dengan</p>
  <div class="flex flex-wrap justify-center items-center gap-8 mb-4">
    <img src="{{ asset('image/maze.png') }}" alt="Maze" class="h-10 md:h-12">
    <img src="{{ asset('image/dropbox.png') }}" alt="Dropbox" class="h-10 md:h-12">
    <img src="{{ asset('image/webflow.png') }}" alt="WebFlow" class="h-10 md:h-12">
  </div>
  <p class="text-gray-700 text-base">Dan 100+ Tech Company Lainnya</p>
</div>


  <!-- page 3 -->


  <section class="masking bg-white min-h-screen flex items-center justify-center" id="masking" data-aos="fade-up">
    <div class="container mx-auto px-4 flex flex-col-reverse lg:flex-row items-center justify-between gap-12">
      
      <!-- Text Section -->
      <div class="w-full lg:w-1/2 text-center lg:text-left">
        <h1 class="text-3xl md:text-5xl font-bold mb-6">Exclusive Mentoring</h1>
        <p class="text-gray-700 text-base md:text-lg leading-relaxed">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
  
      <!-- Image Section -->
      <div class="w-full lg:w-1/2 flex justify-center">
        <img src="{{ asset('image/masking.png') }}" alt="homepage" class="max-w-full h-auto lg:max-w-[80%]">
      </div>
  
    </div>
  </section>
  



<!-- <section class="masking" id="masking">

  <div class="masking-content">
      <div class="masking-text">
        
      </div>
      <div class="masking-img">
          <img src="" alt=" image ">
      </div>
  </div>
</section> -->

<!-- page 4 - Program Mentoring -->
<section class="mentoring-section p-10" data-aos="fade-up">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">🙌🏻 Join Exclusive Mentoring Sekarang!</h2>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
      <h2 class="text-xl font-bold mb-2">Program Full Stack Web Development</h2>
      <p class="text-gray-600 mb-4">Pengenalan Web & HTML Dasar, Struktur Halaman HTML, dan Elemen Multimedia dalam HTML</p>
      <p class="text-lg font-semibold text-green-600 mb-4">Rp 135.000</p>
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Daftar Sekarang</button>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
      <h2 class="text-xl font-bold mb-2">Program Full Stack Web Development</h2>
      <p class="text-gray-600 mb-4">Pengenalan Web & HTML Dasar, Struktur Halaman HTML, dan Elemen Multimedia dalam HTML</p>
      <p class="text-lg font-semibold text-green-600 mb-4">Rp 135.000</p>
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Daftar Sekarang</button>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
      <h2 class="text-xl font-bold mb-2">Program Full Stack Web Development</h2>
      <p class="text-gray-600 mb-4">Pengenalan Web & HTML Dasar, Struktur Halaman HTML, dan Elemen Multimedia dalam HTML</p>
      <p class="text-lg font-semibold text-green-600 mb-4">Rp 135.000</p>
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Daftar Sekarang</button>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
      <h2 class="text-xl font-bold mb-2">Program Full Stack Web Development</h2>
      <p class="text-gray-600 mb-4">Pengenalan Web & HTML Dasar, Struktur Halaman HTML, dan Elemen Multimedia dalam HTML</p>
      <p class="text-lg font-semibold text-green-600 mb-4">Rp 135.000</p>
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Daftar Sekarang</button>
    </div>
  </div>
</section>


<!-- page 5 - Kategori Event -->
<section class="event-section" data-aos="fade-up">
  <div class="left-content">
    <button class="badge">Our Product</button>
    <h2 class="title">Online <span class="highlight">Event</span></h2>
    <p class="description">Dunia Coding menghadirkan webinar, workshop, dan miniclasse yang dirancang untuk meningkatkan skill IT dan memperluas jaringan profesionalmu.</p>
    
    <div class="features">
      <ul>
        <li>✔ Live Session</li>
        <li>✔ E-Book</li>
        <li>✔ File Project</li>
      </ul>
      <ul>
        <li>✔ E-Certificate</li>
        <li>✔ Exclusive Community</li>
        <li>✔ Video Record</li>
      </ul>
    </div>

    <button class="explore-btn" onclick="window.location.href='/event'">Explore All Event</button>

    
  </div>

  <div class="right-cards">
    <div class="card"><i class="icon">🌐</i> Web Programming</div>
    <div class="card"><i class="icon">📱</i> Mobile Programming</div>
    <div class="card"><i class="icon">🎨</i> UI / UX</div>
    <div class="card"><i class="icon">🗄️</i> Data</div>
  </div>
</section>

<!-- Upcoming Event Section -->
<section class="upcoming-event p-10" data-aos="fade-up">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Upcoming Event</h2>
    <a href="/event" class="text-purple-600 font-semibold hover:underline">Lihat Selengkapnya</a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    
    <!-- Card 1 -->
    <a href="/event_pendaftaran" class="block">
    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4 h-full flex flex-col">
      <img src="{{ asset('image/devfest-stockholm.png') }}" alt="Event 1" class="rounded-xl mb-3">
      <span class="text-red-500 text-sm font-semibold">16 Hari Lagi</span>
      <h3 class="font-bold mt-1 mb-2">Hasilkan Portofolio Mahal! Bikin Aplikasi Kasir dengan NextJS dalam Hitungan Hari</h3>
      <span class="text-green-600 font-semibold">Gratis</span>
    </div>

    <!-- Card 2 -->
    <a href="/event_pendaftaran" class="block">
    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4 h-full flex flex-col">
      <img src="{{ asset('image/devfest-stockholm.png') }}" alt="Event 2" class="rounded-xl mb-3">
      <span class="text-red-500 text-sm font-semibold">11 Hari Lagi</span>
      <h3 class="font-bold mt-1 mb-2">Step by Step Belajar UI/UX Dari Nol Sampai Bikin Project Sendiri</h3>
      <span class="text-green-600 font-semibold">Gratis</span>
    </div>

    <!-- Card 3 -->
    <a href="/event_pendaftaran" class="block">
    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4 h-full flex flex-col">
      <img src="{{ asset('image/devfest-stockholm.png') }}" alt="Event 3" class="rounded-xl mb-3">
      <span class="text-red-500 text-sm font-semibold">8 Hari Lagi</span>
      <h3 class="font-bold mt-1 mb-2">Kerja Remote, Gaji Dollar: Cara Developer Dapet Project Luar Negeri Tanpa Pindah Negara</h3>
      <span class="text-green-600 font-semibold">Gratis</span>
    </div>

    <!-- Card 4 -->
    <a href="/event_pendaftaran" class="block">
    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4 h-full flex flex-col">
      <img src="{{ asset('image/devfest-stockholm.png') }}" alt="Event 4" class="rounded-xl mb-3">
      <span class="text-red-500 text-sm font-semibold">4 Hari Lagi</span>
      <h3 class="font-bold mt-1 mb-2">Membangun Aplikasi Dating Real-Time dengan Flutter & Firebase</h3>
      <span class="text-green-600 font-semibold">Gratis</span>
    </div>
  </div>
</section>

<!-- page 6 - Event Yang Terlewat -->
<section class="missed-events p-10 bg-white w-full" data-aos="fade-up">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Event Yang Terlewat</h2>
    <a href="/event" class="text-purple-600 font-semibold hover:underline">Lihat Selengkapnya</a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Card 1 -->
    <a href="/event_pendaftaran" class="block bg-white rounded-2xl shadow p-4 hover:shadow-lg transition">
      <div class="relative">
        <img src="{{ asset('image/devfest-stockholm.png') }}" alt="Node.js Event" class="rounded-xl mb-3">
        <span class="absolute top-2 left-2 bg-green-500 text-white px-3 py-1 text-xs font-bold rounded">Best Seller</span>
        <span class="absolute bottom-2 left-2 bg-red-500 text-white px-3 py-1 text-xs font-bold rounded">Missed Event</span>
      </div>
      <h3 class="font-semibold mt-2">Memulai Karir FrontEnd dengan PHP</h3>
      <p class="text-yellow-500 text-sm">⭐ 5 (242)</p>
      <p class="text-green-600 font-bold">Rp 50.000</p>
    </a>

    <!-- Card 2 -->
    <a href="/event_pendaftaran" class="block bg-white rounded-2xl shadow p-4 hover:shadow-lg transition">
      <div class="relative">
        <img src="{{ asset('image/devfest-stockholm.png') }}" alt="Flutter Event" class="rounded-xl mb-3">
        <span class="absolute top-2 left-2 bg-green-500 text-white px-3 py-1 text-xs font-bold rounded">Best Seller</span>
        <span class="absolute bottom-2 left-2 bg-red-500 text-white px-3 py-1 text-xs font-bold rounded">Missed Event</span>
      </div>
      <h3 class="font-semibold mt-2">Membangun Aplikasi Mobile Real-Time dengan Flutter & Firebase</h3>
      <p class="text-yellow-500 text-sm">⭐ 5 (405)</p>
      <p class="text-green-600 font-bold">Rp 50.000</p>
    </a>

    <!-- Card 3 -->
    <a href="/event_pendaftaran" class="block bg-white rounded-2xl shadow p-4 hover:shadow-lg transition">
      <div class="relative">
        <img src="{{ asset('image/devfest-stockholm.png') }}" alt="Data Science Event" class="rounded-xl mb-3">
        <span class="absolute top-2 left-2 bg-green-500 text-white px-3 py-1 text-xs font-bold rounded">Best Seller</span>
        <span class="absolute bottom-2 left-2 bg-red-500 text-white px-3 py-1 text-xs font-bold rounded">Missed Event</span>
      </div>
      <h3 class="font-semibold mt-2">Menguasai Dasar-Dasar Data Science dengan Python</h3>
      <p class="text-yellow-500 text-sm">⭐ 5 (226)</p>
      <p class="text-green-600 font-bold">Rp 30.000</p>
    </a>

    <!-- Card 4 -->
    <a href="/event_pendaftaran" class="block bg-white rounded-2xl shadow p-4 hover:shadow-lg transition">
      <div class="relative">
        <img src="{{ asset('image/devfest-stockholm.png') }}" alt="URL Shortener Event" class="rounded-xl mb-3">
        <span class="absolute top-2 left-2 bg-green-500 text-white px-3 py-1 text-xs font-bold rounded">Best Seller</span>
        <span class="absolute bottom-2 left-2 bg-red-500 text-white px-3 py-1 text-xs font-bold rounded">Missed Event</span>
      </div>
      <h3 class="font-semibold mt-2">Membangun Aplikasi URL Shortener Sederhana</h3>
      <p class="text-yellow-500 text-sm">⭐ 5 (194)</p>
      <p class="text-green-600 font-bold">Rp 50.000</p>
    </a>
  </div>
</section>


<!-- page 7 -->
<section class="event-section" data-aos="fade-up">
  <div class="left-content">
    <button class="badge">Our Product</button>
    <h2 class="title">Online <span class="highlight">Course</span></h2>
    <p class="description">Dapatkan fleksibilitas penuh dengan video tutorial dan e-book yang bisa diakses kapanpun, lengkap dan selalu relevan dengan industri.</p>   
    <div class="features">
      <ul>
        <li>✔ Flexible Access</li>
        <li>✔ E-Book</li>
        <li>✔ File Project</li>
      </ul>
      <ul>
        <li>✔ E-Certificate</li>
        <li>✔ Exclusive Community</li>
        <li>✔ Free Consultation
        </li>
      </ul>
    </div>

    <button class="explore-btn" onclick="window.location.href='/course'">Explore All Course</button>

    
  </div>

              <!-- Slider Gambar -->
              <div class="md:w-1/2 flex justify-center mt-12">
                <div class="swiper mySwiper w-full max-w-md md:max-w-lg">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <img src="{{ asset('image/buildwebsite.png') }}" alt="Slide 1" class="rounded-xl w-full h-auto object-cover">
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <img src="{{ asset('image/creative.png') }}" alt="Slide 2" class="rounded-xl w-full h-auto object-cover">
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <img src="{{ asset('image/noomore.png') }}" alt="Slide 3" class="rounded-xl w-full h-auto object-cover">
                        </div>
                    </div>
                    <!-- Navigasi -->
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Event Section -->
<section class="Best-Course-Choices p-10" data-aos="fade-up">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Best Course Choices</h2>
    <a href="/course" class="text-purple-600 font-semibold hover:underline">Lihat Selengkapnya</a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Card 1 -->
    <a href="/course_description" class="block">
    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4 h-full flex flex-col">
      <img src="{{ asset('image/devfest-stockholm.png') }}" alt="Event 1" class="rounded-xl mb-3">
      <h3 class="font-bold mt-1 mb-2">Full Stack Mobile Development</h3>
      <span class="text-green-600 font-semibold">Gratis</span>
    </div>

    <!-- Card 2 -->
    <a href="/course_description" class="block">
    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4 h-full flex flex-col">
      <img src="{{ asset('image/devfest-stockholm.png') }}" alt="Event 2" class="rounded-xl mb-3">
      <h3 class="font-bold mt-1 mb-2">Complete Flutter Development :</h3>
      <h4 class="font-bold mt-1 mb-2">Build Event Apps</h4>
      <span class="text-green-600 font-semibold">Gratis</span>
    </div>

    <!-- Card 3 -->
    <a href="/course_description" class="block">
    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4 h-full flex flex-col">
      <img src="{{ asset('image/devfest-stockholm.png') }}" alt="Event 3" class="rounded-xl mb-3">
      <h3 class="font-bold mt-1 mb-2">Fundamental ReactJS untuk pemula</h3>
      <span class="text-green-600 font-semibold">Gratis</span>
    </div>

    <!-- Card 4 -->
    <a href="/course_description" class="block">
    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4 h-full flex flex-col">
      <img src="{{ asset('image/devfest-stockholm.png') }}" alt="Event 4" class="rounded-xl mb-3">
      <span class="text-red-500 text-sm font-semibold">4 Hari Lagi</span>
      <h3 class="font-bold mt-1 mb-2">Membangun Aplikasi Dating Real-Time dengan Flutter & Firebase</h3>
      <span class="text-green-600 font-semibold">Gratis</span>
    </div>
  </div>
</section>

  <!-- AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>

@endsection
