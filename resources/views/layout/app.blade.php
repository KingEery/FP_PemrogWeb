<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'ITQOM') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#564AB1',
                            dark: '#4739AA',
                            light: '#5e4dc9',
                            lighter: '#f2eeff',
                            lightest: '#f0ebff',
                        },
                        navy: '#051b47',
                    }
                }
            }
        }
    </script>

</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-indigo-700 text-white px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">ITQOM</h1>
        <div class="space-x-4">
            <a href="#home" class="hover:underline">Home</a>
            <a href="#class" class="hover:underline">Class</a>
            <a href="#event" class="hover:underline">Event</a>
            <a href="#course" class="hover:underline">Course</a>
            <a href="#mentoring" class="hover:underline">Mentoring</a>
            <a href="#" class="bg-white text-indigo-700 px-3 py-1 rounded hover:bg-gray-100">Login</a>
        </div>
    </nav>

    <!-- Konten dinamis -->
    <main>
        @yield  ('content')
    </main>
    <footer class="bg-navy text-white px-[5%] py-14 mt-auto">
        <div class="flex flex-wrap gap-12 justify-between">
            <div class="flex-1 max-w-[300px]">
                <div class="mb-6">
                    <div class="flex items-center">
                        <div
                            class="bg-white text-navy w-7 h-7 rounded flex items-center justify-center mr-2.5 font-bold">
                            IT
                        </div>
                        <span class="font-bold text-xl">ITQOM</span>
                    </div>
                </div>
                <div class="mt-4 text-sm opacity-80 leading-relaxed">
                    Jl. Menteng Raya No. 21, Jakarta Pusat, Indonesia 10340
                </div>
                <div class="mt-4 text-sm opacity-80">
                    info@itqom.co.id
                </div>
            </div>
            <div class="min-w-[150px]">
                <h4
                    class="mb-5 text-lg font-semibold relative pb-2.5 after:content-[''] after:absolute after:w-10 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0">
                    Company</h4>
                <ul class="list-none">
                    <li class="mb-3"><a href="#"
                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">About</a>
                    </li>
                    <li class="mb-3"><a href="#"
                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">Contact</a>
                    </li>
                    <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">FAQ</a>
                    </li>
                    <li class="mb-3"><a href="#"
                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">Partners</a></li>
                </ul>
            </div>
            <div class="min-w-[150px]">
                <h4
                    class="mb-5 text-lg font-semibold relative pb-2.5 after:content-[''] after:absolute after:w-10 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0">
                    Our Class</h4>
                <ul class="list-none">
                    <li class="mb-3"><a href="#"
                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">Beginner
                            Class</a></li>
                    <li class="mb-3"><a href="#"
                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">Intermediate Class</a></li>
                    <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Expert
                            Class</a></li>
                    <li class="mb-3"><a href="#"
                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">Bootcamp</a></li>
                </ul>
            </div>
            <div class="min-w-[150px]">
                <h4
                    class="mb-5 text-lg font-semibold relative pb-2.5 after:content-[''] after:absolute after:w-10 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0">
                    Information</h4>
                <ul class="list-none">
                    <li class="mb-3"><a href="#"
                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">Registration</a></li>
                    <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Free
                            Trial
                            Class</a></li>
                    <li class="mb-3"><a href="#"
                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">Teacher</a>
                    </li>
                    <li class="mb-3"><a href="#"
                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">Scholarship</a></li>
                </ul>
            </div>
            <div class="min-w-[150px]">
                <h4
                    class="mb-5 text-lg font-semibold relative pb-2.5 after:content-[''] after:absolute after:w-10 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0">
                    Our Activity</h4>
                <ul class="list-none">
                    <li class="mb-3"><a href="#"
                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">Gallery</a>
                    </li>
                    <li class="mb-3"><a href="#"
                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">Events</a>
                    </li>
                    <li class="mb-3"><a href="#"
                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">Blog</a>
                    </li>
                    <li class="mb-3"><a href="#"
                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">Community</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>

</html>