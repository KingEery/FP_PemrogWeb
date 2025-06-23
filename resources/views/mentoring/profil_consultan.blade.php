{{-- resources/views/profil_consultan.blade.php - UPDATED dengan dynamic data --}}

@extends('layout.headfoot')

@section('content')
<section class="bg-gray-100 text-textDark leading-relaxed">
    <div class="max-w-screen-xl mx-auto px-4 relative">

        {{-- Success/Error Messages --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row items-start pt-8 gap-4">
            <div class="flex-shrink-0">
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full border-4 border-white bg-gray-100 overflow-hidden flex items-center justify-center">
                    <img src="image/user3.avif" alt="Adithya Firmansyah Putra" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="flex-1 w-full">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                    <div class="flex-1">
                        <h1 class="text-xl sm:text-2xl font-bold mb-1">Adithya Firmansyah Putra</h1>
                        <p class="text-textLight text-sm">Product Engineer at Zero One Group</p>
                        <div class="inline-block bg-amber-100 text-amber-800 text-xs px-3 py-1 rounded-full mt-2">Product Management</div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                        <button class="border border-accent text-accent py-2 px-4 rounded text-sm">Share</button>
                        <div class="flex gap-2 justify-center sm:justify-start">
                            <a href="#" aria-label="Instagram" class="w-8 h-8 rounded-full flex items-center justify-center text-primary bg-gray-100 border border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                </svg>
                            </a>
                            <a href="#" aria-label="LinkedIn" class="w-8 h-8 rounded-full flex items-center justify-center text-primary bg-gray-100 border border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 border-b border-gray-300 overflow-x-auto">
            <ul class="flex whitespace-nowrap">
                <li class="mr-4 sm:mr-6">
                    <a href="#" class="block py-2 text-primary font-medium relative after:content-[''] after:absolute after:bottom-[-1px] after:left-0 after:w-full after:h-0.5 after:bg-primary text-sm">Overview</a>
                </li>
                <li class="mr-4 sm:mr-6">
                    <a href="#" class="block py-2 text-textLight text-sm">Course</a>
                </li>
                <li class="mr-4 sm:mr-6">
                    <a href="#" class="block py-2 text-textLight text-sm">Event</a>
                </li>
                <li class="mr-4 sm:mr-6">
                    <a href="#" class="block py-2 text-textLight text-sm">Portfolio</a>
                </li>
                <li class="mr-4 sm:mr-6">
                    <a href="#" class="block py-2 text-textLight text-sm">Certification</a>
                </li>
            </ul>
        </div>

        <div class="py-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 order-2 lg:order-1">
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold mb-4">About Me</h2>
                        <p class="mb-6 text-sm leading-relaxed">
                            Product Engineer with 5+ years of experience developing apps for finance, e-commerce, and
                            hotel & travel sectors. Skilled in Flutter, Dart, and Kotlin. I excel in teamwork, problem-solving,
                            leadership, and communication. As a freshman at Bina Nusantara University, I am passionate
                            about using technology to make a positive impact on society.
                        </p>
                    </div>

                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold">Experiences</h2>
                            <a href="#" class="text-accent text-sm">View More</a>
                        </div>

                        <div class="space-y-4">
                            <div class="p-4 border border-gray-300 rounded-lg bg-white">
                                <h3 class="font-semibold mb-1 text-sm sm:text-base">iOS Developer</h3>
                                <div class="text-textLight text-sm flex flex-col sm:flex-row sm:items-center mb-1">
                                    <span>Apple Developer Academy</span>
                                    <span class="hidden sm:inline mx-1 text-gray-300">|</span>
                                    <span>Infinite Learning</span>
                                </div>
                                <div class="text-textLight text-xs">Feb 2025 - Sekarang</div>
                            </div>

                            <div class="p-4 border border-gray-300 rounded-lg bg-white">
                                <h3 class="font-semibold mb-1 text-sm sm:text-base">Chief Technology Officer</h3>
                                <div class="text-textLight text-sm mb-1">Jago London</div>
                                <div class="text-textLight text-xs">Jan 2025 - Sekarang</div>
                            </div>

                            <div class="p-4 border border-gray-300 rounded-lg bg-white">
                                <h3 class="font-semibold mb-1 text-sm sm:text-base">Project Manager</h3>
                                <div class="text-textLight text-sm mb-1">Sakuten</div>
                                <div class="text-textLight text-xs">Nov 2024 - Sekarang</div>
                            </div>

                            <div class="p-4 border border-gray-300 rounded-lg bg-white">
                                <h3 class="font-semibold mb-1 text-sm sm:text-base">Founder</h3>
                                <div class="text-textLight text-sm mb-1">Logh</div>
                                <div class="text-textLight text-xs">Okt 2024 - Sekarang</div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold mb-4">Educations</h2>
                        <div class="p-4 border border-gray-300 rounded-lg bg-white flex">
                            <div class="w-12 h-12 bg-gray-100 flex items-center justify-center mr-4 border border-gray-300 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="font-semibold mb-1 text-sm sm:text-base">BINUS University</h2>
                                <p class="text-textLight text-sm mb-1">Computer Science</p>
                                <div class="text-textLight text-xs">2024 - Sekarang</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4">Location</h3>
                        <div class="flex items-center">
                            <div class="w-6 h-6 rounded-full bg-red-100 flex items-center justify-center mr-2 text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                            </div>
                            <div class="text-sm">Jakarta Timur</div>
                        </div>
                    </div>

                    <div class="bg-[#5E50A1] text-white p-6 rounded-lg">
                        <h2 class="text-lg font-semibold mb-4">Booking sesi konsultasimu sekarang!</h2>
                        <p class="text-sm mb-4 leading-relaxed">Kamu dapat melakukan konsultasi secara 1 on 1 bersama mentor berpengalaman.</p>
                        <div class="space-y-2">
                            <button id="bookingBtn" class="bg-white text-[#5E50A1] font-medium py-3 px-4 rounded w-full text-sm">Booking Sekarang</button>
                            <button id="freeTrialBtn" class="bg-transparent border border-white text-white font-medium py-3 px-4 rounded w-full text-sm">Coba Gratis</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- Modal untuk Booking Sekarang --}}
