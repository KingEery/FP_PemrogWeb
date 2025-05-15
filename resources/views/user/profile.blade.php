@extends('layout.headfoot')

@section('content')

<section class="bg-gray-50 min-h-screen text-gray-800 font-sans">
  <div class="max-w-3xl mx-auto px-6 pt-24">

    <div class="mb-10">
      <h1 class="text-3xl font-bold text-purple-800">Profil Pengguna</h1>
      <p class="text-gray-600 mt-2">Perbarui informasi akunmu di bawah ini.</p>
    </div>

    {{-- Form Profil --}}
    <div class="bg-white shadow rounded-lg p-6 space-y-6">

      {{-- Input Nama --}}
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1" for="name">Nama Lengkap</label>
        <input type="text" id="name" name="name" value="Unzurna Raja Mid"
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none">
      </div>

      {{-- Input Email --}}
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1" for="email">Email</label>
        <input type="email" id="email" name="email" value="unzurna@example.com"
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 focus:outline-none">
      </div>

      {{-- Tombol Aksi --}}
      <div class="flex justify-between items-center pt-2">
        <a href="/dashboard" class="text-purple-700 hover:underline">← Kembali ke Dashboard</a>
        <button class="bg-purple-800 text-white font-bold px-6 py-2 rounded-lg hover:bg-purple-900 transition">
          Simpan Perubahan
        </button>
      </div>
    </div>

  </div>
</section>

@endsection
