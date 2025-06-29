<?php
namespace App\Services;
use Midtrans\Config;
return [

    /*
    |--------------------------------------------------------------------------
    | Kunci API Midtrans
    |--------------------------------------------------------------------------
    |
    | Kunci ini digunakan untuk otentikasi dengan server Midtrans.
    | Pastikan Anda sudah mengisinya di dalam file .env.
    |
    */

    'serverKey'    => env('MIDTRANS_SERVER_KEY'),
    'clientKey'    => env('MIDTRANS_CLIENT_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Lingkungan Midtrans
    |--------------------------------------------------------------------------
    |
    | Atur ke `true` untuk mode Produksi (transaksi sungguhan) atau biarkan `false`
    | untuk mode Sandbox (lingkungan tes).
    |
    */

    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),

    /*
    |--------------------------------------------------------------------------
    | Fitur Keamanan Tambahan
    |--------------------------------------------------------------------------
    |
    | 'isSanitized' akan membersihkan input dari tag berbahaya (mencegah XSS).
    | 'is3ds' akan mengaktifkan verifikasi 3-D Secure untuk transaksi kartu kredit.
    |
    */

    'isSanitized'  => true,
    'is3ds'        => true,
    
];