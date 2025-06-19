@extends('layout.headfoot')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-semibold">Nama</label>
            <input type="text" name="name" value="{{ $user->name }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Password Baru (opsional)</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
    </form>
</div>
@endsection
