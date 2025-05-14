@extends('layout.headfoot')

@section('content')
    <section class="bg-gray-50 min-h-screen text-gray-800 font-sans flex justify-center items-center">
        <div class="certificate-container bg-white shadow-lg rounded-lg p-10 relative">
            <div class="certificate-border absolute inset-0 border-4 border-purple-800 rounded-lg"></div>
            <div class="certificate-inner-border absolute inset-4 border border-purple-400 rounded-lg"></div>
            <div class="certificate-content relative z-10 text-center">
                <div class="certificate-header flex justify-between items-center mb-10">
                    <div class="logo-container flex items-center gap-0"> <!--  -->
                        <img src="{{ asset('image/logo.png') }}" alt="Logo ITQOM" class="logo w-50 h-20">
                        <div class="logo-text text-left">
                            <p class="text-lg font-bold text-purple-800">ITQOM</p>
                            <p class="text-sm text-gray-600">EDUCATION</p>
                        </div>
                    </div>
                    <div class="certificate-title text-right">
                        <h1 class="text-3xl font-bold text-purple-800">SERTIFIKAT KOMPETENSI</h1>
                        <h2 class="text-lg text-gray-600">Professional Digital Technology</h2>
                    </div>
                </div>
                <div class="certificate-body mb-10">
                    <div class="certificate-number text-sm text-gray-600 mb-4">
                        Nomor: ITQOM/CERT/{{ strtoupper(Str::random(8)) }}/{{ date('Y') }}
                    </div>
                    <div>
                        <p class="text-lg text-gray-700">Dengan bangga diberikan kepada:</p>
                        <h2 class="recipient-name text-2xl font-bold text-purple-800 border-b-2 border-purple-400 inline-block mt-2 mb-4">
                            Nama Peserta
                        </h2>
                        <p class="certificate-text text-gray-700">
                            Atas pencapaian luar biasa dalam menyelesaikan program pembelajaran
                            <span class="course-name font-semibold text-purple-800">Full Stack Web Development</span>
                            dengan seluruh kompetensi yang dibutuhkan sesuai standar industri
                            dan telah memenuhi kriteria penilaian ITQOM Technology Education.
                        </p>
                        <p class="completion-date text-gray-600 italic mt-6">
                            Jakarta, {{ \Carbon\Carbon::now()->format('d F Y') }}
                        </p>
                    </div>
                </div>
                <div class="certificate-footer flex justify-between items-center mt-10">
                    <div class="signature-section text-center">
                        <img src="{{ asset('image/signatureS.png') }}" alt="Tanda Tangan" class="signatureS-img w-30 h-40 mx-auto mb-2">
                        <p class="signature-name font-bold text-gray-800">Satrio Raja</p>
                        <p class="signature-title text-sm text-gray-600">Chief Executive Officer</p>
                    </div>
                    <div class="qr-section text-center">
                        <img src="{{ asset('image/qrcode.png') }}" alt="QR Code" class="qr-code w-28 h-28 mx-auto mb-2">
                        <p class="qr-text text-sm text-gray-600">Scan untuk verifikasi sertifikat</p>
                        <p class="qr-text text-sm text-gray-600">Kode: {{ strtoupper(Str::random(8)) }}</p>
                    </div>
                </div>
                <div class="validity-period text-sm text-gray-600 mt-10 border-t pt-4">
                    Sertifikat ini berlaku selama 3 tahun sejak tanggal penerbitan dan dapat diverifikasi melalui sistem ITQOM Verification.
                </div>
                <div class="download-button mt-6">
                    <a href="{{ route('certificate.download') }}" class="bg-purple-800 text-white font-bold px-4 py-2 rounded-lg hover:bg-purple-900 transition">
                        Unduh Sertifikat
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection