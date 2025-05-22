@extends('layout.headfoot')

@section('content')


  <section class="bg-primary-light text-white px-[5%] py-25 flex justify-between items-center flex-wrap gap-8">
    <div class="max-w-lg">
      <h1 class="text-4xl font-bold mb-5 leading-tight">Cari Bakatmu: Telusuri Event Menarik di Dunia Coding Hari Ini!</h1>
      <p class="mb-8 opacity-90 text-lg leading-relaxed">Temukan event online yang inspiratif dan interaktif! Mulai pelajari event menarik kami dan buka pintu potensimu.</p>
      <div class="flex gap-4">
      <a class="px-7 py-3 rounded-md bg-white text-[#564AB1] font-medium transition-all duration-300 hover:bg-gray-100 hover:-translate-y-0.5">Get Started</a>
      <a  class="px-7 py-3 rounded-md border-2 border-white text-white font-medium transition-all duration-300 hover:bg-white/10">Learn More</a>
      </div>
    </div>
    <div class="w-[630px] h-[400px] bg-[#7C72C3] rounded-xl overflow-hidden mx-auto shadow-lg flex flex-col justify-between pb-4">
      <dotlottie-player class="mx-auto"
            src="https://lottie.host/620f8f75-634f-4bd0-8fd2-4e8f11958ad4/4Vy6Sj6Hk0.lottie"
            background="transparent"
            speed="1"
            style="width: 360px; height:  360px"
            loop
            autoplay
      ></dotlottie-player>
    </div>
  </section>

  <section class="bg-white px-[5%] py-12 flex-1">
    <div class="flex flex-wrap md:flex-nowrap gap-8">
      <div class="w-full md:w-[280px] mb-6 md:mb-0">
        <div class="w-full md:w-[280px] rounded-lg overflow-hidden shadow-sm bg-white transition-all duration-300" id="kategoriDropdown">
          <div class="bg-purple-50 p-5 cursor-pointer font-semibold text-lg flex justify-between items-center text-purple-700 transition-all duration-300" onclick="toggleDropdown()">
            <span>Kategori</span>
            <div class="flex items-center justify-center w-6 h-6 transition-transform duration-300" id="dropdownIcon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 9L12 15L18 9" stroke="#6B46C1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </div>

          <div class="overflow-hidden transition-all duration-500 max-h-0" id="dropdownContent">
            <div class="py-2">
              <div class="py-1 px-5">
                <label class="flex items-center py-1">
                  <input type="radio" name="category" id="all" value="all" class="w-5 h-5 border border-gray-300 rounded-full text-purple-600 focus:ring-0 focus:ring-offset-0" checked>
                  <span class="ml-3 text-gray-800">Semua Kategori</span>
                </label>
              </div>
              <div class="py-1 px-5">
                <label class="flex items-center py-1">
                  <input type="radio" name="category" id="web-programming" value="web-programming" class="w-5 h-5 border border-gray-300 rounded-full text-purple-600 focus:ring-0 focus:ring-offset-0">
                  <span class="ml-3 text-gray-800">Web Programming</span>
                </label>
              </div>
              <div class="py-1 px-5">
                <label class="flex items-center py-1">
                  <input type="radio" name="category" id="mobile-programming" value="mobile-programming" class="w-5 h-5 border border-gray-300 rounded-full text-purple-600 focus:ring-0 focus:ring-offset-0">
                  <span class="ml-3 text-gray-800">Mobile Programming</span>
                </label>
              </div>
              <div class="py-1 px-5">
                <label class="flex items-center py-1">
                  <input type="radio" name="category" id="fullstack" value="fullstack" class="w-5 h-5 border border-gray-300 rounded-full text-purple-600 focus:ring-0 focus:ring-offset-0">
                  <span class="ml-3 text-gray-800">Fullstack Development</span>
                </label>
              </div>
              <div class="py-1 px-5">
                <label class="flex items-center py-1">
                  <input type="radio" name="category" id="backend" value="backend" class="w-5 h-5 border border-gray-300 rounded-full text-purple-600 focus:ring-0 focus:ring-offset-0">
                  <span class="ml-3 text-gray-800">Backend Development</span>
                </label>
              </div>
              <div class="py-1 px-5">
                <label class="flex items-center py-1">
                  <input type="radio" name="category" id="ui-ux" value="ui-ux" class="w-5 h-5 border border-gray-300 rounded-full text-purple-600 focus:ring-0 focus:ring-offset-0">
                  <span class="ml-3 text-gray-800">UI / UX</span>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex-1">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
          <a href="/event_pendaftaran" class="block">
            <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="web-programming">
              <img src="image/devfest.jpg" alt="DevFest Jakarta" class="w-full h-[150px] object-cover">
              <div class="p-5">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Jakarta</h3>
                <p class="text-sm text-gray-600 mb-4">1 Oktober 2023 • Jakarta</p>
                <span class="text-purple-600 font-bold text-base">Gratis</span>
              </div>
            </div>
          </a>

          <a href="/event_pendaftaran" class="block">
            <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="web-programming">
              <img src="image/devfest.jpg" alt="DevFest Jakarta" class="w-full h-[150px] object-cover">
              <div class="p-5">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Jakarta</h3>
                <p class="text-sm text-gray-600 mb-4">1 Oktober 2023 • Jakarta</p>
                <span class="text-purple-600 font-bold text-base">Gratis</span>
              </div>
            </div>
          </a>

          <a href="/event_pendaftaran" class="block">
            <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="web-programming">
              <img src="image/devfest.jpg" alt="DevFest Jakarta" class="w-full h-[150px] object-cover">
              <div class="p-5">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Jakarta</h3>
                <p class="text-sm text-gray-600 mb-4">1 Oktober 2023 • Jakarta</p>
                <span class="text-purple-600 font-bold text-base">Gratis</span>
              </div>
            </div>
          </a>

          <a href="/event_pendaftaran" class="block">
            <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="web-programming">
              <img src="image/devfest.jpg" alt="DevFest Jakarta" class="w-full h-[150px] object-cover">
              <div class="p-5">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Jakarta</h3>
                <p class="text-sm text-gray-600 mb-4">1 Oktober 2023 • Jakarta</p>
                <span class="text-purple-600 font-bold text-base">Gratis</span>
              </div>
            </div>
          </a>


          <a href="/event_pendaftaran" class="block">
            <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="web-programming">
              <img src="image/devfest.jpg" alt="DevFest Jakarta" class="w-full h-[150px] object-cover">
              <div class="p-5">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Jakarta</h3>
                <p class="text-sm text-gray-600 mb-4">1 Oktober 2023 • Jakarta</p>
                <span class="text-purple-600 font-bold text-base">Gratis</span>
              </div>
            </div>
          </a>


          <a href="/event_pendaftaran" class="block">
            <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="web-programming">
              <img src="image/devfest.jpg" alt="DevFest Jakarta" class="w-full h-[150px] object-cover">
              <div class="p-5">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Jakarta</h3>
                <p class="text-sm text-gray-600 mb-4">1 Oktober 2023 • Jakarta</p>
                <span class="text-purple-600 font-bold text-base">Gratis</span>
              </div>
            </div>
          </a>


          <a href="/event_pendaftaran" class="block">
            <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="web-programming">
              <img src="image/devfest.jpg" alt="DevFest Jakarta" class="w-full h-[150px] object-cover">
              <div class="p-5">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Jakarta</h3>
                <p class="text-sm text-gray-600 mb-4">1 Oktober 2023 • Jakarta</p>
                <span class="text-purple-600 font-bold text-base">Gratis</span>
              </div>
            </div>
          </a>


          <a href="/event_pendaftaran" class="block">
            <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="web-programming">
              <img src="image/devfest.jpg" alt="DevFest Jakarta" class="w-full h-[150px] object-cover">
              <div class="p-5">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Jakarta</h3>
                <p class="text-sm text-gray-600 mb-4">1 Oktober 2023 • Jakarta</p>
                <span class="text-purple-600 font-bold text-base">Gratis</span>
              </div>
            </div>
          </a>

          <a href="/event_pendaftaran" class="block">
            <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="web-programming">
              <img src="image/devfest.jpg" alt="DevFest Jakarta" class="w-full h-[150px] object-cover">
              <div class="p-5">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Jakarta</h3>
                <p class="text-sm text-gray-600 mb-4">1 Oktober 2023 • Jakarta</p>
                <span class="text-purple-600 font-bold text-base">Gratis</span>
              </div>
            </div>
          </a>

          <a href="/event_pendaftaran" class="block">
            <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="web-programming">
              <img src="image/devfest.jpg" alt="DevFest Jakarta" class="w-full h-[150px] object-cover">
              <div class="p-5">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Jakarta</h3>
                <p class="text-sm text-gray-600 mb-4">1 Oktober 2023 • Jakarta</p>
                <span class="text-purple-600 font-bold text-base">Gratis</span>
              </div>
            </div>
          </a>

          <a href="/event_pendaftaran" class="block">
            <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="web-programming">
              <img src="image/devfest.jpg" alt="DevFest Jakarta" class="w-full h-[150px] object-cover">
              <div class="p-5">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Jakarta</h3>
                <p class="text-sm text-gray-600 mb-4">1 Oktober 2023 • Jakarta</p>
                <span class="text-purple-600 font-bold text-base">Gratis</span>
              </div>
            </div>
          </a>

          <a href="/event_pendaftaran" class="block">
            <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="web-programming">
              <img src="image/devfest.jpg" alt="DevFest Jakarta" class="w-full h-[150px] object-cover">
              <div class="p-5">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">DevFest Jakarta</h3>
                <p class="text-sm text-gray-600 mb-4">1 Oktober 2023 • Jakarta</p>
                <span class="text-purple-600 font-bold text-base">Gratis</span>
              </div>
            </div>
          </a>

        </div>
      </div>
    </div>
  </section>
  <script
  src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
  type="module"></script>

  <script src="/js/event.js"></script>

@endsection

