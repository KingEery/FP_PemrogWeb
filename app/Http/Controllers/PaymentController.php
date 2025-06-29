<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
class PaymentController extends Controller
{
    public function show()
    {
        $order = Order::create([
            'order_id' => 'ORDER-' . time(),
            'total'    => 150000,
            'status'   => 'PENDING',
        ]);
    
        $params = [
            'transaction_details' => [
                'order_id'     => $order->order_id,
                'gross_amount' => $order->total,
            ],
            'customer_details' => [
                'first_name' => 'Nama Pembeli',
                'email'      => 'email@contoh.com',
                'phone'      => '08123456789',
            ],
        ];
    
        $snapToken = Snap::getSnapToken($params);
    
        return view('payment', compact('snapToken'));
    }

    public function __construct()
{
    Config::$serverKey = config('midtrans.serverKey');
    Config::$isProduction = config('midtrans.isProduction');
    Config::$isSanitized = config('midtrans.isSanitized');
    Config::$is3ds = config('midtrans.is3ds');
} public function createTransaction(Request $request)

{
    // Buat order di database dulu
    $order = Order::create([
        'order_id' => 'ORDER-' . time(),
        'total'    => 150000, // Sesuaikan, bisa dari $request->total
        'status'   => 'PENDING',
    ]);

    $params = [
        'transaction_details' => [
            'order_id'     => $order->order_id,
            'gross_amount' => $order->total,
        ],
        'customer_details' => [
            'first_name' => 'Nama Pembeli',
            'email'      => 'email@contoh.com',
            'phone'      => '08123456789',
        ],
    ];

    $snapToken = Snap::getSnapToken($params);

    return response()->json([
        'snapToken' => $snapToken,
        'order_id'  => $order->order_id,
    ]);
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