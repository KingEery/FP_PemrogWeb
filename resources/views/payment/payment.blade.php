@extends('layout.headfoot')

@section('content')

  <div class="container mx-auto px-4">
    <h1 class="text-2xl font-semibold mb-4">Keranjang Belanja</h1>
    <div class="flex flex-col md:flex-row gap-4">

      <!-- Produk Section -->
      <div class="md:w-3/4 w-full">
        <div class="bg-white rounded-lg shadow-md p-10 mb-7 space-y-4">
          <div class="flex flex-col sm:flex-row items-center sm:items-start sm:justify-between gap-10 border-b pb-20">
            <div class="flex items-center w-full sm:w-1/2">
              <img class="h-16 w-16 mr-4 object-cover"
                src="https://apiku.duniacoding.id/upload/new-website/1737884596_Square.webp"
                alt="Product image" />
              <span class="font-semibold break-words">Belajar React JS dari Dasar hingga Siap Deployment
                Project Sendiri</span>
            </div>
            <div class="text-right sm:text-right w-full sm:w-1/4">
              <div class="text-sm text-gray-500">Subtotal</div>
              <div class="text-base font-medium">Rp. 200.000</div>
            </div>
            <div class="w-full sm:w-1/6 text-right sm:text-right">
              <div class="text-sm text-gray-500">Pajak</div>
              <span id="pajak-value" class="mb-2">Rp. 2.000</span>
            </div>
            <div class="text-right sm:text-right w-full sm:w-1/6">
              <div class="text-sm text-gray-500">Total</div>
              <div id="total-value" class="text-base font-medium">Rp. 202.000</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Ringkasan Section -->
      <div class="md:w-1/4 w-full">
        <div class="bg-white rounded-lg shadow-md p-6">
          <h2 class="text-lg font-semibold mb-4">Ringkasan</h2>
          <div class="flex justify-between mb-2 text-sm">
            <span>Subtotal</span>
            <span>Rp. 200.000</span>
          </div>
          <div class="flex justify-between mb-2 text-sm">
            <span>Biaya Layanan</span>
            <span class="text-green-500">Free</span>
          </div>
          <div class="flex justify-between mb-2 text-sm">
            <span>Pajak</span>
            <span id="pajak-ringkasan">Rp. 2.000</span>
          </div>

          <!-- Metode Pembayaran -->
          <div class="mt-6">
            <label class="block text-gray-700 font-medium mb-2">Metode Pembayaran</label>
            <div class="flex items-center space-x-3">
              <button class="flex-1 bg-gray-100 hover:bg-gray-200 transition p-3 rounded-lg payment-btn"
                data-payment="bsi">
                <img src="https://th.bing.com/th/id/OIP.5hsSqVFKAk3aZ1qcmpnj0gAAAA" alt="BSI" class="h-6 mx-auto">
              </button>
              <button class="flex-1 bg-gray-100 hover:bg-gray-200 transition p-3 rounded-lg payment-btn"
                data-payment="dana">
                <img src="https://i.pinimg.com/originals/06/9a/8a/069a8aa0667df68e2daf0e14c41ed0d2.jpg" alt="Dana" class="h-6 mx-auto">
              </button>
              <button class="flex-1 bg-gray-100 hover:bg-gray-200 transition p-3 rounded-lg payment-btn"
                data-payment="bri">
                <img src="https://i.pinimg.com/736x/aa/0e/67/aa0e67d2e759af6d677088e9160784d1.jpg" alt="BRI" class="h-6 mx-auto">
              </button>
            </div>
          </div>

          <hr class="my-2" />
          <div class="flex justify-between mb-2 font-semibold">
            <span>Total</span>
            <span id="total-ringkasan">Rp. 202.000</span>
          </div>
          <button
            class="bg-[#7C72C3] text-white py-2 px-4 hover:bg-[#6c5ecf] rounded-lg mt-4 w-full">Checkout</button>
        </div>
      </div>
    </div>
  </div>

  <script>
  const pajakElement = document.getElementById("pajak-value");
  const pajakRingkasan = document.getElementById("pajak-ringkasan");
  const totalElement = document.getElementById("total-value");
  const totalRingkasan = document.getElementById("total-ringkasan");
  const subtotal = 200000;

  const paymentButtons = document.querySelectorAll('.payment-btn');

  paymentButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Ambil metode pembayaran
      const metode = button.dataset.payment;

      // Hitung pajak
      let pajak = metode === 'bri' ? 2000 : 0;

      // Format angka ke Rupiah
      const formatRupiah = (angka) => {
        return 'Rp. ' + angka.toLocaleString('id-ID');
      }

      // Update tampilan
      pajakElement.textContent = formatRupiah(pajak);
      pajakRingkasan.textContent = formatRupiah(pajak);
      totalElement.textContent = formatRupiah(subtotal + pajak);
      totalRingkasan.textContent = formatRupiah(subtotal + pajak);

      // Tambahkan border aktif ke tombol terpilih
      paymentButtons.forEach(btn => {
        btn.classList.remove('border-2', 'border-blue-500');
      });
      button.classList.add('border-2', 'border-blue-500');
    });
  });
</script>

