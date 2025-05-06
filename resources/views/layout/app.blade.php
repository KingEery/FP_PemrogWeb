<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'ITQOM') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
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

</body>
</html>
