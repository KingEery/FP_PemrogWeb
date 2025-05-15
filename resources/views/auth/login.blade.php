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

                <dotlottie-player
                src="https://lottie.host/da3cda18-274e-4907-b0c7-710b6d159bf2/I88cIwlTEp.lottie"
                background="transparent"
                speed="1"
                style="width: 450px; height: 450px"
                loop
                autoplay
              ></dotlottie-player>
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
    <script
  src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
  type="module"
></script>
</body>
</html>
