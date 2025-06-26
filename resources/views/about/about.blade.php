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
<div class="container mt-5">
    <h2 class="text-center mb-4" style="font-weight: bold;">Tim Kami</h2>

    <div class="d-grid" style="
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 50px;
        justify-items: center;
    ">
        @forelse ($team as $member)
        <div class="shadow card" style="
            width: 100%;
            max-width: 260px;
            min-height: 360px;
            border: none;
            border-radius: 20px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s, box-shadow 0.3s;
        " onmouseover="this.style.transform='scale(1.03)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.1)';"
          onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 2px 10px rgba(0,0,0,0.05)';">

            {{-- FOTO TIM --}}
            <img src="{{ asset('storage/' . $member->photo) }}"
                 alt="{{ $member->name }}"
                 style="
                    width: 220px;
                    height: 220px;
                    object-fit: cover;
                    border-radius: 100%;
                    border: 10px solid #f0f0f0;
                    box-shadow: 0 0 10px rgba(0,0,0,0.08);
                    margin-bottom: 16px;
                 ">

            {{-- NAMA --}}
            <h5 style="font-weight: 600; margin-bottom: 8px;">{{ $member->name }}</h5>

            {{-- SOCIAL MEDIA --}}
            <div style="
                display: flex;
                justify-content: center;
                gap: 16px;
                margin-top: auto;
            ">
                @if (!empty($member->github))
                    <a href="{{ $member->github }}" target="_blank" title="GitHub">
                        <img src="https://cdn-icons-png.flaticon.com/512/25/25231.png"
                             style="width: 28px; height: 28px;" alt="GitHub">
                    </a>
                @endif

                @if (!empty($member->instagram))
                    <a href="{{ $member->instagram }}" target="_blank" title="Instagram">
                        <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png"
                             style="width: 28px; height: 28px;" alt="Instagram">
                    </a>
                @endif
            </div>
        </div>
        @empty
        <p class="text-center">Belum ada data tim.</p>
        @endforelse
    </div>
</div>



@endsection
