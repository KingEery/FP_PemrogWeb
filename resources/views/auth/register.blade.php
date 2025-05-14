<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>
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

<body class="min-h-screen flex items-center justify-center bg-gradient-to-b from-primaryDark via-primaryLight to-white p-6">
  <div class="bg-white rounded-2xl shadow-lg flex w-full max-w-4xl overflow-hidden">

    <!-- Form kiri -->
    <div class="w-full md:w-1/2 p-8">
      <h2 class="text-3xl font-bold text-center mb-6 text-primaryDark">Buat Akun ITQOM</h2>

      <form action="{{ url('/register') }}" method="POST" class="space-y-5">
        @csrf
        <div>
          <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Full Name</label>
          <input type="text" name="name" id="name" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primaryDark focus:outline-none">
        </div>

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

        <div>
          <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-700">Confirm Password</label>
          <input type="password" name="password_confirmation" id="password_confirmation" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primaryDark focus:outline-none">
        </div>

        <button type="submit"
          class="w-full bg-primaryDark hover:bg-primaryLight text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
          Register
        </button>
      </form>

      <p class="text-center text-sm text-gray-600 mt-6">
        Already have an account?
        <a href="{{ route('login.form') }}" class="text-primaryDark hover:underline">Login here</a>
      </p>
    </div>

    <!-- Gambar kanan -->
    <div class="hidden md:block w-1/2 bg-primaryLight flex items-center justify-center">
      <div class="text-center">
        <dotlottie-player
          src="https://lottie.host/75527203-b54b-4fb8-b563-ceb48f97aa81/XwGMfC6z0x.lottie"
          background="transparent"
          speed="1"
          style="width: 450px; height: 450px"
          loop
          autoplay
        ></dotlottie-player>

        <p class="mt-4 text-primaryDark font-semibold">Welcome to Our Community!</p>
      </div>
    </div>
  </div>

  <!-- Script Lottie Player -->
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
</body>

</html>
