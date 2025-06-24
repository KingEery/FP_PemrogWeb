<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ITQOM header-footer</title>
    {{-- tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css1/home.css') }}" />
    {{-- aos --}}
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <header class="bg-[#564AB1] shadow-md fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto flex items-center justify-between px-4 py-3">
        <a href="#" class="logo flex items-center">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="h-10" />
        </a>
        </button>
        <!-- Navigation Links -->
        <ul id="nav-menu" class="hidden md:flex nav-links flex-col md:flex-row md:items-center md:space-x-6 absolute md:static top-16 left-0 w-full md:w-auto bg-[#564AB1] md:bg-transparent shadow md:shadow-none px-6 md:px-0 py-4 md:py-0 transition-all duration-300">
            <li>
                <a href="/" class="flex items-center gap-2 {{ Request::is('/') ? 'text-yellow-300 font-semibold active' : 'text-white' }} hover:text-yellow-300">
                    <svg class="w-5 h-5 md:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m-4 0h4"></path></svg>
                    Home
                </a>
            </li>
            <li>
                <a href="/mentoring" class="flex items-center gap-2 {{ Request::is('mentoring') ? 'text-yellow-300 font-semibold active' : 'text-white' }} hover:text-yellow-300">
                    <svg class="w-5 h-5 md:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 01-8 0M12 14v7m-7-7a7 7 0 0114 0v7H5v-7z"></path></svg>
                    Mentoring
                </a>
            </li>
            <li>
                <a href="/course" class="flex items-center gap-2 {{ Request::is('course') ? 'text-yellow-300 font-semibold active' : 'text-white' }} hover:text-yellow-300">
                    <svg class="w-5 h-5 md:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0 0H3"></path></svg>
                    Course
                </a>
            </li>
            <li>
                <a href="/event" class="flex items-center gap-2 {{ Request::is('event') ? 'text-yellow-300 font-semibold active' : 'text-white' }} hover:text-yellow-300">
                    <svg class="w-5 h-5 md:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h8M12 8v8"></path></svg>
                    Event
                </a>
            </li>
            <li>
                <a href="/about" class="flex items-center gap-2 {{ Request::is('about') ? 'text-yellow-300 font-semibold active' : 'text-white' }} hover:text-yellow-300">
                    <svg class="w-5 h-5 md:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h8M12 8v8"></path></svg>
                    About Us
                </a>
            </li>
            @guest
    <li class="md:hidden flex flex-col space-y-2 mt-2">
        <a href="/login">
            <button class="login w-full">Login</button>
        </a>
        <a href="/register">
            <button class="signup w-full">Sign Up</button>
        </a>
    </li>
@endguest
@auth
    <li class="md:hidden flex flex-col space-y-2 mt-2">
        <div class="flex items-center space-x-2">
            <a href="{{ Auth::user()->role === 'admin' ? '/dashboard_consultant' : '/dashboard' }}">
                <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center cursor-pointer hover:bg-purple-700 transition">
                    <i class="fas fa-user text-white text-sm"></i>
                </div>
            </a>
            <span class="text-sm text-gray-900">{{ Auth::user()->name }}</span>
        </div>
        <form action="{{ route('logout') }}" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="w-full px-3 py-2 rounded bg-red-500 text-white text-sm hover:bg-red-600 transition">Logout</button>
        </form>
    </li>
@endauth
        </ul>
        <!-- Auth Buttons Desktop -->
@guest
    <div class="auth-buttons hidden md:flex space-x-3">
        <a href="/login">
            <button class="login">Login</button>
        </a>
        <a href="/register">
            <button class="signup">Sign Up</button>
        </a>
    </div>
@endguest

@auth
    <div class="hidden md:flex items-center space-x-4">
        <span class="text-sm text-gray-100">Selamat datang, {{ Auth::user()->name }}</span>
        <a href="{{ Auth::user()->role === 'admin' ? '/dashboard_consultant' : '/dashboard' }}">
            <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center">
            <i class="fas fa-user text-white text-sm"></i>
        </div>
        </a>
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="ml-2 px-3 py-1 rounded bg-red-500 text-white text-sm hover:bg-red-600 transition">Logout</button>
        </form>
    </div>
@endauth

        <!-- Hamburger Icon -->
        <button id="hamburger" class="md:hidden flex flex-col justify-center items-center w-10 h-10 focus:outline-none">
            <span class="block w-6 h-0.5 bg-white mb-1"></span>
            <span class="block w-6 h-0.5 bg-white mb-1"></span>
            <span class="block w-6 h-0.5 bg-white"></span>
    </div>
</header>

    <!-- Konten dinamis -->
    <main>
        @yield  ('content')
    </main>
    <footer class="bg-gray-800 text-white px-6 py-8 mt-12">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <h2 class="text-lg font-bold">ITQOM</h2>
                <p class="text-sm opacity-80">Jl. Menteng Raya No. 21, Jakarta Pusat, Indonesia 10340</p>
                <p class="text-sm opacity-80">info@itqom.co.id</p>
            </div>
            <div class="flex space-x-4">
                <a href="#" class="hover:underline">Privacy Policy</a>
                <a href="#" class="hover:underline">Terms of Service</a>
                <a href="#" class="hover:underline">Contact Us</a>
            </div>
        </div>

        <!-- Garis horizontal -->
        <hr class="border-t border-gray-600 my-4">

        <div class="max-w-7xl mx-auto flex flex-col md:flex-row text-left text-sm opacity-70 mt-4">
            &copy; 2025 ITQOM. All rights reserved.
        </div>
    </footer>
    <script src="/js/headerfooter.js"></script>

</body>

</html>
