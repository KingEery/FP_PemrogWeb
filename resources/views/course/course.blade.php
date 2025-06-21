@extends('layout.headfoot')

@section('content')

<!-- Hero Section -->
<section id="home" class="bg-#564AB1-900 text-white py-16 px-6">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
        <!-- Teks Hero -->
        <div class="md:w-1/2 mb-8 md:mb-0 text-center md:text-left">
            <h2 class="text-4xl font-bold mb-4 leading-tight">Buka Potensimu!</h2>
            <p class="mb-6 text-lg text-gray-300">Telusuri kursus menarik dan interaktif bersama kami.</p>
            <div class="space-x-4">
                <a href="/register" class="bg-white text-indigo-900 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Get Started
                </a>
                <a href="/learnmore" class="border border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-800 transition">
                    Learn More
                </a>
            </div>
        </div>

        <!-- Slider Gambar -->
        <div class="md:w-1/2 flex justify-center mt-12">
            <div class="swiper mySwiper w-full max-w-md md:max-w-lg">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('image/buildwebsite.png') }}" alt="Slide 1" class="rounded-xl w-full h-[500px] object-cover">
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('image/creative.png') }}" alt="Slide 2" class="rounded-xl w-full h-[500px] object-cover">
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('image/learning-illustration.png') }}" alt="Slide 3" class="rounded-xl w-full h-[500px] object-cover">
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

<!-- Course Section -->
<section id="class" class="py-16 px-6 bg-gray-100">
    <div class="max-w-7xl mx-auto">
        <!-- Kartu Kursus -->
        <div class="bg-white rounded-2xl shadow-lg p-6 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach ($courses as $course)
            <a href="/course_description/{{ $course->id }}" class="block bg-white rounded-xl shadow p-4 hover:shadow-lg transition transform hover:scale-105 active:scale-95">
                <img src="{{ asset('storage/' . ($course->image_url ?? $course->thumbnail)) }}" alt="Course Thumbnail"
                    class="rounded-lg mb-3 object-cover w-full aspect-video" />
                <h3 class="font-semibold text-lg">{{ $course->title }}</h3>
                <p class="text-sm text-gray-600 mb-1">Instruktur: {{ $course->instructor_name }}</p>
                <p class="text-sm text-gray-600 mb-1">
                    {{ ($course->duration / 60) }} Jam • {{ $course->video_count }} video
                </p>
                <p class="text-sm text-red-500 line-through">Rp. {{ number_format($course->price_discount, 0, ',', '.') }}</p>
                <p class="text-blue-700 font-bold text-lg">Rp. {{ number_format($course->price, 0, ',', '.') }}</p>
            </a>
            @endforeach

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