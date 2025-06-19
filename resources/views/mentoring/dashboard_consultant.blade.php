<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Consultant - Mentoring Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                        <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
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
                                <p class="text-2xl font-bold text-gray-900" id="total-mentors">12</p>
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

    <script>
        // Sample data - in real app, this would come from API
        const mockBookings = [
            {
                id: 1,
                full_name: "Ahmad Rizki",
                email: "ahmad@email.com",
                phone: "081234567890",
                date: "2025-06-20",
                time: "09:00",
                type: "paid",
                status: "confirmed",
                topic: "Product Management",
                amount: 155000
            },
            {
                id: 2,
                full_name: "Sari Dewi",
                email: "sari@email.com",
                phone: "081234567891",
                date: "2025-06-21",
                time: "10:00",
                type: "free",
                status: "pending",
                topic: "Career Guidance",
                amount: 0
            },
            {
                id: 3,
                full_name: "Budi Santoso",
                email: "budi@email.com",
                phone: "081234567892",
                date: "2025-06-22",
                time: "14:00",
                type: "paid",
                status: "completed",
                topic: "Mobile Development",
                amount: 205000
            }
        ];

        const mockMentors = [
            {
                id: 1,
                name: "Adithya Firmansyah Putra",
                email: "adithya@email.com",
                position: "Product Engineer",
                company: "Zero One Group",
                specialty: "Product Management",
                bio: "Product Engineer with 5+ years of experience developing apps for finance, e-commerce, and hotel & travel sectors.",
                experience: 5,
                rating: 4.8
            },
            {
                id: 2,
                name: "Sarah Johnson",
                email: "sarah@email.com",
                position: "Senior UI/UX Designer",
                company: "Tech Corp",
                specialty: "UI/UX Design",
                bio: "Passionate UX designer with expertise in user research and interface design.",
                experience: 7,
                rating: 4.9
            }
        ];

        // Navigation
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebar = document.getElementById('sidebar');

            mobileMenuButton.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
            });

            // Sidebar navigation
            const sidebarMenus = document.querySelectorAll('.sidebar-menu');
            const contentSections = document.querySelectorAll('.content-section');
            const pageTitle = document.getElementById('page-title');

            sidebarMenus.forEach(menu => {
                menu.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove active class from all menus
                    sidebarMenus.forEach(m => m.classList.remove('sidebar-active'));
                    // Add active class to clicked menu
                    this.classList.add('sidebar-active');

                    // Hide all sections
                    contentSections.forEach(section => section.classList.add('hidden'));

                    // Show selected section
                    const sectionName = this.getAttribute('data-section');
                    const targetSection = document.getElementById(`${sectionName}-section`);
                    if (targetSection) {
                        targetSection.classList.remove('hidden');
                    }

                    // Update page title
                    const titles = {
                        'dashboard': 'Dashboard Overview',
                        'bookings': 'Booking & Free Trial',
                        'mentors': 'Kelola Mentor',
                        'statistics': 'Statistik',
                        'profile': 'Pengaturan Profil'
                    };
                    pageTitle.textContent = titles[sectionName] || 'Dashboard';

                    // Close mobile menu
                    if (window.innerWidth < 1024) {
                        sidebar.classList.add('-translate-x-full');
                    }
                });
            });

            // Set default active menu
            sidebarMenus[0].classList.add('sidebar-active');

            // Initialize dashboard
            initializeDashboard();
            loadBookings();
            loadMentors();
            setupMentorModal();
        });

        function initializeDashboard() {
            // Update stats
            document.getElementById('total-bookings').textContent = mockBookings.length;
            document.getElementById('total-trials').textContent = mockBookings.filter(b => b.type === 'free').length;

            const totalRevenue = mockBookings.reduce((sum, booking) => sum + booking.amount, 0);
            document.getElementById('total-revenue').textContent = `Rp ${(totalRevenue / 1000000).toFixed(1)}M`;

            // Load recent activities
            loadRecentActivities();

            // Initialize charts
            initializeCharts();
        }

        function loadRecentActivities() {
            const activitiesContainer = document.getElementById('recent-activities');
            const activities = [
                { icon: 'fas fa-calendar-plus', text: 'Booking baru dari Ahmad Rizki', time: '2 jam yang lalu', color: 'text-blue-600' },
                { icon: 'fas fa-user-check', text: 'Free trial dikonfirmasi untuk Sari Dewi', time: '4 jam yang lalu', color: 'text-green-600' },
                { icon: 'fas fa-star', text: 'Review 5 bintang dari Budi Santoso', time: '6 jam yang lalu', color: 'text-yellow-600' },
                { icon: 'fas fa-user-plus', text: 'Mentor baru ditambahkan: Sarah Johnson', time: '1 hari yang lalu', color: 'text-purple-600' }
            ];

            activitiesContainer.innerHTML = activities.map(activity => `
                <div class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                    <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                        <i class="${activity.icon} text-sm ${activity.color}"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-900">${activity.text}</p>
                        <p class="text-xs text-gray-500">${activity.time}</p>
                    </div>
                </div>
            `).join('');
        }

        function initializeCharts() {
            // Monthly Revenue Chart
            const monthlyRevenueCtx = document.getElementById('monthlyRevenueChart').getContext('2d');
            new Chart(monthlyRevenueCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Pendapatan (Rp)',
                        data: [2500000, 3200000, 2800000, 4100000, 3800000, 4500000],
                        borderColor: '#8B5CF6',
                        backgroundColor: 'rgba(139, 92, 246, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + (value / 1000000).toFixed(1) + 'M';
                                }
                            }
                        }
                    }
                }
            });

            // Service Distribution Chart
           // Service Distribution Chart (melanjutkan dari yang terpotong)
            const serviceDistributionCtx = document.getElementById('serviceDistributionChart').getContext('2d');
            new Chart(serviceDistributionCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Product Management', 'Mobile Development', 'UI/UX Design', 'Backend Development', 'Data Science'],
                    datasets: [{
                        data: [35, 25, 20, 15, 5],
                        backgroundColor: [
                            '#8B5CF6',
                            '#06B6D4',
                            '#10B981',
                            '#F59E0B',
                            '#EF4444'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true
                            }
                        }
                    }
                }
            });

            // Mentor Booking Chart
            const mentorBookingCtx = document.getElementById('mentorBookingChart');
            if (mentorBookingCtx) {
                new Chart(mentorBookingCtx.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: ['Adithya F.', 'Sarah J.', 'Rizki A.', 'Maya S.', 'Budi P.'],
                        datasets: [{
                            label: 'Jumlah Booking',
                            data: [12, 8, 6, 4, 3],
                            backgroundColor: '#8B5CF6',
                            borderRadius: 8
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // Registration Trend Chart
            const registrationTrendCtx = document.getElementById('registrationTrendChart');
            if (registrationTrendCtx) {
                new Chart(registrationTrendCtx.getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                        datasets: [{
                            label: 'Pendaftaran Baru',
                            data: [15, 22, 18, 25],
                            borderColor: '#10B981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        }

        function loadBookings() {
            const tableBody = document.getElementById('bookings-table-body');

            tableBody.innerHTML = mockBookings.map(booking =>`
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${booking.full_name}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${booking.email}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${booking.phone}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${booking.date}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${booking.time}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${booking.type === 'free' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800'}">
                            ${booking.type === 'free' ? 'Free Trial' : 'Paid'}
                        </span>
                    </td>
                    <td class ="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${getStatusClass(booking.status)}">
                            ${getStatusText(booking.status)}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button class="text-indigo-600 hover:text-indigo-900 mr-3" onclick="viewBookingDetails(${booking.id})">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="text-green-600 hover:text-green-900 mr-3" onclick="updateBookingStatus(${booking.id}, 'confirmed')">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-900" onclick="cancelBooking(${booking.id})">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        function getStatusClass(status) {
            switch (status) {
                case 'confirmed': return 'bg-green-100 text-green-800';
                case 'pending': return 'bg-yellow-100 text-yellow-800';
                case 'completed': return 'bg-blue-100 text-blue-800';
                case 'cancelled': return 'bg-red-100 text-red-800';
                default: return 'bg-gray-100 text-gray-800';
            }
        }

        function getStatusText(status) {
            switch (status) {
                case 'confirmed': return 'Dikonfirmasi';
                case 'pending': return 'Menunggu';
                case 'completed': return 'Selesai';
                case 'cancelled': return 'Dibatalkan';
                default: return status;
            }
        }

        function loadMentors() {
            const mentorsGrid = document.getElementById('mentors-grid');

            mentorsGrid.innerHTML = mockMentors.map(mentor =>`
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 card-hover transition-all duration-200">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-xl">${mentor.name.charAt(0)}</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900">${mentor.name}</h3>
                            <p class="text-sm text-gray-600">${mentor.position}</p>
                            <p class="text-sm text-gray-500">${mentor.company}</p>
                        </div>
                    </div>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Spesialisasi:</span>
                            <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">${mentor.specialty}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Pengalaman:</span>
                            <span class="text-sm font-medium text-gray-900">${mentor.experience} tahun</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Rating:</span>
                            <div class="flex items-center">
                                <span class="text-yellow-400 text-sm">★★★★★</span>
                                <span class="text-sm text-gray-600 ml-1">(${mentor.rating})</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 mb-4 line-clamp-3">${mentor.bio}</p>

                    <div class="flex space-x-2">
                        <button onclick="editMentor(${mentor.id})" class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 text-sm font-medium">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </button>
                        <button onclick="deleteMentor(${mentor.id})" class="flex-1 bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 text-sm font-medium">
                            <i class="fas fa-trash mr-2"></i>Hapus
                        </button>
                    </div>
                </div>
            `).join('');
        }

        function setupMentorModal() {
            const modal = document.getElementById('mentor-modal');
            const addBtn = document.getElementById('add-mentor-btn');
            const closeBtn = document.getElementById('close-mentor-modal');
            const cancelBtn = document.getElementById('cancel-mentor-btn');
            const form = document.getElementById('mentor-form');

            addBtn.addEventListener('click', () => {
                openMentorModal();
            });

            closeBtn.addEventListener('click', () => {
                closeMentorModal();
            });

            cancelBtn.addEventListener('click', () => {
                closeMentorModal();
            });

            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeMentorModal();
                }
            });

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                saveMentor();
            });
        }

        function openMentorModal(mentorId = null) {
            const modal = document.getElementById('mentor-modal');
            const title = document.getElementById('mentor-modal-title');

            if (mentorId) {
                title.textContent = 'Edit Mentor';
                const mentor = mockMentors.find(m => m.id === mentorId);
                if (mentor) {
                    fillMentorForm(mentor);
                }
            } else {
                title.textContent = 'Tambah Mentor';
                clearMentorForm();
            }

            modal.classList.remove('hidden');
        }

        function closeMentorModal() {
            const modal = document.getElementById('mentor-modal');
            modal.classList.add('hidden');
            clearMentorForm();
        }

        function fillMentorForm(mentor) {
            document.getElementById('mentor-id').value = mentor.id;
            document.getElementById('mentor-name').value = mentor.name;
            document.getElementById('mentor-email').value = mentor.email;
            document.getElementById('mentor-position').value = mentor.position;
            document.getElementById('mentor-company').value = mentor.company;
            document.getElementById('mentor-specialty').value = mentor.specialty;
            document.getElementById('mentor-bio').value = mentor.bio;
            document.getElementById('mentor-experience').value = mentor.experience;
            document.getElementById('mentor-rating').value = mentor.rating;
        }

        function clearMentorForm() {
            document.getElementById('mentor-form').reset();
            document.getElementById('mentor-id').value = '';
        }

        function saveMentor() {
            const formData = {
                id: document.getElementById('mentor-id').value,
                name: document.getElementById('mentor-name').value,
                email: document.getElementById('mentor-email').value,
                position: document.getElementById('mentor-position').value,
                company: document.getElementById('mentor-company').value,
                specialty: document.getElementById('mentor-specialty').value,
                bio: document.getElementById('mentor-bio').value,
                experience: parseInt(document.getElementById('mentor-experience').value) || 0,
                rating: parseFloat(document.getElementById('mentor-rating').value) || 5
            };

            if (formData.id) {
                // Update existing mentor
                const index = mockMentors.findIndex(m => m.id == formData.id);
                if (index !== -1) {
                    mockMentors[index] = { ...mockMentors[index], ...formData };
                }
            } else {
                // Add new mentor
                formData.id = Date.now(); // Simple ID generation
                mockMentors.push(formData);
            }

            loadMentors();
            closeMentorModal();

            // Show success message
            showNotification('Mentor berhasil disimpan!', 'success');
        }

        function editMentor(id) {
            openMentorModal(id);
        }

        function deleteMentor(id) {
            if (confirm('Apakah Anda yakin ingin menghapus mentor ini?')) {
                const index = mockMentors.findIndex(m => m.id === id);
                if (index !== -1) {
                    mockMentors.splice(index, 1);
                    loadMentors();
                    showNotification('Mentor berhasil dihapus!', 'success');
                }
            }
        }

        // Booking functions
        function viewBookingDetails(id) {
            const booking = mockBookings.find(b => b.id === id);
            if (booking) {
                alert(`Detail Booking:\n\nNama: ${booking.full_name}\nEmail: ${booking.email}\nTanggal: ${booking.date}\nWaktu: ${booking.time}\nTipe: ${booking.type}\nStatus: ${booking.status}\nTopik: ${booking.topic}\nJumlah: Rp ${booking.amount.toLocaleString()}`);
            }
        }

        function updateBookingStatus(id, status) {
            const booking = mockBookings.find(b => b.id === id);
            if (booking) {
                booking.status = status;
                loadBookings();
                showNotification(`Status booking berhasil diubah menjadi ${getStatusText(status)}!`, 'success');
            }
        }

        function cancelBooking(id) {
            if (confirm('Apakah Anda yakin ingin membatalkan booking ini?')) {
                updateBookingStatus(id, 'cancelled');
            }
        }

        // Notification function
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white font-medium transition-all duration-300 transform translate-x-full`;

            switch (type) {
                case 'success':
                    notification.classList.add('bg-green-500');
                    break;
                case 'error':
                    notification.classList.add('bg-red-500');
                    break;
                case 'warning':
                    notification.classList.add('bg-yellow-500');
                    break;
                default:
                    notification.classList.add('bg-blue-500');
            }

            notification.textContent = message;
            document.body.appendChild(notification);

            // Show notification
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            // Hide notification after 3 seconds
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }
        // Replace mock data with real API calls
async function loadRealBookings() {
    try {
        const response = await fetch('/mentoring/bookings');
        const result = await response.json();

        if (result.success) {
            renderBookingsTable(result.data);
        }
    } catch (error) {
        console.error('Error loading bookings:', error);
        showNotification('Gagal memuat data booking', 'error');
    }
}

async function loadRealConsultans() {
    try {
        const response = await fetch('/mentoring/consultans');
        const result = await response.json();

        if (result.success) {
            renderConsultansGrid(result.data);
        }
    } catch (error) {
        console.error('Error loading consultans:', error);
        showNotification('Gagal memuat data consultan', 'error');
    }
}

function renderBookingsTable(bookings) {
    const tableBody = document.getElementById('bookings-table-body');

    tableBody.innerHTML = bookings.map(booking =>`
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${booking.full_name}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${booking.email}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${booking.phone}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${booking.date}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${booking.time}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${booking.type === 'free' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800'}">
                    ${booking.type === 'free' ? 'Free Trial' : 'Paid'}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${getStatusClass(booking.status)}">
                    ${getStatusText(booking.status)}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <button class="text-indigo-600 hover:text-indigo-900 mr-3" onclick="viewBookingDetails(${booking.id})">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="text-green-600 hover:text-green-900 mr-3" onclick="updateBookingStatus(${booking.id}, 'confirmed')">
                    <i class="fas fa-check"></i>
                </button>
                <button class="text-red-600 hover:text-red-900" onclick="cancelBooking(${booking.id})">
                    <i class="fas fa-times"></i>
                </button>
            </td>
        </tr>
    `).join('');
}
function renderConsultansGrid(consultans) {
    const consultansGrid = document.getElementById('mentors-grid');

    consultansGrid.innerHTML = consultans.map(consultan =>`
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 card-hover transition-all duration-200">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-xl">${consultan.name.charAt(0)}</span>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900">${consultan.name}</h3>
                    <p class="text-sm text-gray-600">${consultan.position}</p>
                    <p class="text-sm text-gray-500">${consultan.company || '-'}</p>
                </div>
            </div>

            <div class="space-y-2 mb-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Spesialisasi:</span>
                    <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">${consultan.specialty}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Pengalaman:</span>
                    <span class="text-sm font-medium text-gray-900">${consultan.experience} tahun</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Rating:</span>
                    <div class="flex items-center">
                        <span class="text-yellow-400 text-sm">★★★★★</span>
                        <span class="text-sm text-gray-600 ml-1">(${consultan.rating})</span>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Total Booking:</span>
                    <span class="text-sm font-medium text-gray-900">${consultan.bookings_count || 0}</span>
                </div>
            </div>

            <p class="text-sm text-gray-600 mb-4 line-clamp-3">${consultan.bio || 'Tidak ada bio tersedia'}</p>

            <div class="flex space-x-2">
                <button onclick="editConsultan(${consultan.id})" class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 text-sm font-medium">
                    <i class="fas fa-edit mr-2"></i>Edit
                </button>
                <button onclick="deleteConsultan(${consultan.id})" class="flex-1 bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 text-sm font-medium">
                    <i class="fas fa-trash mr-2"></i>Hapus
                </button>
            </div>
        </div>
    `).join('');
}


async function saveRealConsultan() {
    const formData = {
        name: document.getElementById('mentor-name').value,
        email: document.getElementById('mentor-email').value,
        position: document.getElementById('mentor-position').value,
        company: document.getElementById('mentor-company').value,
        specialty: document.getElementById('mentor-specialty').value,
        bio: document.getElementById('mentor-bio').value,
        experience: parseInt(document.getElementById('mentor-experience').value) || 0,
        rating: parseFloat(document.getElementById('mentor-rating').value) || 5
    };

    const consultanId = document.getElementById('mentor-id').value;
    const url = consultanId ? `/mentoring/consultans/${consultanId}` : '/mentoring/consultans';
    const method = consultanId ? 'PUT' : 'POST';

    try {
        const response = await fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(formData)
        });

        const result = await response.json();

        if (result.success) {
            loadRealConsultans();
            closeMentorModal();
            showNotification(result.message, 'success');
        } else {
            showNotification(result.message || 'Terjadi kesalahan', 'error');
        }
    } catch (error) {
        console.error('Error saving consultan:', error);
        showNotification('Terjadi kesalahan saat menyimpan consultan!', 'error');
    }
}

async function editConsultan(id) {
    try {
        const response = await fetch(`/mentoring/consultans/${id}`);
        const result = await response.json();

        if (result.success) {
            fillMentorForm(result.data);
            openMentorModal(id);
        }
    } catch (error) {
        console.error('Error loading consultan:', error);
        showNotification('Gagal memuat data consultan', 'error');
    }
}

async function deleteConsultan(id) {
    if (confirm('Apakah Anda yakin ingin menghapus consultan ini?')) {
        try {
            const response = await fetch(`/mentoring/consultans/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            const result = await response.json();

            if (result.success) {
                loadRealConsultans();
                showNotification(result.message, 'success');
            } else {
                showNotification(result.message || 'Gagal menghapus consultan', 'error');
            }
        } catch (error) {
            console.error('Error deleting consultan:', error);
            showNotification('Terjadi kesalahan saat menghapus consultan!', 'error');
        }
    }
}

// Real booking operations
async function viewBookingDetails(id) {
    try {
        const response = await fetch(`/mentoring/bookings/${id}`);
        const result = await response.json();

        if (result.success) {
            const booking = result.data;
            const details = `Detail Booking:

Nama: ${booking.full_name}
Email: ${booking.email}
Telepon: ${booking.phone}
Tanggal: ${booking.date}
Waktu: ${booking.time}
Durasi: ${booking.duration} menit
Consultan: ${booking.consultan ? booking.consultan.name : '-'}
Tipe: ${booking.type === 'free' ? 'Free Trial' : 'Paid'}
Status: ${getStatusText(booking.status)}
Topik: ${booking.topic || '-'}
Jumlah: Rp ${booking.amount ? booking.amount.toLocaleString() : '0'}
Catatan: ${booking.notes || '-'}`;

            alert(details);
        }
    } catch (error) {
        console.error('Error loading booking details:', error);
        showNotification('Gagal memuat detail booking', 'error');
    }
}

async function updateBookingStatus(id, status) {
    try {
        const response = await fetch(`/mentoring/bookings/${id}/status`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ status: status })
        });

        const result = await response.json();

        if (result.success) {
            loadRealBookings();
            showNotification(result.message, 'success');
        } else {
            showNotification(result.message || 'Gagal mengupdate status', 'error');
        }
    } catch (error) {
        console.error('Error updating booking status:', error);
        showNotification('Terjadi kesalahan saat mengupdate status!', 'error');
    }
}

async function cancelBooking(id) {
    if (confirm('Apakah Anda yakin ingin membatalkan booking ini?')) {
        await updateBookingStatus(id, 'cancelled');
    }
}

// Load real chart data
async function loadRealChartData() {
    try {
        const response = await fetch('/mentoring/chart-data');
        const result = await response.json();

        updateChartsWithRealData(result);
    } catch (error) {
        console.error('Error loading chart data:', error);
    }
}

function updateChartsWithRealData(data) {
    // Update monthly revenue chart
    if (data.monthly_revenue) {
        const monthlyRevenueCtx = document.getElementById('monthlyRevenueChart').getContext('2d');
        new Chart(monthlyRevenueCtx, {
            type: 'line',
            data: {
                labels: data.monthly_revenue.map(item => item.month),
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: data.monthly_revenue.map(item => item.revenue),
                    borderColor: '#8B5CF6',
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + (value / 1000000).toFixed(1) + 'M';
                            }
                        }
                    }
                }
            }
        });
    }

    // Update service distribution chart
    if (data.service_distribution) {
        const serviceDistributionCtx = document.getElementById('serviceDistributionChart').getContext('2d');
        new Chart(serviceDistributionCtx, {
            type: 'doughnut',
            data: {
                labels: data.service_distribution.map(item => item.topic),
                datasets: [{
                    data: data.service_distribution.map(item => item.count),
                    backgroundColor: data.service_distribution.map(item => item.color),
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    }
                }
            }
        });
    }
}

// Export function
async function exportBookings() {
    try {
        const response = await fetch('/mentoring/bookings/export/csv');
        const blob = await response.blob();

        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = 'bookings_export_' + new Date().toISOString().slice(0, 10) + '.csv';
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);

        showNotification('Data berhasil diexport!', 'success');
    } catch (error) {
        console.error('Error exporting data:', error);
        showNotification('Gagal mengexport data!', 'error');
    }
}

// Update the initialization function
document.addEventListener('DOMContentLoaded', function() {
    // ... existing code ...

    // Replace mock data loading with real data loading
    loadRealBookings();
    loadRealConsultans();
    loadRealChartData();

    // Update form submission to use real API
    const form = document.getElementById('mentor-form');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            saveRealConsultan();
        });
    }

    // Add export button functionality
    const exportBtn = document.querySelector('button:contains("Export")');
    if (exportBtn) {
        exportBtn.addEventListener('click', exportBookings);
    }
});

        </script>
    </body>
 </html>
