<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ITQOM header-footer</title>
    {{-- tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css1/home.css" />
    {{-- aos --}}
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    

</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <header>
        <a href="#" class="logo">
          <img src="image/logo.png" alt="Logo" />
        </a>

        <ul class="nav-links">
          <li><a href="/" class="active">Home</a></li>
          <li><a href="/mentoring">Mentoring</a></li>
          <li><a href="/course">Course</a></li>
          <li><a href="/event">Event</a></li>

        </ul>


        <div class="auth-buttons">
            <a href="/login">
                <button class="login">Login</button>
            </a>
            <a href="/register">
                <button class="signup">Sign Up</button>
            </a>
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

</body>

</html>
