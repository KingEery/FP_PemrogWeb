@extends('layout.headfoot')

@section('content')
    <section class="bg-gray-50 min-h-screen text-gray-800 font-sans flex flex-col justify-center items-center">

        <div class="certificate-container bg-white shadow-lg rounded-lg p-10 relative mx-4 max-w-4xl w-full">
            <div class="certificate-border absolute inset-0 border-4 border-purple-800 rounded-lg"></div>
            <div class="certificate-inner-border absolute inset-4 border border-purple-400 rounded-lg"></div>
            <div class="certificate-content relative z-10 text-center">
                <div class="certificate-header flex flex-col items-center mb-10">
                    <div class="logo-container flex flex-col items-center">
                        <img src="{{ asset('image/logo.png') }}" alt="Logo ITQOM" class="logo w-24 h-24 mb-1 mx-auto">
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
                        <p class="text-lg text-gray-700 mb-2">Dengan bangga diberikan kepada:</p>
                        <h2
                            class="recipient-name text-2xl font-bold text-purple-800 border-b-2 border-purple-400 inline-block mt-2 mb-4">
                            {{ Auth::user()->name ?? 'Nama Peserta' }}
                        </h2>
                        <div class="flex justify-center my-4">
                            <span
                                class="course-name font-semibold text-purple-800 text-xl whitespace-nowrap border px-6 py-2 rounded-lg shadow-sm">
                                {{ $program ?? 'Full Stack Web Development' }}
                            </span>
                        </div>
                        <p class="certificate-text text-gray-700 max-w-2xl mx-auto">
                            Atas pencapaian luar biasa dalam menyelesaikan program pembelajaran di atas dengan seluruh
                            kompetensi yang dibutuhkan sesuai standar industri dan telah memenuhi kriteria penilaian ITQOM
                            Technology Education.
                        </p>
                        <p class="completion-date text-gray-600 italic mt-6">
                            Jakarta, {{ \Carbon\Carbon::now()->format('d F Y') }}
                        </p>
                    </div>
                </div>
                <div class="certificate-footer flex justify-between items-center mt-10 px-8">
                    <div class="signature-section text-center w-1/3">
                        <img src="{{ asset('image/signatureS.png') }}" alt="Tanda Tangan"
                            class="signatureS-img w-32 h-24 mx-auto mb-2 object-contain">
                        <p class="signature-name font-bold text-gray-800">Satrio Raja</p>
                        <p class="signature-title text-sm text-gray-600">Chief Executive Officer</p>
                    </div>
                    <div class="qr-section text-center w-1/3">
                        <img src="{{ asset('image/qrcode.png') }}" alt="QR Code"
                            class="qr-code w-28 h-28 mx-auto mb-2 object-contain" title="Scan untuk verifikasi sertifikat">
                        <p class="qr-text text-sm text-gray-600">Scan untuk verifikasi sertifikat</p>
                        <p class="qr-text text-sm text-gray-600">Kode: {{ strtoupper(Str::random(8)) }}</p>
                    </div>
                </div>
                <div class="validity-period text-sm text-gray-600 mt-10 border-t pt-4">
                    Sertifikat ini berlaku selama 3 tahun sejak tanggal penerbitan dan dapat diverifikasi melalui sistem
                    ITQOM Verification.
                </div>
                <div class="actions-container flex justify-center space-x-4 mt-6">
                    <a href="{{ route('certificate.download') }}"
                        class="bg-purple-800 text-white font-bold px-4 py-2 rounded-lg hover:bg-purple-900 transition flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        Unduh Sertifikat
                    </a>
                    <button onclick="window.print()"
                        class="bg-white border border-purple-700 text-purple-700 font-bold px-4 py-2 rounded-lg hover:bg-purple-50 transition flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                                clip-rule="evenodd" />
                        </svg>
                        Cetak Sertifikat
                    </button>
                </div>
            </div>
        </div>

        <!-- Link Kembali alternatif dengan desain menarik di bawah -->
        <div class="mt-8 animate-bounce">
            <a href="{{ route('dashboard') }}"
                class="group inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-purple-600 to-purple-800 text-white font-medium rounded-full hover:from-purple-700 hover:to-purple-900 transition-all shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:-translate-x-1 transition-transform"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Kembali ke Dashboard
            </a>
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
                margin: 0;
                padding: 0;
            }

            .certificate-container {
                box-shadow: none !important;
                width: 100% !important;
                max-width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
                page-break-inside: avoid;
            }

            .certificate-content {
                padding: 30px !important;
            }

            .certificate-header {
                margin-bottom: 20px !important;
            }

            .certificate-footer {
                margin-top: 20px !important;
            }

            .download-button,
            .actions-container,
            .animate-bounce,
            a[href="{{ route('dashboard') }}"] {
                display: none !important;
            }

            section {
                padding: 0 !important;
                margin: 0 !important;
                min-height: auto !important;
                height: auto !important;
            }

            .certificate-border,
            .certificate-inner-border {
                border-width: 1px !important;
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            .logo-container img {
                height: auto !important;
                width: 80px !important;
            }

            .qr-section img,
            .signature-section img {
                height: auto !important;
            }
        }

        /* Memperbaiki logo dan ukuran gambar */
        .logo {
            height: auto !important;
            width: 80px !important;
        }

        .signatureS-img,
        .qr-code {
            object-fit: contain;
        }
    </style>
@endsection