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
      width: {{ $profile->progress ?? 60 }}%;
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

    {{-- Form untuk submit data --}}
    <form id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      {{-- Avatar & Badge --}}
      <div class="flex items-center gap-4 mb-6">
        <img id="avatarPreview" 
             src="{{ $profile->avatar ? asset('storage/'.$profile->avatar) : asset('image/hajisodikin.jpg') }}" 
             alt="Avatar"
             class="w-16 h-16 rounded-full border-2 border-purple-600 shadow object-cover">
        <div>
          <div class="font-bold text-purple-800 text-lg flex items-center gap-2">
            {{ $profile->fullname ?? $user->name ?? 'User' }}
            <span class="bg-yellow-200 text-yellow-800 text-xs px-2 py-0.5 rounded-full ml-2">Gen Z Squad 🦄</span>
          </div>
          <div class="text-xs text-gray-500 mt-1">Aktif belajar sejak {{ $user->created_at->format('Y') }}</div>
          <label class="text-purple-600 text-xs hover:underline cursor-pointer">
            Ganti Foto Profil
            <input type="file" id="avatarInput" name="avatar" class="hidden" accept="image/*">
          </label>
        </div>
      </div>

      {{-- Form Profil --}}
      <div class="bg-white shadow rounded-lg p-6 space-y-6">

        {{-- Input Nama --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1" for="fullname">Nama Lengkap</label>
          <input type="text" id="fullname" name="fullname" 
                 value="{{ old('fullname', $profile->fullname ?? $user->name) }}"
                 class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none" required>
        </div>

        {{-- Input Username --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1" for="username">Username</label>
          <input type="text" id="username" name="username" 
                 value="{{ old('username', $profile->username ?? '') }}"
                 class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1" for="dob">Tanggal Lahir</label>
          <input type="date" id="dob" name="dob" 
                 value="{{ old('dob', $profile->dob) }}"
                 class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none">
        </div>

        {{-- Input Email --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1" for="email">Email</label>
          <input type="email" id="email" name="email" 
                 value="{{ old('email', $profile->email ?? $user->email) }}"
                 class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none" required>
        </div>

        {{-- Input Bio --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1" for="bio">Bio</label>
          <textarea id="bio" name="bio" rows="2"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none"
                    placeholder="Ceritain sedikit tentang dirimu...">{{ old('bio', $profile->bio ?? 'Coding enthusiast & Error lover 💀') }}</textarea>
        </div>

        {{-- Hobi / Interest --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">Hobi / Interest</label>
          <div class="flex flex-wrap gap-3 mt-1">
            @php
              $userHobbies = $profile->hobbies ? json_decode($profile->hobbies, true) : ['Ngoding', 'Gaming', 'Ngonten'];
              $availableHobbies = [
                'Ngoding' => '💻 Ngoding',
                'Gaming' => '🎮 Gaming', 
                'Desain' => '🎨 Desain',
                'Nge-vlog' => '📹 Nge-vlog',
                'Ngonten' => '📱 Ngonten'
              ];
            @endphp
            
            @foreach($availableHobbies as $value => $label)
            <label class="flex items-center gap-1">
              <input type="checkbox" name="hobbies[]" value="{{ $value }}" 
                     {{ in_array($value, $userHobbies) ? 'checked' : '' }}>
              <span>{{ $label }}</span>
            </label>
            @endforeach
          </div>
        </div>

        {{-- Koleksi Badge --}}
        <div class="mb-6">
          <label class="block text-sm font-semibold text-gray-700 mb-1">Badge Koleksi</label>
          <div class="flex gap-2 mt-1">
            <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded-full text-xs flex items-center gap-1 badge-animate">🔥 Aktif</span>
            <span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full text-xs flex items-center gap-1">💡 Fast Learner</span>
            <span class="bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full text-xs flex items-center gap-1">🏆 Top 3</span>
          </div>
        </div>

        {{-- Level Progress --}}
        <div class="mb-6">
          <label class="block text-sm font-semibold text-gray-700 mb-1">Level Kamu</label>
          <div class="flex items-center gap-2">
            <span class="font-bold text-purple-700">Level {{ $profile->level ?? 3 }}</span>
            <div class="w-40 bg-gray-200 h-3 rounded-full">
              <div class="bg-gradient-to-r from-purple-500 to-indigo-500 h-3 rounded-full progress-animate"
                   style="width: {{ $profile->progress ?? 60 }}%"></div>
            </div>
            <span class="text-xs text-gray-500">{{ $profile->progress ?? 60 }}% ke Level {{ ($profile->level ?? 3) + 1 }}</span>
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
          <button id="saveBtn" type="submit"
                  class="bg-purple-800 text-white font-bold px-6 py-2 rounded-lg hover:bg-purple-900 transition flex items-center gap-2">
            <span id="saveBtnText">Simpan Perubahan</span>
            <svg id="saveBtnSpinner" class="hidden animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
              </path>
            </svg>
          </button>
        </div>
        
        <div id="notifSuccess" class="hidden mt-4 p-3 bg-green-100 text-green-700 rounded-lg">
          ✅ Data berhasil disimpan!
        </div>
        
        <div id="notifError" class="hidden mt-4 p-3 bg-red-100 text-red-700 rounded-lg">
          ❌ Terjadi kesalahan saat menyimpan data.
        </div>
      </div>
    </form>

    </div>
  </section>

  <script>
    // Handle form submission via AJAX
    document.getElementById('profileForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const saveBtn = document.getElementById('saveBtn');
      const saveBtnText = document.getElementById('saveBtnText');
      const saveBtnSpinner = document.getElementById('saveBtnSpinner');
      const notifSuccess = document.getElementById('notifSuccess');
      const notifError = document.getElementById('notifError');
      
      // Show loading state
      saveBtnSpinner.classList.remove('hidden');
      saveBtnText.textContent = 'Menyimpan...';
      saveBtn.disabled = true;
      
      // Hide previous notifications
      notifSuccess.classList.add('hidden');
      notifError.classList.add('hidden');
      
      const formData = new FormData(this);
      
      fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          notifSuccess.classList.remove('hidden');
          
          // Update avatar preview if new avatar was uploaded
          if (data.avatar_url) {
            document.getElementById('avatarPreview').src = data.avatar_url;
          }
          
          setTimeout(() => {
            notifSuccess.classList.add('hidden');
          }, 3000);
        } else {
          notifError.classList.remove('hidden');
          notifError.textContent = data.message || 'Terjadi kesalahan saat menyimpan data.';
        }
      })
      .catch(error => {
        console.error('Error:', error);
        notifError.classList.remove('hidden');
        notifError.textContent = 'Terjadi kesalahan jaringan.';
      })
      .finally(() => {
        // Reset button state
        saveBtnSpinner.classList.add('hidden');
        saveBtnText.textContent = 'Simpan Perubahan';
        saveBtn.disabled = false;
      });
    });

    // Handle avatar preview
    document.getElementById('avatarInput').addEventListener('change', function(e) {
      const [file] = e.target.files;
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('avatarPreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    });
  </script>

@endsection