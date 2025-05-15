@extends('layout.headfoot')

@section('content')
    <section class="bg-gray-50 min-h-screen text-gray-800 font-sans flex justify-center items-center">
        <div class="certificate-container bg-white shadow-lg rounded-lg p-10 relative">
            <div class="certificate-border absolute inset-0 border-4 border-purple-800 rounded-lg"></div>
            <div class="certificate-inner-border absolute inset-4 border border-purple-400 rounded-lg"></div>
            <div class="certificate-content relative z-10 text-center">
                <div class="certificate-header flex flex-col items-center mb-10">
                    <div class="logo-container flex flex-col items-center">
                        <img src="{{ asset('image/logo.png') }}" alt="Logo ITQOM" class="logo w-70 h-0 mb-1 mx-auto">
                        <div class="logo-text text-center mt-1">
                            <p class="text-2xl font-bold text-purple-800 leading-tight tracking-widest">ITQOM</p>
                            <p class="text-sm text-gray-600 -mt-1 tracking-widest">EDUCATION</p>
                        </div>
                    </div>
                    <div class="certificate-title text-center mt-4">
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
                        <h2
                            class="recipient-name text-2xl font-bold text-purple-800 border-b-2 border-purple-400 inline-block mt-2 mb-4">
                            {{ Auth::user()->name ?? 'Nama Peserta' }}
                        </h2>
                        <p class="certificate-text text-gray-700">
                            Atas pencapaian luar biasa dalam menyelesaikan program pembelajaran
                            <span class="course-name font-semibold text-purple-800">
                                {{ $program ?? 'Full Stack Web Development' }}
                            </span>
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
                        <img src="{{ asset('image/signatureS.png') }}" alt="Tanda Tangan"
                            class="signatureS-img w-30 h-40 mx-auto mb-2">
                        <p class="signature-name font-bold text-gray-800">Satrio Raja</p>
                        <p class="signature-title text-sm text-gray-600">Chief Executive Officer</p>
                    </div>
                    <div class="qr-section text-center">
                        <img src="{{ asset('image/qrcode.png') }}" alt="QR Code" class="qr-code w-28 h-28 mx-auto mb-2"
                            title="Scan untuk verifikasi sertifikat">
                        <p class="qr-text text-sm text-gray-600">Scan untuk verifikasi sertifikat</p>
                        <p class="qr-text text-sm text-gray-600">Kode: {{ strtoupper(Str::random(8)) }}</p>
                    </div>
                </div>
                <div class="validity-period text-sm text-gray-600 mt-10 border-t pt-4">
                    Sertifikat ini berlaku selama 3 tahun sejak tanggal penerbitan dan dapat diverifikasi melalui sistem
                    ITQOM Verification.
                </div>
                <div class="download-button mt-6">
                    <a href="{{ route('certificate.download') }}"
                        class="bg-purple-800 text-white font-bold px-4 py-2 rounded-lg hover:bg-purple-900 transition">
                        Unduh Sertifikat
                    </a>
                </div>
                <div class="mt-4 text-center">
                    <button onclick="window.print()"
                        class="bg-white border border-purple-700 text-purple-700 font-bold px-4 py-2 rounded-lg hover:bg-purple-50 transition">Cetak
                        Sertifikat</button>
                </div>
            </div>
        </div>
    </section>
    <div id="confetti" class="pointer-events-none fixed inset-0 z-50"></div>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script>
        window.onload = function () {
            confetti({
                particleCount: 120,
                spread: 90,
                origin: { y: 0.6 }
            });
        };
    </script>
    <style>
        @media print {
            body {
                background: #fff !important;
            }

            .certificate-container {
                box-shadow: none !important;
            }

            .download-button,
            .mt-4.text-center {
                display: none !important;
            }
        }
    </style>
@endsection