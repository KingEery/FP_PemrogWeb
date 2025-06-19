@extends('layout.headfoot')

@section('content')
<section class="bg-gray-50 min-h-screen text-gray-800 font-sans py-10">
  <div class="max-w-6xl mx-auto px-4">
    <h1 class="text-3xl font-bold text-primaryDark mb-6">Dashboard Admin - Manajemen User</h1>

    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <div class="mb-4 text-right">
      <a href="{{ route('admin.users.create') }}" class="bg-primaryDark hover:bg-primaryLight text-white px-4 py-2 rounded-lg transition">Tambah User</a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-primaryDark text-white">
          <tr>
            <th class="py-3 px-6 text-left">#</th>
            <th class="py-3 px-6 text-left">Nama</th>
            <th class="py-3 px-6 text-left">Email</th>
            <th class="py-3 px-6 text-left">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($users as $user)
            <tr class="border-b">
              <td class="py-3 px-6">{{ $loop->iteration }}</td>
              <td class="py-3 px-6">{{ $user->name }}</td>
              <td class="py-3 px-6">{{ $user->email }}</td>
              <td class="py-3 px-6 space-x-2">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Yakin ingin hapus user ini?')" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center py-4">Tidak ada data user.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
