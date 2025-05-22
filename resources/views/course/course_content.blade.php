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

            <div class="w-full max-w-sm min-w-[200px]">
                <div class="relative">
                    <input
                        class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-28 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                        placeholder="UI Kits, Dashboards..." />
                    <button
                        class="hidden md:flex space-x-4 absolute top-1 right-1 flex items-center rounded bg-purple-600 py-1 px-2.5 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-purple-800 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                clip-rule="evenodd" />
                        </svg>

                        Search
                    </button>
                </div>
            </div>
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