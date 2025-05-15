@extends('layout.headfoot')

@section('content')

<!-- Hero Section -->
<section class="bg-primary-light text-white px-[5%] py-25">
    <div class="container mx-auto flex flex-col-reverse lg:flex-row items-center justify-between gap-12">
        <!-- Teks Hero -->
        <div class="w-full lg:w-1/2 text-center lg:text-left">
            <h2 class="text-4xl md:text-5xl font-bold mb-5 leading-tight text-white">Buka Potensimu!</h2>
            <p class="mb-8 opacity-90 text-lg leading-relaxed text-white">Telusuri kursus menarik dan interaktif bersama kami.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                <a href="/register" class="bg-white text-indigo-900 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Get Started
                </a>
                <a href="/learnmore" class="border border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-800 transition text-white">
                    Learn More
                </a>
            </div>
        </div>

        <!-- Slider Gambar -->
        <div class="w-full lg:w-1/2 flex justify-center">
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
                        <img src="{{ asset('image/ahmad.jpeg') }}" alt="Slide 3" class="rounded-xl w-full h-auto object-cover">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</section>

<<<<<<< HEAD
<!-- Course Section -->
<section id="class" class="py-16 px-4 sm:px-6 bg-white">
    <h3 id="judulcourse" class="text-2xl font-semibold mb-8 text-center text-gray-800">Semua Kursus</h3>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Sidebar Kategori -->
        <div class="bg-white p-4 rounded-xl border border-gray-300 shadow-sm">
            <h4 class="text-lg font-semibold mb-4 bg-gray-100 p-2 rounded-md text-center">Kategori</h4>
            <ul class="space-y-2 bg-gray-50 p-3 rounded-md border border-gray-200">
                @foreach(['Web Programming', 'Fullstack Development', 'Backend Development', 'UI/UX'] as $kategori)
                    <li class="flex items-center space-x-2">
                        <input type="radio" id="{{ Str::slug($kategori) }}" name="kategori" value="{{ $kategori }}" class="text-purple-600 focus:ring-purple-500" />
                        <label for="{{ Str::slug($kategori) }}" class="text-gray-700">{{ $kategori }}</label>
                    </li>
                @endforeach
            </ul>
        </div>
=======
    <!-- Course Section -->
    <section id="class" class="py-11 px-6 bg-white">
    <h3 id="judulcourse" class="text-2xl font-semibold mb-8 text-center text-black">Semua Kursus</h3>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Sidebar Kategori -->
        <div class="lg:col-span-1 mb-6 lg:mb-0 bg-white p-4 rounded-xl border border-gray-300 shadow-sm self-start">
            <h4 class="text-lg font-semibold mb-4 bg-gray-100 p-2 rounded-md text-center">Kategori</h4>
            <ul class="space-y-2 bg-gray-50 p-3 rounded-md border border-gray-200">
                <li class="flex items-center space-x-2">
                    <input type="radio" id="web" name="kategori" value="Web Programming" class="text-purple-600 focus:ring-purple-500" />
                    <label for="web" class="text-gray-700">Web Programming</label>
                </li>
                <li class="flex items-center space-x-2">
                    <input type="radio" id="fullstack" name="kategori" value="Fullstack Development" class="text-purple-600 focus:ring-purple-500" />
                    <label for="fullstack" class="text-gray-700">Fullstack Development</label>
                </li>
                <li class="flex items-center space-x-2">
                    <input type="radio" id="backend" name="kategori" value="Backend Development" class="text-purple-600 focus:ring-purple-500" />
                    <label for="backend" class="text-gray-700">Backend Development</label>
                </li>
                <li class="flex items-center space-x-2">
                    <input type="radio" id="uiux" name="kategori" value="UI/UX" class="text-purple-600 focus:ring-purple-500" />
                    <label for="uiux" class="text-gray-700">UI/UX</label>
                </li>
            </ul>
        </div>
        <!-- Kartu Kursus -->
        <div class="lg:col-span-3 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @for ($i = 0; $i < 6; $i++)
                @include('course.card_sell', [
                    'title' => 'Laravel 12 Mastery',
                    'instructor' => 'Mbah Bregas',
                    'duration' => '4 jam 30 menit • 23 video',
                    'original' => '300.000',
                    'price' => '99.000'
                ])
            @endfor
        </div>
    </div>
</section>
>>>>>>> b84d65610ed22c604a0f1f13f4bbc156bee3f0c6

        <!-- Kartu Kursus -->
        <div class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
            @for ($i = 0; $i < 6; $i++)
                @include('course.card_sell', [
                    'title' => 'Laravel 12 Mastery',
                    'instructor' => 'Mbah Bregas',
                    'duration' => '4 jam 30 menit • 23 video',
                    'original' => '300.000',
                    'price' => '99.000'
                ])
            @endfor
        </div>
    </div>
</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="/js/coursejs.js"></script>
<script>
    const swiper = new Swiper('.mySwiper', {
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true,
        },
    });
</script>

@endsection
