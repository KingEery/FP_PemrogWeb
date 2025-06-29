<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Midtrans\Snap;
use Midtrans\Config;
class OrderController extends Controller
{
    public function __construct()
{
    // TES UNTUK MELIHAT APA ISI CONFIG SEBENARNYA

    // Baris di bawah ini tidak akan sempat dijalankan, dan itu tidak apa-apa untuk tes ini
    Config::$serverKey = config('midtrans.serverKey');
    Config::$isProduction = config('midtrans.isProduction');
    Config::$isSanitized = config('midtrans.isSanitized');
    Config::$is3ds = config('midtrans.is3ds');
}
    /**
     * Tampilkan semua order.
     */
    public function index()
    {
        $orders = Order::latest()->get();
        return response()->json($orders);
    }
    
    public function createTransaction(Request $request)
{
    
    $orderId = 'ORDER-' . time();
    $total = 150000; // Ambil dari cart atau input
    
    $params = [
        'transaction_details' => [
            'order_id' => $orderId,
            'gross_amount' => $total,
        ],
        'customer_details' => [
            'first_name' => 'Nama',
            'email' => 'email@contoh.com',
            'phone' => '08123456789',
        ],
    ];

    $snapToken = Snap::getSnapToken($params);

    return view('payment.payment', compact('snapToken', 'orderId'));
}
    
    /**
     * Simpan order baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|unique:orders',
            'total'    => 'required|integer',
            'status'   => 'required|string',
            'user_id'  => 'nullable|integer',
        ]);

        $order = Order::create([
            'order_id' => $request->order_id,
            'total'    => $request->total,
            'status'   => $request->status,
            'user_id'  => $request->user_id,
        ]);

        return response()->json($order, 201);
    }

    /**
     * Tampilkan detail order.
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }

    /**
     * Update order.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update($request->only(['status', 'total']));

        return response()->json($order);
    }

    /**
     * Hapus order.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted']);
    }
}