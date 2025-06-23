<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Consultant - Mentoring Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Di blade template -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-active {
            background: linear-gradient(135deg,rgb(255, 255, 255) 0%, #ffffff 100%);
            color: white;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .stats-card {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-200 ease-in-out lg:translate-x-0" id="sidebar">
        <div class="flex items-center justify-center h-16 bg-gradient-to-r from-purple-600 to-purple-800">
            <h1 class="text-xl font-bold text-white">Dashboard Consultant</h1>
        </div>

        <nav class="mt-8">
            <a href="#" class="sidebar-menu flex items-center px-6 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600" data-section="dashboard">
                <i class="fas fa-chart-pie w-5 h-5 mr-3"></i>
                Dashboard
            </a>
            <a href="#" class="sidebar-menu flex items-center px-6 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600" data-section="bookings">
                <i class="fas fa-calendar-check w-5 h-5 mr-3"></i>
                Booking & Free Trial
            </a>
            <a href="#" class="sidebar-menu flex items-center px-6 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600" data-section="mentors">
                <i class="fas fa-users w-5 h-5 mr-3"></i>
                Kelola Mentor
            </a>
            <a href="#" class="sidebar-menu flex items-center px-6 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600" data-section="statistics">
                <i class="fas fa-chart-bar w-5 h-5 mr-3"></i>
                Statistik
            </a>
            <a href="#" class="sidebar-menu flex items-center px-6 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600" data-section="profile">
                <i class="fas fa-user-cog w-5 h-5 mr-3"></i>
                Profil
            </a>
        </nav>
    </div>

    <!-- Mobile menu button -->
    <div class="lg:hidden fixed top-4 left-4 z-50">
        <button id="mobile-menu-button" class="bg-white p-2 rounded-md shadow-md">
            <i class="fas fa-bars text-gray-600"></i>
        </button>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-64 min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-900" id="page-title">Dashboard Overview</h2>
                    <div class="flex items-center space-x-4">
    <span class="text-sm text-gray-500">Selamat datang, Admin</span>
    <a href="#" title="Profil">
        <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center">
            <i class="fas fa-user text-white text-sm"></i>
        </div>
    </a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="ml-2 px-3 py-1 rounded bg-red-500 text-white text-sm hover:bg-red-600 transition">
            Logout
        </button>
    </form>
</div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <!-- Dashboard Section -->
            <div id="dashboard-section" class="content-section">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="stats-card p-6 rounded-xl border border-gray-200 card-hover transition-all duration-200">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-calendar-check text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Booking</p>
                                <p class="text-2xl font-bold text-gray-900" id="total-bookings">0</p>
                            </div>
                        </div>
                    </div>

                    <div class="stats-card p-6 rounded-xl border border-gray-200 card-hover transition-all duration-200">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <i class="fas fa-gift text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Free Trial</p>
                                <p class="text-2xl font-bold text-gray-900" id="total-trials">0</p>
                            </div>
                        </div>
                    </div>

                    <div class="stats-card p-6 rounded-xl border border-gray-200 card-hover transition-all duration-200">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Mentor</p>
                                <p class="text-2xl font-bold text-gray-900" id="total-mentors"></p>
                            </div>
                        </div>
                    </div>

                    <div class="stats-card p-6 rounded-xl border border-gray-200 card-hover transition-all duration-200">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <i class="fas fa-money-bill-wave text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Pendapatan</p>
                                <p class="text-2xl font-bold text-gray-900" id="total-revenue">Rp 4.5M</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Pendapatan Bulanan</h3>
                        <canvas id="monthlyRevenueChart"></canvas>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Distribusi Layanan</h3>
                        <canvas id="serviceDistributionChart"></canvas>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Aktivitas Terbaru</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4" id="recent-activities">
                            <!-- Activities will be populated here -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bookings Section -->
            <div id="bookings-section" class="content-section hidden">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900">Data Booking & Free Trial</h3>
                            <div class="flex space-x-2">
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">
                                    <i class="fas fa-download mr-2"></i>Export
                                </button>
                                <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm">
                                    <i class="fas fa-filter mr-2"></i>Filter
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telepon</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="bookings-table-body">
                                <!-- Data will be populated here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Mentors Section -->
            <div id="mentors-section" class="content-section hidden">
                <div class="mb-6">
                    <button id="add-mentor-btn" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 font-medium">
                        <i class="fas fa-plus mr-2"></i>Tambah Mentor
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="mentors-grid">
                    <!-- Mentor cards will be populated here -->
                </div>
            </div>

            <!-- Statistics Section -->
            <div id="statistics-section" class="content-section hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistik Booking per Mentor</h3>
                        <canvas id="mentorBookingChart"></canvas>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Tren Pendaftaran</h3>
                        <canvas id="registrationTrendChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Profile Section -->
            <div id="profile-section" class="content-section hidden">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Pengaturan Profil</h3>
                    </div>
                    <div class="p-6">
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" value="Admin Consultant">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" value="admin@consultant.com">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                                <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">Administrator platform mentoring dengan pengalaman 5+ tahun dalam mengelola program konsultasi dan pengembangan karir.</textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 font-medium">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal untuk Add/Edit Mentor -->
    <div id="mentor-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900" id="mentor-modal-title">Tambah Mentor</h3>
                    <button id="close-mentor-modal" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <form id="mentor-form" class="space-y-6">
                    <input type="hidden" id="mentor-id">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                            <input type="text" id="mentor-name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" id="mentor-email" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Posisi *</label>
                            <input type="text" id="mentor-position" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Perusahaan</label>
                            <input type="text" id="mentor-company" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Spesialisasi *</label>
                        <select id="mentor-specialty" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                            <option value="">Pilih Spesialisasi</option>
                            <option value="Product Management">Product Management</option>
                            <option value="Mobile Development">Mobile Development</option>
                            <option value="Backend Development">Backend Development</option>
                            <option value="Frontend Development">Frontend Development</option>
                            <option value="UI/UX Design">UI/UX Design</option>
                            <option value="Full Stack">Full Stack</option>
                            <option value="Data Science">Data Science</option>
                            <option value="DevOps">DevOps</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                        <textarea id="mentor-bio" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pengalaman (tahun)</label>
                            <input type="number" id="mentor-experience" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                            <select id="mentor-rating" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                <option value="5">⭐⭐⭐⭐⭐ (5.0)</option>
                                <option value="4.5">⭐⭐⭐⭐☆ (4.5)</option>
                                <option value="4">⭐⭐⭐⭐☆ (4.0)</option>
                                <option value="3.5">⭐⭐⭐☆☆ (3.5)</option>
                                <option value="3">⭐⭐⭐☆☆ (3.0)</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" id="cancel-mentor-btn" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
 </html>
 <script src="/js/dashboard_consultant.js" defer></script>
