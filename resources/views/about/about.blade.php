@extends('layout.headfoot')
@section('title', 'About Us')

@section('content')

{{-- SECTION: ABOUT --}}
<div class="container mt-5">
    <h1 class="mb-4">{{ $about->title ?? 'Tentang Kami' }}</h1>
    <p>{{ $about->description ?? 'Deskripsi belum tersedia' }}</p>
</div>

{{-- SECTION: TEAM --}}
<div class="container">
    <h2 class="mt-5 mb-4 text-center">Tim Kami</h2>
    <div class="row">
        @foreach($team as $member)
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 text-center shadow-sm">
                <div class="card-body">

                    <p>DEBUG PHOTO: {{ $member->photo }}</p>

                    {{-- FOTO TIM --}}
                    <img src="{{ asset('storage/' . $member->photo) }}"
                        class="img-thumbnail rounded-circle mb-3"
                        style="width: 100px; height: 100px; object-fit: cover;"
                        alt="{{ $member->name }}">


                    {{-- NAMA --}}
                    <h5 class="card-title">{{ $member->name }}</h5>

                    {{-- SOCIAL --}}
                    <div class="d-flex justify-content-center align-items-center mt-3" style="gap: 10px;">
                        @if($member->github)
                        <a href="{{ $member->github }}" target="_blank" style="display: inline-flex;">
                            <img src="https://cdn-icons-png.flaticon.com/512/25/25231.png"
                                 style="width: 24px; height: 24px;" alt="GitHub">
                        </a>
                        @endif
                        @if($member->instagram)
                        <a href="{{ $member->instagram }}" target="_blank" style="display: inline-flex;">
                            <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png"
                                 style="width: 24px; height: 24px;" alt="Instagram">
                        </a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
