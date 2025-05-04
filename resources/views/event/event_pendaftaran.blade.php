<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
<body>
<header class="bg-primary shadow-md px-[5%] py-5 flex justify-between items-center text-white">
    <div class="text-2xl font-bold flex items-center">
      ITQOM
    </div>
    <nav>
      <ul class="flex">
        <li class="mx-5"><a href="#" class="font-medium hover:text-gray-100 relative pb-1 after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-white after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Home</a></li>
        <li class="mx-5"><a href="#" class="font-medium hover:text-gray-100 relative pb-1 after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-white after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Class</a></li>
        <li class="mx-5"><a href="#" class="font-medium hover:text-gray-100 relative pb-1 after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-white after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Event</a></li>
        <li class="mx-5"><a href="#" class="font-medium hover:text-gray-100 relative pb-1 after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-white after:left-0 after:bottom-0 hover:after:w-full after:transition-all after:duration-300">Mentoring</a></li>
      </ul>
    </nav>
    <div class="flex gap-3">
      <button class="px-5 py-2 rounded border border-white text-white font-medium transition-all duration-300 hover:bg-white/10">Sign Up</button>
      <button class="px-5 py-2 rounded bg-white text-primary-light font-medium transition-all duration-300 hover:bg-gray-100 hover:-translate-y-0.5">Login</button>
    </div>
  </header>



  <footer class="bg-navy text-white px-[5%] py-14 mt-auto">
    <div class="flex flex-wrap gap-12 justify-between">
      <div class="flex-1 max-w-[300px]">
        <div class="mb-6">
          <div class="flex items-center">
            <div class="bg-white text-navy w-7 h-7 rounded flex items-center justify-center mr-2.5 font-bold">IT</div>
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
        <h4 class="mb-5 text-lg font-semibold relative pb-2.5 after:content-[''] after:absolute after:w-10 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0">Company</h4>
        <ul class="list-none">
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">About</a></li>
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Contact</a></li>
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">FAQ</a></li>
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Partners</a></li>
        </ul>
      </div>
      <div class="min-w-[150px]">
        <h4 class="mb-5 text-lg font-semibold relative pb-2.5 after:content-[''] after:absolute after:w-10 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0">Our Class</h4>
        <ul class="list-none">
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Beginner Class</a></li>
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Intermediate Class</a></li>
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Expert Class</a></li>
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Bootcamp</a></li>
        </ul>
      </div>
      <div class="min-w-[150px]">
        <h4 class="mb-5 text-lg font-semibold relative pb-2.5 after:content-[''] after:absolute after:w-10 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0">Information</h4>
        <ul class="list-none">
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Registration</a></li>
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Free Trial Class</a></li>
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Teacher</a></li>
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Scholarship</a></li>
        </ul>
      </div>
      <div class="min-w-[150px]">
        <h4 class="mb-5 text-lg font-semibold relative pb-2.5 after:content-[''] after:absolute after:w-10 after:h-0.5 after:bg-primary-light after:left-0 after:bottom-0">Our Activity</h4>
        <ul class="list-none">
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Gallery</a></li>
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Events</a></li>
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Blog</a></li>
          <li class="mb-3"><a href="#" class="text-sm opacity-80 hover:opacity-100 transition-opacity">Community</a></li>
        </ul>
      </div>
    </div>
  </footer>

</body>
</html>