<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show()
    {
        // Menampilkan halaman form pembayaran
        return view('payment');
    }

    public function process(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'payment_method' => 'required|in:qris,bank_transfer,ewallet',
        ]);

        // Simpan data pembayaran ke database (optional)
        // Payment::create($validated);

        // Sementara kita arahkan ke halaman sukses
        return redirect()->route('payment.show')->with('success', 'Pembayaran berhasil diproses!');
    }
}
