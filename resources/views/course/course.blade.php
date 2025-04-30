@extends('layout.app')

@section('content')

<!-- Hero Section -->
<section id="home" class="bg-indigo-600 text-white py-16 px-6 md:flex md:items-center md:justify-between">
    <div class="md:w-1/2 mb-8 md:mb-0">
        <h2 class="text-3xl font-bold mb-4">Buka Potensimu!</h2>
        <p class="mb-6">Telusuri kursus menarik dan interaktif bersama kami.</p>
        <div class="space-x-4">
            <a href="#" class="bg-white text-indigo-600 px-4 py-2 rounded hover:bg-gray-100">Get Started</a>
            <a href="#" class="border border-white px-4 py-2 rounded hover:bg-white hover:text-indigo-600">Learn More</a>
        </div>
    </div>
    <div class="md:w-1/2">
        <iframe class="rounded-xl w-full" height="300" src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
    </div>
</section>

<!-- Course Section -->
<section id="class" class="py-16 px-6">
    <h3 id="judulcourse" class="text-2xl font-semibold mb-8 text-center">Semua Kursus</h3>
    <div class="grid grid-cols-4 gap-6">
        <!-- Sidebar Kategori -->
        <div class="col-span-1 bg-white p-4 rounded-xl border border-gray-300 shadow-sm">
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
        <div class="col-span-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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

<script src="/js/coursejs.js"></script>

@endsection
