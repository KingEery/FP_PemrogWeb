<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primaryDark: '#564AB1',
                        primaryLight: '#B0ABDB',
                    },
                },
            },
        }
    </script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-primaryLight via-white to-primaryDark p-6">
    <div class="bg-white rounded-xl shadow-2xl flex w-full max-w-3xl overflow-hidden">
        <!-- Gambar kiri -->
        <div class="hidden md:flex w-1/2 bg-primaryDark items-center justify-center">
            <div class="text-center">
                <img src="/image/engas.jpg" alt="welcome" class="w-60 h-60 object-cover rounded-lg shadow-md">
                <p class="mt-4 text-white font-semibold">Welcome Back!</p>
            </div>
        </div>

        <!-- Form kanan -->
        <div class="w-full md:w-1/2 p-10">
            <h2 class="text-3xl font-bold text-center mb-6 text-primaryDark">Login to Your Account</h2>

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primaryDark focus:outline-none">
                </div>

                <div>
                    <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primaryDark focus:outline-none">
                </div>

                <button type="submit"
                    class="w-full bg-primaryDark hover:bg-primaryLight text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                    Login
                </button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-6">
                Don't have an account?
                <a href="/register" class="text-primaryDark hover:underline">Register here</a>
            </p>
        </div>
    </div>
</body>
</html>
