@extends('layout.headfoot')

@section('content')

  <style>
    .badge-animate {
    animation: bounce 1.2s infinite alternate;
    }

    @keyframes bounce {
    to {
      transform: translateY(-6px);
    }
    }

    @keyframes progressBar {
    from {
      width: 0;
    }

    to {
      width: 60%;
    }
    }

    .progress-animate {
    animation: progressBar 1.2s cubic-bezier(.4, 2, .6, 1) forwards;
    }
  </style>

  <section class="bg-gray-50 min-h-screen text-gray-800 font-sans">
    <div class="max-w-3xl mx-auto px-6 pt-24">

    <div class="mb-10">
      <h1 class="text-3xl font-bold text-purple-800">Profil Pengguna</h1>
      <p class="text-gray-600 mt-2">Perbarui informasi akunmu di bawah ini.</p>
    </div>

    {{-- Avatar & Badge --}}
    <div class="flex items-center gap-4 mb-6">
      <img id="avatarPreview" src="{{ asset('image/hajisodikin.jpg') }}" alt="Avatar"
      class="w-16 h-16 rounded-full border-2 border-purple-600 shadow">
      <div>
      <div class="font-bold text-purple-800 text-lg flex items-center gap-2">
        {{ Auth::user()->name ?? 'Unzurna Raja Mid' }}
        <span class="bg-yellow-200 text-yellow-800 text-xs px-2 py-0.5 rounded-full ml-2">Gen Z Squad 🦄</span>
      </div>
      <div class="text-xs text-gray-500 mt-1">Aktif belajar sejak 2024</div>
      <label class="text-purple-600 text-xs hover:underline cursor-pointer">
        Ganti Foto Profil
        <input type="file" id="avatarInput" class="hidden" accept="image/*">
      </label>
      </div>
    </div>

    {{-- Form Profil --}}
    <div class="bg-white shadow rounded-lg p-6 space-y-6">


      {{-- Input Nama --}}
      <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1" for="name">Nama Lengkap</label>
      <input type="text" id="name" name="name" value="Unzurna Raja Mid"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none">
      </div>

      {{-- Input Username --}}
      <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1" for="username">Username</label>
      <input type="text" id="username" name="username" value="KingError"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none">
      </div>

      <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1" for="dob">Tanggal Lahir</label>
      <input type="date" id="dob" name="dob" value="1999-09-19"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none">
      </div>
      {{-- Input Email --}}
      <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1" for="email">Email</label>
      <input type="email" id="email" name="email" value="unzurna@example.com"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none">
      </div>

      {{-- Input Bio --}}
      <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1" for="bio">Bio</label>
      <textarea id="bio" name="bio" rows="2"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none"
        placeholder="Ceritain sedikit tentang dirimu...">Coding enthusiast & Error lover 💀</textarea>
      </div>




      <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Hobi / Interest</label>
      <div class="flex flex-wrap gap-3 mt-1">
        <label class="flex items-center gap-1">
        <input type="checkbox" name="hobi[]" value="Ngoding" checked>
        <span>💻 Ngoding</span>
        </label>
        <label class="flex items-center gap-1">
        <input type="checkbox" name="hobi[]" value="Gaming" checked>
        <span>🎮 Gaming</span>
        </label>
        <label class="flex items-center gap-1">
        <input type="checkbox" name="hobi[]" value="Desain">
        <span>🎨 Desain</span>
        </label>
        <label class="flex items-center gap-1">
        <input type="checkbox" name="hobi[]" value="Nge-vlog">
        <span>📹 Nge-vlog</span>
        </label>
        <label class="flex items-center gap-1">
        <input type="checkbox" name="hobi[]" value="Ngonten" checked>
        <span>📱 Ngonten</span>
        </label>
      </div>
      </div>

      {{-- Koleksi Badge --}}
      <div class="mb-6">
      <label class="block text-sm font-semibold text-gray-700 mb-1">Badge Koleksi</label>
      <div class="flex gap-2 mt-1">
        <span
        class="bg-green-100 text-green-700 px-2 py-0.5 rounded-full text-xs flex items-center gap-1 badge-animate">🔥
        Aktif</span>
        <span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full text-xs flex items-center gap-1">💡 Fast
        Learner</span>
        <span class="bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full text-xs flex items-center gap-1">🏆 Top
        3</span>
      </div>
      </div>

      {{-- Level Progress --}}
      <div class="mb-6">
      <label class="block text-sm font-semibold text-gray-700 mb-1">Level Kamu</label>
      <div class="flex items-center gap-2">
        <span class="font-bold text-purple-700">Level 3</span>
        <div class="w-40 bg-gray-200 h-3 rounded-full">
        <div class="bg-gradient-to-r from-purple-500 to-indigo-500 h-3 rounded-full progress-animate"
          style="width: 60%"></div>
        </div>
        <span class="text-xs text-gray-500">60% ke Level 4</span>
      </div>
      </div>

      @php
    $motivasi = [
      "Setiap error adalah langkah menuju jago! 💪",
      "Belajar hari ini, sukses esok hari 🚀",
      "Jangan takut gagal, Gen Z selalu bangkit! 🔥",
      "Skillmu = aset masa depanmu ✨"
    ];
    $randomMotivasi = $motivasi[array_rand($motivasi)];
    @endphp

      <p class="text-sm text-purple-700 mb-4 italic">"{{ $randomMotivasi }}"</p>

      {{-- Tombol Aksi --}}
      <div class="flex justify-between items-center pt-2">
      <a href="/dashboard" class="text-purple-700 hover:underline">← Kembali ke Dashboard</a>
      <button id="saveBtn" type="button"
        class="bg-purple-800 text-white font-bold px-6 py-2 rounded-lg hover:bg-purple-900 transition flex items-center gap-2">
        <span id="saveBtnText">Simpan Perubahan</span>
        <svg id="saveBtnSpinner" class="hidden animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor"
          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
        </path>
        </svg>
      </button>
      <span id="notifSuccess" class="hidden text-green-600 font-semibold ml-4">✅ Data berhasil disimpan!</span>
      </div>
    </div>

    </div>
  </section>

  <script>
    document.getElementById('saveBtn').onclick = function () {
    document.getElementById('saveBtnSpinner').classList.remove('hidden');
    document.getElementById('saveBtnText').textContent = 'Menyimpan...';
    setTimeout(() => {
      document.getElementById('saveBtnSpinner').classList.add('hidden');
      document.getElementById('saveBtnText').textContent = 'Simpan Perubahan';
      document.getElementById('notifSuccess').classList.remove('hidden');
      setTimeout(() => {
      document.getElementById('notifSuccess').classList.add('hidden');
      }, 2000);
    }, 1500);
    };

    document.getElementById('avatarInput').onchange = function (e) {
    const [file] = e.target.files;
    if (file) {
      document.getElementById('avatarPreview').src = URL.createObjectURL(file);
    }
    };
  </script>

@endsection