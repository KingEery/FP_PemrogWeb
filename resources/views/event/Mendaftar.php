@extends('layout.headfoot')

@section('content')
<section class="bg-gray-100 py-8">
    <div class="max-w-2xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6">
            <h1 class="text-2xl font-bold mb-6">Pendaftaran: {{ $event->title }}</h1>
            
            <form method="POST" action="#">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-1">Nama Lengkap</label>
                        <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg" required>
                    </div>
                    <div>
                        <label class="block mb-1">Email</label>
                        <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg" required>
                    </div>
                </div>
                
                <div class="mb-6">
                    <button type="submit" class="bg-[#564AB1] text-white px-6 py-2 rounded-lg w-full">
                        Submit Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection