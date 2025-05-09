@extends('layout.headfoot')

@section('content')
<div class="max-w-3xl mx-auto py-16 px-4">
    <h1 class="text-2xl font-bold mb-6">Pembayaran Kelas</h1>
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('payment.process') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded px-4 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded px-4 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Pilih Kelas</label>
                <select name="class" class="w-full border border-gray-300 rounded px-4 py-2" required>
                    <option value="">-- Pilih --</option>
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="expert">Expert</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Metode Pembayaran</label>
                <select name="payment_method" class="w-full border border-gray-300 rounded px-4 py-2" required>
                    <option value="transfer">Transfer Bank</option>
                    <option value="qris">QRIS</option>
                    <option value="ewallet">E-Wallet</option>
                </select>
            </div>

            <button type="submit" class="bg-primary text-white font-semibold px-6 py-2 rounded hover:bg-primary-dark">
                Bayar Sekarang
            </button>
        </form>
    </div>
</div>
@endsection
