<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/course_content.js') }}"></script>
    <title>Belajar Laravel - Materi</title>
</head>

<body class="bg-white">
    <!-- Header -->
    <header class="fixed top-0 left-0 w-full bg-white shadow z-50 border-b border-gray-300">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <h1 class="text-xl font-bold text-gray-800">{{ $courseDescription->title ?? 'Judul Kursus' }}</h1>
        </div>
    </header>

    <!-- Sidebar (Progress & List Materi) -->
    <div class="fixed top-0 left-0 h-full w-72 bg-white pt-20 px-6 pb-20 shadow-lg z-40 hidden md:block">
        <!-- Progress Bar -->
        <div class="w-full py-4">
            <div class="flex justify-between mb-1">
                <span class="text-sm font-medium text-gray-700">Progress</span>
                <span id="progress-text" class="text-sm font-medium text-gray-700">0% selesai</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-3">
                <div id="progress-bar" class="bg-purple-600 h-3 rounded-full transition-all duration-300"
                    style="width: 0%;"></div>
            </div>
        </div>

        <!-- List Materi tanpa dropdown -->
        <div class="mt-8">
            <h2 class="font-bold text-gray-800 text-base mb-4">Materi</h2>
            <ul class="border-l-2 pl-4 text-black text-sm ps-8 space-y-2">
                @foreach ($materis as $materi)
                <li>
                    <button type="button" onclick="showContent('{{ $materi->slug }}')"
                        class="flex items-center gap-2 w-full text-left py-2 hover:underline">
                        <span class="inline-block w-2 h-2 rounded-full bg-gray-400"></span>
                        {{ $materi->judul }}
                    </button>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Mobile List Materi (offcanvas) -->
    <div class="relative z-40 md:hidden" role="dialog" aria-modal="true" id="mobile-menu" style="display: none;">
        <div class="fixed inset-0 bg-black/25" aria-hidden="true" onclick="toggleMobileMenu()"></div>
        <div class="fixed inset-0 z-40 flex">
            <div class="relative ml-auto flex size-full max-w-xs flex-col overflow-y-auto bg-white pb-6 pt-4 shadow-xl">
                <div class="flex items-center justify-between px-4">
                    <h2 class="text-lg font-medium text-gray-900">Materi</h2>
                    <button type="button" class="relative -mr-2 flex size-10 items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-50 focus:outline-none"
                        onclick="toggleMobileMenu()">
                        <span class="sr-only">Close menu</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <ul class="mt-4 px-2 py-3 font-medium text-gray-900 space-y-2">
                    @foreach ($materis as $materi)
                    <li>
                        <button type="button" onclick="showContent('{{ $materi->slug }}'); toggleMobileMenu()"
                            class="block w-full text-left px-2 py-3 hover:underline">
                            {{ $materi->judul }}
                        </button>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Hamburger for mobile -->
    <button class="fixed top-4 right-4 z-50 md:hidden bg-white rounded-full p-2 shadow" onclick="toggleMobileMenu()">
        <svg class="w-7 h-7 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Main Content -->
    <main class="pt-24 md:pl-80 pb-24 px-4 min-h-screen bg-white">
        <div class="max-w-3xl mx-auto border border-gray-300 rounded-lg shadow-lg p-6 bg-white">
            @foreach ($materis as $materi)
            <div id="content-{{ $materi->slug }}" class="materi-content {{ $loop->first ? '' : 'hidden' }}">
                <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">{{ $materi->judul }}</h2>
                <div class="text-justify text-gray-700 leading-relaxed">
                    {!! $materi->konten !!}
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <!-- Navbar di bagian bawah -->
    <div class="fixed bottom-0 left-0 w-full bg-white shadow-inner border-t border-gray-300 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="text-gray-600 text-sm">
                © 2025 Belajar Laravel
            </div>
            <button
                class="flex items-center gap-2 bg-purple-600 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded">
                Lanjutkan
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</body>

</html>