<div id="bookingModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg max-w-md w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Booking Konsultasi</h3>
                <button type="button" id="closeBookingBtn" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                {{-- Biodata Section --}}
                <div class="mb-6">
                    <h4 class="font-medium mb-3 text-gray-900">Biodata Peserta</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap *</label>
                            <input type="text" name="full_name" required value="{{ old('full_name') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="email" required value="{{ old('email') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon *</label>
                            <input type="tel" name="phone" required value="{{ old('phone') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Topik Konsultasi</label>
                            <select name="topic" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent">
                                <option value="">Pilih Topik</option>
                                <option value="product_management" {{ old('topic') == 'product_management' ? 'selected' : '' }}>Product Management</option>
                                <option value="mobile_development" {{ old('topic') == 'mobile_development' ? 'selected' : '' }}>Mobile Development</option>
                                <option value="career_guidance" {{ old('topic') == 'career_guidance' ? 'selected' : '' }}>Career Guidance</option>
                                <option value="Back_End" {{ old('topic') == 'Back_End' ? 'selected' : '' }}>Back-End</option>
                                <option value="Full_Stack" {{ old('topic') == 'Full_Stack' ? 'selected' : '' }}>Full Stack</option>
                                <option value="UI/UX" {{ old('topic') == 'UI/UX' ? 'selected' : '' }}>UI/UX</option>
                                <option value="Front_End" {{ old('topic') == 'Front_End' ? 'selected' : '' }}>Front-End</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Jadwal Section --}}
                <div class="mb-6">
                    <h4 class="font-medium mb-3 text-gray-900">Pilih Jadwal</h4>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal *</label>
                            <input type="date" name="date" required value="{{ old('date') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent" min="{{ date('Y-m-d') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Waktu *</label>
                            <select name="time" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent">
                                <option value="">Pilih Waktu</option>
                                <option value="09:00" {{ old('time') == '09:00' ? 'selected' : '' }}>09:00 - 10:00</option>
                                <option value="10:00" {{ old('time') == '10:00' ? 'selected' : '' }}>10:00 - 11:00</option>
                                <option value="11:00" {{ old('time') == '11:00' ? 'selected' : '' }}>11:00 - 12:00</option>
                                <option value="13:00" {{ old('time') == '13:00' ? 'selected' : '' }}>13:00 - 14:00</option>
                                <option value="14:00" {{ old('time') == '14:00' ? 'selected' : '' }}>14:00 - 15:00</option>
                                <option value="15:00" {{ old('time') == '15:00' ? 'selected' : '' }}>15:00 - 16:00</option>
                                <option value="16:00" {{ old('time') == '16:00' ? 'selected' : '' }}>16:00 - 17:00</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Durasi</label>
                            <select name="duration" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent">
                                <option value="60" {{ old('duration') == '60' ? 'selected' : '' }}>1 Jam (Rp {{ number_format($consultant->hourly_rate ?? 150000) }})</option>
                                <option value="90" {{ old('duration') == '90' ? 'selected' : '' }}>1.5 Jam (Rp {{ number_format(($consultant->hourly_rate ?? 150000) * 1.5) }})</option>
                                <option value="120" {{ old('duration') == '120' ? 'selected' : '' }}>2 Jam (Rp {{ number_format(($consultant->hourly_rate ?? 150000) * 2) }})</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Harga Section --}}
                <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                    <h4 class="font-medium mb-2 text-gray-900">Detail Harga</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span>Konsultasi 1 Jam</span>
                            <span>Rp {{ number_format($consultant->hourly_rate ?? 150000) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Platform Fee</span>
                            <span>Rp 5.000</span>
                        </div>
                        <hr class="my-2">
                        <div class="flex justify-between font-semibold">
                            <span>Total</span>
                            <span id="totalPrice">Rp {{ number_format(($consultant->hourly_rate ?? 150000) + 5000) }}</span>
                        </div>
                    </div>
                </div>

                {{-- Catatan --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Catatan Tambahan</label>
                    <textarea name="notes" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent" placeholder="Jelaskan hal yang ingin dikonsultasikan...">{{ old('notes') }}</textarea>
                </div>

                <input type="hidden" name="mentor_id" value="{{ $consultant->id ?? 1 }}">
                <input type="hidden" name="type" value="paid">

                <div class="flex gap-3">
                    <button type="button" id="cancelBookingBtn" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 px-4 py-2 bg-[#5E50A1] text-white rounded-md hover:bg-[#4A3D8A]">
                        Booking Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal untuk Free Trial --}}
<div id="freeTrialModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg max-w-md w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Free Trial Konsultasi</h3>
                <button type="button" id="closeFreeTrialBtn" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg">
                <p class="text-sm text-green-800">💡 Dapatkan konsultasi gratis 30 menit untuk mengenal lebih dekat!</p>
            </div>

            <form action="{{ route('free-trials.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap *</label>
                        <input type="text" name="full_name" required value="{{ old('full_name') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                        <input type="email" name="email" required value="{{ old('email') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon *</label>
                        <input type="tel" name="phone" required value="{{ old('phone') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Tanggal *</label>
                        <input type="date" name="date" required value="{{ old('date') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent" min="{{ date('Y-m-d') }}">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Waktu *</label>
                        <select name="time" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent">
                            <option value="">Pilih Waktu</option>
                            <option value="09:00" {{ old('time') == '09:00' ? 'selected' : '' }}>09:00 - 09:30</option>
                            <option value="10:00" {{ old('time') == '10:00' ? 'selected' : '' }}>10:00 - 10:30</option>
                            <option value="11:00" {{ old('time') == '11:00' ? 'selected' : '' }}>11:00 - 11:30</option>
                            <option value="13:00" {{ old('time') == '13:00' ? 'selected' : '' }}>13:00 - 13:30</option>
                            <option value="14:00" {{ old('time') == '14:00' ? 'selected' : '' }}>14:00 - 14:30</option>
                            <option value="15:00" {{ old('time') == '15:00' ? 'selected' : '' }}>15:00 - 15:30</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ceritakan tentang dirimu</label>
                        <textarea name="notes" rows="3" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#5E50A1] focus:border-transparent" placeholder="Ceritakan background dan tujuan konsultasi...">{{ old('notes') }}</textarea>
                    </div>
                </div>

                <input type="hidden" name="mentor_id" value="{{ $consultant->id ?? 1 }}">
                <input type="hidden" name="duration" value="30">
                <input type="hidden" name="type" value="free">

                <div class="flex gap-3 mt-6">
                    <button type="button" id="cancelFreeTrialBtn" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                        Daftar Free Trial
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/js/profilconsultant.js" defer></script>
@endsection
