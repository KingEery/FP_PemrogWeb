@extends('layout.headfoot')

@section('content')
<section class="bg-[#3A2F91] text-white px-[5%] py-25 flex justify-between items-center flex-wrap gap-8">
    <div class="max-w-lg">
        <h1 class="text-4xl font-bold mb-5 leading-tight">{{ $mentoring->title }}</h1>
        <p class="mb-8 opacity-90 text-lg leading-relaxed">{{ $mentoring->short_description }}</p>
        <div class="text-2xl font-bold text-green-300 mb-2 py-2">
            @if($mentoring->discounted_price < $mentoring->original_price)
                <del class="text-gray-300 text-2xl mr-2">Rp {{ number_format($mentoring->original_price, 0, ',', '.') }}</del> 
                Rp {{ number_format($mentoring->discounted_price, 0, ',', '.') }}
            @else
                Rp {{ number_format($mentoring->original_price, 0, ',', '.') }}
            @endif
        </div>
        <div class="flex gap-4">
            <a href="/payment/{{ $mentoring->id }}" class="px-7 py-3 rounded-md bg-white text-[#564AB1] font-medium transition-all duration-300 hover:bg-gray-100 hover:-translate-y-0.5">Daftar Sekarang</a>
        </div>
    </div>
   
    <div class="mt-5 text-center">
        <img class="w-[576px] h-[280px] mx-auto rounded-xl object-cover" src="{{ asset('storage/'.$mentoring->image_path) }}" alt="Mentoring Image" />
    </div>
</section>

<section class="bg-gray-50 text-gray-800 font-sans py-16">
    <div class="max-w-5xl mx-auto p-5">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-purple-800 mb-5">Siapa yang Cocok Mengikuti Program Ini?</h1>
            <p class="text-lg">Program ini dirancang khusus untuk kamu yang ingin mempercepat perjalanan karimu:</p>
        </div>

        @if($mentoring->target_audience)
        <div class="flex flex-col md:flex-row gap-5 mb-10">
            @foreach($mentoring->target_audience as $audience)
            <div class="bg-white rounded-lg p-5 shadow flex-1 flex flex-col">
                <h2 class="text-xl font-bold text-purple-800 mt-0">{{ $audience['item'] }}</h2>
            </div>
            @endforeach
        </div>
        @endif

        <div class="bg-white rounded-lg p-6 shadow mb-8">
            <span class="inline-block bg-purple-800 text-white font-bold px-5 py-2 rounded-full mb-4">Tentang Program</span>
            <h2 class="text-2xl font-bold text-purple-800 mt-2">Apa itu Program "{{ $mentoring->title }}"?</h2>
            <div class="mt-4 leading-relaxed prose">
                {!! $mentoring->about_program !!}
            </div>
        </div>

        <div class="bg-white rounded-lg p-6 shadow mb-8">
            <span class="inline-block bg-purple-800 text-white font-bold px-5 py-2 rounded-full mb-4">Materi</span>
            <h2 class="text-2xl font-bold text-purple-800 mt-2">Materi Apa Saja yang Akan Kamu Pelajari?</h2>
            <p class="mt-4 leading-relaxed">Kurikulum Exclusive Mentoring kami dirancang secara cermat untuk memenuhi kebutuhan industri sambil memastikan kamu mengembangkan keterampilan yang relevan dan praktis.</p>
            <p class="mt-3 leading-relaxed">Kamu akan melalui beberapa fase yang terbagi dalam chapter yang bisa kamu dalami dan mewujudkan materi yang kamu kuasai dengan kebutuhanmu, seperti portofolio dalam kurun {{ $mentoring->duration_months }} bulan penuhmu.</p>
            
            <div class="mt-6 pl-5">
                @if($mentoring->basic_materials)
                <h3 class="text-xl font-bold text-purple-800">Materi Dasar:</h3>
                <ul class="list-disc pl-5 mt-3 space-y-2">
                    @foreach($mentoring->basic_materials as $material)
                    <li>{{ $material['item'] }}</li>
                    @endforeach
                </ul>
                @endif
                
                @if($mentoring->intermediate_materials)
                <h3 class="text-xl font-bold text-purple-800 mt-6">Materi Menengah:</h3>
                <ul class="list-disc pl-5 mt-3 space-y-2">
                    @foreach($mentoring->intermediate_materials as $material)
                    <li>{{ $material['item'] }}</li>
                    @endforeach
                </ul>
                @endif
                
                @if($mentoring->advanced_materials)
                <h3 class="text-xl font-bold text-purple-800 mt-6">Materi Lanjutan:</h3>
                <ul class="list-disc pl-5 mt-3 space-y-2">
                    @foreach($mentoring->advanced_materials as $material)
                    <li>{{ $material['item'] }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        
        @if($mentoring->benefits)
        <div class="bg-white rounded-lg p-6 shadow mb-8">
            <h2 class="text-2xl font-bold text-purple-800">Manfaat Program</h2>
            <ul class="list-disc pl-8 mt-4 space-y-2">
                @foreach($mentoring->benefits as $benefit)
                <li>{{ $benefit['item'] }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <div class="bg-white rounded-lg p-6 shadow mb-8">
            <h2 class="text-2xl font-bold text-purple-800">Daftar Sekarang</h2>
            <p class="mt-4">Tempat terbatas! Kami hanya menerima {{ $mentoring->max_participants }} peserta per batch untuk memastikan kualitas mentoring.</p>
            <a href="/payment/{{ $mentoring->id }}" class="bg-purple-800 text-white font-bold px-5 py-2 rounded-full inline-block mt-4 cursor-pointer hover:bg-purple-900 transition-colors">Daftar Program</a>
        </div>
    </div>
</section>
@endsection