@extends('layout.headfoot')

@section('content')
  <section class="min-h-screen text-gray-800 font-sans relative overflow-hidden">
    <!-- Background Layer 1: Base Gradient -->
    <div class="absolute inset-0 z-0">
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 via-purple-900 to-blue-900"></div>
    </div>

    <!-- Background Layer 2: Pattern Overlay -->
    <div class="absolute inset-0 z-0 opacity-5">
    <div class="absolute inset-0"
      style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 24px 24px;">
    </div>
    </div>

    <!-- Background Layer 3: Glow Effect -->
    <div class="absolute inset-0 z-0 pointer-events-none">
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/20 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-500/20 rounded-full filter blur-3xl"></div>
    </div>

    <!-- Content Container with relative positioning -->
    <div class="relative z-10 container mx-auto px-4 py-8 pt-20 flex justify-center">
    <!-- Promo Banner Kiri -->
    <div class="hidden lg:flex flex-col justify-center items-center w-1/5 mr-8">
      <div class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white rounded-xl shadow-lg p-5 text-center">
      <span class="font-bold text-lg flex items-center justify-center gap-2">
        🔥 PROMO GEN Z !<span class="animate-bounce">✨</span>
      </span>
      <p class="text-xs mt-2">Pakai kode <b>NoMoreImmo</b> buat potongan 50%! 🚀</p>
      <p class="text-xs mt-2 text-yellow-200 font-semibold"> Hanya berlaku terbatas, jangan sampai ketinggalan!</p>
      <p class="text-[11px] italic text-white mt-3">"Promonya beneran, aku dapet diskon! 😍" <br>– @Jotaro SamuelEto
      </p>
      </div>
    </div>

    <!-- Checkout Card Tengah -->
    <div class="w-full max-w-md bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-6 md:p-8 mx-auto">
      <!-- Header dengan animasi -->
      <div class="text-center space-y-2">
      <h2 class="text-3xl font-bold text-gray-800 animate-fade-in">Checkout</h2>
      <p class="text-gray-500">Selesaikan pembelianmu</p>
      <div class="h-1 w-20 bg-indigo-600 mx-auto rounded-full"></div>
      </div>

      <!-- Produk dengan hover effect -->
      <div
      class="mt-8 flex items-center space-x-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all duration-300">
      <div class="relative group">
        <img src="https://apiku.duniacoding.id/upload/new-website/1737884596_Square.webp" alt="Product Image"
        class="w-24 h-24 rounded-lg shadow-md group-hover:scale-105 transition-transform duration-300">
        <div
        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 rounded-lg transition-all duration-300">
        </div>
      </div>
      <div>
        <h3 class="text-lg font-semibold text-gray-800">Belajar React JS</h3>
        <p class="text-sm text-gray-500">Dari Dasar hingga Deployment</p>
        <span
        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 mt-2">
        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
          <path
          d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
        </svg>
        Bestseller
        </span>
      </div>
      </div>

      <!-- Add after product section -->
      <div class="mt-4">
      <button class="flex items-center justify-between w-full text-left text-sm text-gray-500 hover:text-gray-700"
        onclick="toggleOrderDetails()">
        <span>Lihat Detail Pesanan</span>
        <svg class="w-4 h-4 transform transition-transform" id="orderDetailArrow" fill="none" stroke="currentColor"
        viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
      <div class="hidden mt-2" id="orderDetails">
        <!-- Order details content -->
        <div class="bg-gray-50 p-3 rounded-lg text-sm">
        <p>• Akses seumur hidup</p>
        <p>• Sertifikat kelulusan</p>
        <p>• Source code project</p>
        <p>• Konsultasi via Discord</p>
        </div>
      </div>
      </div>

      <!-- Gunakan grid md:grid-cols-2 pada container utama -->
      <div class="grid md:grid-cols-2 gap-8">
      <div>
        <!-- Form pembayaran -->
      </div>
      <div class="hidden md:block">
        <!-- Ringkasan pesanan, harga, promo, dll -->
      </div>
      </div>

      <!-- Rincian Harga dengan animasi -->
      <div class="mt-8 space-y-4 bg-gray-50 p-4 rounded-lg">
      <div class="flex justify-between text-gray-600 hover:text-gray-800 transition-colors duration-200">
        <span>Subtotal</span>
        <span>Rp. 200.000</span>
      </div>
      <div class="flex justify-between text-gray-600 hover:text-gray-800 transition-colors duration-200">
        <span>Biaya Layanan</span>
        <span class="text-green-500 font-medium">Gratis</span>
      </div>
      <div class="flex justify-between text-gray-600 hover:text-gray-800 transition-colors duration-200">
        <span>Pajak</span>
        <span id="pajak-checkout">Rp. 2.000</span>
      </div>
      <div class="h-px bg-gray-200"></div>
      <div class="flex items-center space-x-2 mt-4">
        <input id="promo-input" type="text" placeholder="Kode Promo"
        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        <button type="button" id="promo-btn"
        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
        Gunakan
        </button>
      </div>
      <div id="promo-message" class="text-xs mt-2"></div>
      <div class="flex justify-between font-semibold text-gray-800 text-lg">
        <span>Total</span>
        <span id="total-checkout" class="text-indigo-600">Rp. 202.000</span>
      </div>
      </div>

      <!-- Metode Pembayaran yang Ditingkatkan -->
      <div class="mt-8">
      <label class="block text-gray-700 font-medium mb-3">Metode Pembayaran</label>
      <div class="grid grid-cols-3 gap-4">
        <button class="payment-btn group" data-payment="bsi">
        <div
          class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-lg border border-transparent hover:border-indigo-500 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
          <div class="bg-white p-2 rounded-lg shadow-sm">
          <img src="https://th.bing.com/th/id/OIP.5hsSqVFKAk3aZ1qcmpnj0gAAAA" alt="BSI"
            class="h-8 mx-auto object-contain">
          </div>
          <p class="text-xs text-center mt-2 font-medium text-gray-600">BSI</p>
        </div>
        </button>

        <button class="payment-btn group" data-payment="bri">
        <div
          class="bg-gradient-to-br from-red-50 to-red-100 p-4 rounded-lg border border-transparent hover:border-indigo-500 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
          <div class="bg-white p-2 rounded-lg shadow-sm">
          <img src="https://i.pinimg.com/736x/aa/0e/67/aa0e67d2e759af6d677088e9160784d1.jpg" alt="BRI"
            class="h-8 mx-auto object-contain">
          </div>
          <p class="text-xs text-center mt-2 font-medium text-gray-600">BRI</p>
        </div>
        </button>

        <button class="payment-btn group" data-payment="BCA">
        <div
          class="bg-gradient-to-br from-blue-50 to-indigo-100 p-4 rounded-lg border border-transparent hover:border-indigo-500 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
          <div class="bg-white p-2 rounded-lg shadow-sm">
          <img src="image/bca.png" alt="bca" class="h-8 mx-auto object-contain">
          </div>
          <p class="text-xs text-center mt-2 font-medium text-gray-600">BCA</p>
        </div>
        </button>
        <!-- E-Wallet -->
        <button class="payment-btn group" data-payment="ewallet">
        <div
          class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-lg border-2 border-transparent hover:border-indigo-500 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
          <div class="bg-white p-2 rounded-lg shadow-sm flex justify-center">
          <img src="image/e-wallet.png" alt="E-Wallet" class="h-8 object-contain" />
          </div>
          <p class="text-xs text-center mt-2 font-medium text-gray-600">E-Wallet</p>
        </div>
        </button>
        <!-- QRIS -->
        <button class="payment-btn group" data-payment="qris">
        <div
          class="bg-gradient-to-br from-pink-50 to-pink-100 p-4 rounded-lg border-2 border-transparent hover:border-indigo-500 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
          <div class="bg-white p-2 rounded-lg shadow-sm flex justify-center">
          <img src="image/QRIS.png" alt="QRIS" class="h-8 object-contain" />
          </div>
          <p class="text-xs text-center mt-2 font-medium text-gray-600">QRIS</p>
        </div>
        </button>
        <!-- Virtual Account -->
        <button class="payment-btn group" data-payment="bank">
        <div
          class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-lg border-2 border-transparent hover:border-indigo-500 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
          <div class="bg-white p-2 rounded-lg shadow-sm flex justify-center">
          <img src="image/Vacc.png" alt="Virtual Account" class="h-8 object-contain" />
          </div>
          <p class="text-xs text-center mt-2 font-medium text-gray-600">Virtual Account</p>
        </div>
        </button>
      </div>
      </div>

      <!-- Tombol Checkout yang Ditingkatkan -->
      <button id="checkoutButton"
      class="mt-8 w-full bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-medium py-4 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
      <span class="flex items-center justify-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
        Bayar Sekarang
      </span>
      </button>

      <!-- Setelah pembayaran berhasil -->
      <div id="payment-success" class="flex flex-col items-center mt-4 hidden">
      <img src="https://cdn-icons-png.flaticon.com/512/3159/3159066.png" class="w-16 h-16 mb-2" alt="Congrats">
      <span class="text-green-600 font-bold">Selamat! Pembayaran Berhasil 🎉</span>
      </div>

      <!-- Add before security notice -->
      <div class="mt-8 border-t pt-6">
      <p class="text-xs text-center text-gray-500 mb-4">Didukung dan Dipercaya oleh:</p>
      <div class="flex justify-center items-center space-x-6">
        <img src="image/ojk.png" alt="OJK Registered" class="h-8 opacity-75">
      </div>
      </div>

      <!-- Catatan Keamanan yang Ditingkatkan -->
      <div class="mt-6 text-center space-y-2">
      <p class="text-gray-500 text-sm flex items-center justify-center">
        <svg class="w-4 h-4 mr-1 text-green-500" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
          d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
          clip-rule="evenodd" />
        </svg>
        Pembayaran Aman
      </p>
      <div class="flex justify-center space-x-4 text-xs text-gray-400">
        <span>SSL Encryption</span>
        <span>•</span>
        <span>Data Protection</span>
        <span>•</span>
        <span>Secure Checkout</span>
      </div>
      </div>

      <div class="mt-6 text-center text-xs text-gray-500">
      Butuh bantuan? <a href="https://wa.me/6281234567890" class="text-indigo-600 underline">Hubungi Admin</a>
      </div>
    </div>

    <!-- Ilustrasi Edukasi/Animasi Kanan -->
    <div class="hidden lg:flex flex-col justify-center items-center w-1/5 ml-8">
      <img src="image/Pay.svg" alt="Ilustrasi Pembayaran"
      class="w-96 md:w-80 lg:w-[420px] max-w-full h-auto opacity-90 drop-shadow-xl transition-transform duration-300 hover:scale-105">
      <!-- Ganti link gambar di atas sesuai kebutuhan -->
    </div>
    </div>
  </section>

  <script>
    const paymentButtons = document.querySelectorAll('.payment-btn');
    const pajakElement = document.getElementById("pajak-checkout");
    const totalElement = document.getElementById("total-checkout");
    const subtotal = 200000;

    paymentButtons.forEach(button => {
    button.addEventListener('click', () => {
      const metode = button.dataset.payment;

      // Update pajak based on payment method
      let pajak = 0;
      switch (metode) {
      case 'bri':
        pajak = 2000;
        break;
      case 'bsi':
        pajak = 1500;
        break;
      case 'BCA':
        pajak = 2000;
        break;
      case 'ewallet':
        pajak = 1500;
        break;
      case 'qris':
        pajak = 1750;
        break;
      case 'bank':
        pajak = 2000;
        break;
      default:
        pajak = 2000;
      }

      const formatRupiah = (angka) => {
      return 'Rp. ' + angka.toLocaleString('id-ID');
      }

      pajakElement.textContent = formatRupiah(pajak);
      totalElement.textContent = formatRupiah(subtotal + pajak);

      // Update active payment method
      paymentButtons.forEach(btn => {
      btn.classList.remove('border-2', 'border-indigo-500');
      });
      button.classList.add('border-2', 'border-indigo-500');
    });
    });

    // Tambahkan animasi loading saat checkout
    document.getElementById('checkoutButton').addEventListener('click', function () {
    this.disabled = true;
    this.innerHTML = `
    <span class="flex items-center justify-center">
      <svg class="animate-spin h-5 w-5 text-white mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
      Processing...
    </span>
    `;

    // Simulasi proses pembayaran
    setTimeout(() => {
      this.innerHTML = `
    <span class="flex items-center justify-center">
      <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
      </svg>
      Pembayaran Berhasil!
    </span>
    `;

      // Reset button setelah 2 detik
      setTimeout(() => {
      this.disabled = false;
      this.innerHTML = `
    <span class="flex items-center justify-center">
      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
      </svg>
      Bayar Sekarang
    </span>
    `;
      }, 2000);
    }, 2000);
    });

    // Update the selection effect
    paymentButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Remove selected class from all buttons
      paymentButtons.forEach(btn => {
      btn.classList.remove('selected');
      });
      // Add selected class to clicked button
      button.classList.add('selected');

      // ... rest of your payment logic ...
    });
    });

    // Function to toggle order details
    function toggleOrderDetails() {
    const orderDetails = document.getElementById('orderDetails');
    const orderDetailArrow = document.getElementById('orderDetailArrow');
    orderDetails.classList.toggle('hidden');
    orderDetailArrow.classList.toggle('rotate-180');
    }

    // Validasi kode promo
    document.getElementById('promo-btn').onclick = function () {
    const kode = document.getElementById('promo-input').value.trim();
    const msg = document.getElementById('promo-message');
    if (kode === "Honor") {
      msg.textContent = "Kode promo tidak dapat digunakan.";
      msg.className = "text-red-600 text-xs mt-2";
    } else if (kode === "NoMoreImmo") {
      msg.textContent = "Kode promo berhasil digunakan! 🎉";
      msg.className = "text-green-600 text-xs mt-2";
      // Tambahkan logika diskon di sini jika perlu
    } else if (kode === "DISKON") {
      msg.textContent = "Kode promo berhasil digunakan! 🎉";
      msg.className = "text-green-600 text-xs mt-2";
      // Tambahkan logika diskon di sini jika perlu
    } else if (kode === "DISKON20") {
      msg.textContent = "Kode promo berhasil digunakan! 🎉";
      msg.className = "text-green-600 text-xs mt-2";
      // Tambahkan logika diskon di sini jika perlu
    } else if (kode === "DISKON50") {
      msg.textContent = "Kode promo berhasil digunakan! 🎉";
      msg.className = "text-green-600 text-xs mt-2";
      // Tambahkan logika diskon di sini jika perlu
    } else if (kode === "") {
      msg.textContent = "Silakan masukkan kode promo.";
      msg.className = "text-red-600 text-xs mt-2";
    } else {
      msg.textContent = "Kode promo tidak valid.";
      msg.className = "text-red-600 text-xs mt-2";
    }
    };
  </script>

  <!-- Add this style to your existing styles or in a style tag -->
  <style>
    /* Base styles for payment buttons */
    .payment-btn div {
    border: 2px solid transparent;
    transition: all 0.3s ease-in-out;
    }

    /* Selected state */
    .payment-btn.selected div {
    border: 2px solid rgb(99, 102, 241) !important;
    box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.1);
    transform: translateY(-2px);
    }

    /* Hover effects */
    .payment-btn:hover div {
    transform: translateY(-4px);
    box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.1);
    }

    /* Remove unwanted double borders */
    .payment-btn div.border-2,
    .payment-btn div.border {
    border: 2px solid transparent !important;
    }

    /* Other existing styles */
    .backdrop-blur-sm {
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    }

    @keyframes float {

    0%,
    100% {
      transform: translateY(0px);
    }

    50% {
      transform: translateY(-20px);
    }

    .animate-float {
      animation: float 6s ease-in-out infinite;
    }
  </style>
@endsection