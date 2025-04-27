<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">
    <h2 class="text-3xl font-bold text-center mb-6">Create Account</h2>

    <form action="#" method="POST" class="space-y-5">
      @csrf
      <div>
        <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" name="name" id="name" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
      </div>

      <div>
        <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email Address</label>
        <input type="email" name="email" id="email" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
      </div>

      <div>
        <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" id="password" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
      </div>

      <div>
        <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-700">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
      </div>

      <button type="submit"
              class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
        Register
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
      Already have an account?
      <a href="/login" class="text-blue-500 hover:underline">Login here</a>
    </p>
  </div>

</body>
</html>
