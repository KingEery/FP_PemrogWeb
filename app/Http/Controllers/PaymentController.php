<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use App\Models\CourseDescription;

class PaymentController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');
    }

    public function show($id)
    {
        try {
            $courseDescription = CourseDescription::findOrFail($id);
    
            $order = Order::create([
                'order_id' => 'ORDER-' . time(),
                'total'    => $courseDescription->price,
                'status'   => 'PENDING',
                'course_id' => $id,
            ]);
    
            $params = [
                'transaction_details' => [
                    'order_id'     => $order->order_id,
                    'gross_amount' => $courseDescription->price,
                ],
                'customer_details' => [
                    'first_name' => 'Nama Pembeli',
                    'email'      => 'email@contoh.com',
                    'phone'      => '08123456789',
                ],
                'item_details' => [
                    [
                        'id' => $courseDescription->id,
                        'price' => $courseDescription->price,
                        'quantity' => 1,
                        'name' => $courseDescription->title,
                    ],
                ],
            ];
    
            $snapToken = Snap::getSnapToken($params);
    
            return response()->json(['snapToken' => $snapToken]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Course not found'], 404);
        }
    }

    public function createTransaction(Request $request)
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

        return response()->json([
            'snapToken' => $snapToken,
            'order_id'  => $order->order_id,
        ]);
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'payment_method' => 'required|in:qris,bank_transfer,ewallet',
        ]);

        // Simpan data pembayaran ke database (optional)
        // Payment::create($validated);

        return redirect()->route('payment.show')->with('success', 'Pembayaran berhasil diproses!');
    }
}