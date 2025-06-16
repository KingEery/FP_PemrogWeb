<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="{{ asset('js/course_content.js') }}"></script>
</head>

<body>
    <header class="fixed top-0 left-0 w-full bg-white shadow z-50 border-b border-gray-300">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <h1 class="text-xl font-bold text-gray-800">Belajar Laravel & ReactJS</h1>
            <!-- Hamburger button for mobile -->
            <button class="md:hidden text-2xl text-gray-800" onclick="toggleSidebar()">
                <i class='bx bx-menu'></i>
            </button>
        </div>
    </header>


    <div id="sidebar" class="fixed top-0 right-0 h-[calc(100vh-70px)] w-64 bg-white pt-[68px] p-4 pb-20 shadow-lg space-y-4 z-40 transform translate-x-full md:translate-x-0 transition-transform duration-300 overflow-y-auto">
        <div class="w-full py-4">
            <div class="flex justify-between mb-1">
                <span class="text-sm font-medium text-gray-700">Progress</span>
                <span id="progress-text" class="text-sm font-medium text-gray-700">0% selesai</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-3 dark:bg-gray-300">
                <div id="progress-bar" class="bg-purple-600 h-3 rounded-full transition-all duration-300"
                    style="width: 0%;"></div>
            </div>
        </div>

        <!-- Dropdown 1: Persiapan Belajar -->
        <div>
            <button onclick="toggleDropdown('dropdownMenu1', 'arrowIcon1')"
                class="flex items-center justify-between w-full text-gray-800 font-bold text-base mb-2">
                Persiapan Belajar
                <div class="flex items-center gap-2">
                    <span class="text-sm font-normal text-gray-600">0/6</span>
                    <i id="arrowIcon1" class='bx bx-chevron-down text-2xl transition-transform duration-300'></i>
                </div>
            </button>
            <ul id="dropdownMenu1"
                class="hidden border-l-2 pl-4 text-black text-sm ps-8 space-y-2 transition-all duration-300 overflow-hidden">
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Pendahuluan</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Pengertian</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Manfaat</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Contoh</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Kesimpulan</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Deskripsi</a>
                </li>

            </ul>
        </div>

        <!-- Dropdown 2: Materi Utama -->
        <div>
            <button onclick="toggleDropdown('dropdownMenu2', 'arrowIcon2')"
                class="flex items-center justify-between w-full text-gray-800 font-bold text-base mb-2">
                Materi Utama
                <div class="flex items-center gap-2">
                    <span class="text-sm font-normal text-gray-600">0/7</span>
                    <i id="arrowIcon2" class='bx bx-chevron-down text-2xl transition-transform duration-300'></i>
                </div>
            </button>
            <ul id="dropdownMenu2"
                class="hidden border-l-2 pl-4 text-black text-sm ps-8 space-y-2 transition-all duration-300 overflow-hidden">
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Pengertian Laravel</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Menginstall Laravel</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Membuat Model</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Membuat Controller</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Membuat Route</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Membuat View</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Pembuatan Database</a>
                </li>
            </ul>
        </div>

        <!-- Dropdown 3: Reactjs -->
        <div>
            <button onclick="toggleDropdown('dropdownMenu3', 'arrowIcon3')"
                class="flex items-center justify-between w-full text-gray-800 font-bold text-base mb-2">
                Reactjs
                <div class="flex items-center gap-2">
                    <span class="text-sm font-normal text-gray-600">0/6</span>
                    <i id="arrowIcon1" class='bx bx-chevron-down text-2xl transition-transform duration-300'></i>
                </div>
            </button>
            <ul id="dropdownMenu3"
                class="hidden border-l-2 pl-4 text-black text-sm ps-8 space-y-2 transition-all duration-300 overflow-hidden">
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Pendahuluan</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Pengertian</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Manfaat</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Contoh</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Kesimpulan</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class='bx bx-radio-circle text-gray-500'></i>
                    <a href="#" class="block text-gray-600 font-semibold hover:underline py-2">Deskripsi</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Konten utama -->
    <div class="flex justify-center py-20 px-4">
        <div class="border border-gray-300 rounded-lg shadow-lg p-6 w-full max-w-4xl md:mr-60">
            <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">Pengertian Laravel</h2>
            <div class="text-justify text-gray-700 leading-relaxed">
                <p>
                    Laravel adalah sebuah framework PHP open-source yang dirancang untuk mempermudah proses pengembangan
                    aplikasi web
                    dengan sintaks yang ekspresif dan elegan. Laravel mengikuti pola arsitektur MVC
                    (Model-View-Controller) yang
                    memungkinkan pemisahan logika bisnis dan tampilan antarmuka pengguna.
                </p>
                <br>
                <p>
                    Framework ini menyediakan berbagai fitur penting seperti routing, session, authentication, dan
                    caching, sehingga
                    developer dapat membangun aplikasi secara lebih cepat dan efisien. Selain itu, Laravel juga
                    dilengkapi dengan
                    Eloquent ORM yang memudahkan interaksi dengan database.
                </p>

                <br>
                <p>
                    Laravel juga dilengkapi dengan berbagai tools yang memudahkan pengembangan aplikasi, seperti
                    artisan, composer, dan
                    Laravel Mix. Artisan adalah command-line interface (CLI) yang memungkinkan developer untuk
                    mengelola dan memanipulasi
                    project Laravel. Composer adalah tool yang memungkinkan developer untuk mengelola dependencies
                    project Laravel, sedangkan
                    Laravel Mix adalah tool yang memungkinkan developer untuk mengelola dependencies frontend.
                </p>
                <br>
                <p>
                    Laravel juga dilengkapi dengan berbagai fitur keamanan, seperti filtering, validation, dan
                    authentication. Laravel
                    juga dilengkapi dengan fitur caching yang memungkinkan developer untuk mengoptimalkan
                    performa aplikasi.
                </p>
            </div>
        </div>
    </div>

    <!-- Navbar di bagian bawah -->
    <div class="fixed bottom-0 left-0 w-full bg-white shadow-inner border-t border-gray-300">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="text-gray-600 text-sm">
                © 2025 Belajar Laravel
            </div>
            <button
                class="flex items-center gap-2 bg-purple-600 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded">
                Lanjutkan
                <i class='bx bx-right-arrow-alt text-lg'></i>
            </button>
        </div>
    </div>

</body>

</html>
