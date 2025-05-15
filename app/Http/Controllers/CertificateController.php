<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str; // Tambahkan ini

class CertificateController extends Controller
{
    public function download()
    {
        // Data yang akan ditampilkan di sertifikat
        $data = [
            'name' => 'Nama Peserta',
            'course' => 'Full Stack Web Development',
            'date' => now()->format('d F Y'),
            'code' => strtoupper(Str::random(8)), // Menggunakan Str::random
        ];

        // Render view certificate-pdf.blade.php ke PDF
        $pdf = Pdf::loadView('user.certificate-pdf', $data);

        // Unduh file PDF
        return $pdf->download('sertifikat.pdf');
    }
}
