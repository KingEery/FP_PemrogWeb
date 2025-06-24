@extends('layout.headfoot')
@section('title', 'About Us')

@section('content')

{{-- SECTION: ABOUT --}}
<div class="container mt-5">
    @if($about)
    <h1 class="mb-4 text-center">{{ $about->title }}</h1>
    <div class="row">
        <div class="col-md-6">
            <p>{{ $about->description }}</p>
        </div>
        <div class="col-md-6 text-center">
            @if ($about->image)
                <img src="{{ asset('storage/' . $about->image) }}"
                     alt="Tentang Kami"
                     class="img-fluid rounded shadow"
                     style="max-height: 300px; object-fit: cover;">
            @else
                <p><em>Gambar tidak tersedia</em></p>
            @endif
        </div>
    </div>
    @else
    <div class="alert alert-warning text-center">
        <strong>Data About belum tersedia.</strong>
    </div>
    @endif
</div>

{{-- SECTION: TEAM --}}
<div class="container mt-5">
    <h2 class="text-center mb-4">Tim Kami</h2>
    <div class="row justify-content-center">
        @forelse ($team as $member)
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 text-center shadow-sm">
                <div class="card-body">

                    {{-- FOTO TIM --}}
                    @if($member->photo)
                    <img src="{{ asset('storage/' . $member->photo) }}"
     class="img-thumbnail rounded-circle mb-3"
     style="width: 100px; height: 100px; object-fit: cover;"
     alt="{{ $member->name }}">



                    @else
                    <img src="https://via.placeholder.com/100"
                         class="img-thumbnail rounded-circle mb-3"
                         alt="Foto tidak tersedia">
                    @endif

                    {{-- NAMA --}}
                    <h5 class="card-title">{{ $member->name }}</h5>

                    {{-- SOCIAL MEDIA --}}
                    <div class="d-flex justify-content-center align-items-center mt-3" style="gap: 10px;">
                        @if($member->github)
                        <a href="{{ $member->github }}" target="_blank" title="GitHub">
                            <img src="https://cdn-icons-png.flaticon.com/512/25/25231.png"
                                 style="width: 24px; height: 24px;" alt="GitHub">
                        </a>
                        @endif
                        @if($member->instagram)
                        <a href="{{ $member->instagram }}" target="_blank" title="Instagram">
                            <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png"
                                 style="width: 24px; height: 24px;" alt="Instagram">
                        </a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        @empty
        <p class="text-center">Belum ada data tim.</p>
        @endforelse
    </div>
</div>

@endsection
