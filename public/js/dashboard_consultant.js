// Sample data - in real app, this would come from API
let realBookings = [];
let realConsultans = [];

// Navigation
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const sidebar = document.getElementById('sidebar');

    if (mobileMenuButton && sidebar) {
        mobileMenuButton.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
        });
    }

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
            if (pageTitle) {
                pageTitle.textContent = titles[sectionName] || 'Dashboard';
            }

            // Close mobile menu
            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
            }
        });
    });

    // Set default active menu
    if (sidebarMenus.length > 0) {
        sidebarMenus[0].classList.add('sidebar-active');
    }

    // Initialize dashboard
    initializeDashboard();
    loadRealBookings();
    loadRealConsultans();
    setupMentorModal();
});

async function initializeDashboard() {
    try {
        // ✅ DIPERBAIKI: Tambahkan prefix /api/v1/
        const response = await fetch('/api/v1/dashboard/stats');
        const result = await response.json();

        if (result.success) {
            const stats = result.data;
            const totalBookingsElement = document.getElementById('total-bookings');
            const totalTrialsElement = document.getElementById('total-trials');
            const totalRevenueElement = document.getElementById('total-revenue');
            
            if (totalBookingsElement) totalBookingsElement.textContent = stats.total_bookings || 0;
            if (totalTrialsElement) totalTrialsElement.textContent = stats.total_trials || 0;
            if (totalRevenueElement) totalRevenueElement.textContent = `Rp ${(stats.total_revenue / 1000000).toFixed(1)}M`;
        }
    } catch (error) {
        console.error('Error loading stats:', error);
        // Fallback to default values
        const totalBookingsElement = document.getElementById('total-bookings');
        const totalTrialsElement = document.getElementById('total-trials');
        const totalRevenueElement = document.getElementById('total-revenue');
        
        if (totalBookingsElement) totalBookingsElement.textContent = '0';
        if (totalTrialsElement) totalTrialsElement.textContent = '0';
        if (totalRevenueElement) totalRevenueElement.textContent = 'Rp 0M';
    }

    loadRecentActivities();
    initializeCharts();
}


function loadRecentActivities() {
    const activitiesContainer = document.getElementById('recent-activities');
    if (!activitiesContainer) return;

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
    // Initialize charts with default data, will be updated with real data later
    initializeMonthlyRevenueChart();
    initializeServiceDistributionChart();
    initializeMentorBookingChart();
    initializeRegistrationTrendChart();
    
    // Load real chart data
    loadRealChartData();
}

function initializeMonthlyRevenueChart() {
    const monthlyRevenueCtx = document.getElementById('monthlyRevenueChart');
    if (!monthlyRevenueCtx) return;

    new Chart(monthlyRevenueCtx.getContext('2d'), {
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
}

function initializeServiceDistributionChart() {
    const serviceDistributionCtx = document.getElementById('serviceDistributionChart');
    if (!serviceDistributionCtx) return;

    new Chart(serviceDistributionCtx.getContext('2d'), {
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
}

function initializeMentorBookingChart() {
    const mentorBookingCtx = document.getElementById('mentorBookingChart');
    if (!mentorBookingCtx) return;

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

function initializeRegistrationTrendChart() {
    const registrationTrendCtx = document.getElementById('registrationTrendChart');
    if (!registrationTrendCtx) return;

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

// Replace mock data with real API calls
async function loadRealBookings() {
    try {
        // ✅ DIPERBAIKI: Tambahkan prefix /api/v1/
        const response = await fetch('/api/v1/dashboard/bookings');
        const result = await response.json();

        if (result.success) {
            realBookings = result.data;
            renderBookingsTable(result.data);
        } else {
            showNotification(result.message || 'Gagal memuat data booking', 'error');
            renderBookingsTable([]);
        }
    } catch (error) {
        console.error('Error loading bookings:', error);
        showNotification('Gagal memuat data booking', 'error');
        renderBookingsTable([]);
    }
}


async function loadRealConsultans() {
    try {
        // ✅ DIPERBAIKI: Gunakan endpoint public yang benar
        const response = await fetch('/api/public/consultants');
        const result = await response.json();

        if (result.success) {
            realConsultans = result.data;
            renderConsultansGrid(result.data);
        } else {
            showNotification(result.message || 'Gagal memuat data consultan', 'error');
            renderConsultansGrid([]);
        }
    } catch (error) {
        console.error('Error loading consultans:', error);
        showNotification('Gagal memuat data consultan', 'error');
        renderConsultansGrid([]);
    }
}


function renderBookingsTable(bookings) {
    const tableBody = document.getElementById('bookings-table-body');
    if (!tableBody) return;

    if (bookings.length === 0) {
        tableBody.innerHTML = `
            <tr>
                <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                    Tidak ada data booking tersedia
                </td>
            </tr>
        `;
        return;
    }

    tableBody.innerHTML = bookings.map(booking => `
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${booking.full_name || '-'}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${booking.email || '-'}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${booking.phone || '-'}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${booking.date || '-'}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${booking.time || '-'}</td>
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
                <button class="text-red-600 hover:text-red-900" onclick="updateBookingStatus(${booking.id}, 'cancelled')">
                    <i class="fas fa-times"></i>
                </button>
            </td>
        </tr>
    `).join('');
}

function renderConsultansGrid(consultans) {
    const consultansGrid = document.getElementById('mentors-grid');
    if (!consultansGrid) return;

    if (consultans.length === 0) {
        consultansGrid.innerHTML = `
            <div class="col-span-full text-center py-8">
                <p class="text-gray-500">Tidak ada data consultan tersedia</p>
            </div>
        `;
        return;
    }

    consultansGrid.innerHTML = consultans.map(consultan => `
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 card-hover transition-all duration-200">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-xl">${consultan.name ? consultan.name.charAt(0) : 'C'}</span>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900">${consultan.name || 'Nama tidak tersedia'}</h3>
                    <p class="text-sm text-gray-600">${consultan.position || '-'}</p>
                    <p class="text-sm text-gray-500">${consultan.company || '-'}</p>
                </div>
            </div>

            <div class="space-y-2 mb-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Spesialisasi:</span>
                    <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">${consultan.specialty || '-'}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Pengalaman:</span>
                    <span class="text-sm font-medium text-gray-900">${consultan.experience || 0} tahun</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Rating:</span>
                    <div class="flex items-center">
                        <span class="text-yellow-400 text-sm">★★★★★</span>
                        <span class="text-sm text-gray-600 ml-1">(${consultan.rating || 5})</span>
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
        default: return status || 'Unknown';
    }
}

function setupMentorModal() {
    const modal = document.getElementById('mentor-modal');
    const addBtn = document.getElementById('add-mentor-btn');
    const closeBtn = document.getElementById('close-mentor-modal');
    const cancelBtn = document.getElementById('cancel-mentor-btn');
    const form = document.getElementById('mentor-form');

    if (addBtn) {
        addBtn.addEventListener('click', () => {
            openMentorModal();
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            closeMentorModal();
        });
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', () => {
            closeMentorModal();
        });
    }

    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeMentorModal();
            }
        });
    }

    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            saveRealConsultan();
        });
    }
}

function openMentorModal(mentorId = null) {
    const modal = document.getElementById('mentor-modal');
    const title = document.getElementById('mentor-modal-title');

    if (!modal) return;

    if (mentorId) {
        if (title) title.textContent = 'Edit Mentor';
        const mentor = realConsultans.find(m => m.id === mentorId);
        if (mentor) {
            fillMentorForm(mentor);
        }
    } else {
        if (title) title.textContent = 'Tambah Mentor';
        clearMentorForm();
    }

    modal.classList.remove('hidden');
}

function closeMentorModal() {
    const modal = document.getElementById('mentor-modal');
    if (modal) {
        modal.classList.add('hidden');
    }
    clearMentorForm();
}

function fillMentorForm(mentor) {
    const fields = {
        'mentor-id': mentor.id,
        'mentor-name': mentor.name,
        'mentor-email': mentor.email,
        'mentor-position': mentor.position,
        'mentor-company': mentor.company,
        'mentor-specialty': mentor.specialty,
        'mentor-bio': mentor.bio,
        'mentor-experience': mentor.experience,
        'mentor-rating': mentor.rating
    };

    Object.keys(fields).forEach(id => {
        const element = document.getElementById(id);
        if (element) {
            element.value = fields[id] || '';
        }
    });
}

function clearMentorForm() {
    const form = document.getElementById('mentor-form');
    if (form) {
        form.reset();
    }
    const mentorId = document.getElementById('mentor-id');
    if (mentorId) {
        mentorId.value = '';
    }
}

async function saveRealConsultan() {
    const mentorName = document.getElementById('mentor-name')?.value || '';
    
    const formData = {
        full_name: mentorName, // ✅ Gunakan name sebagai full_name
        name: mentorName,
        email: document.getElementById('mentor-email')?.value || '',
        position: document.getElementById('mentor-position')?.value || '',
        company: document.getElementById('mentor-company')?.value || '',
        specialty: document.getElementById('mentor-specialty')?.value || '',
        bio: document.getElementById('mentor-bio')?.value || '',
        experience: parseInt(document.getElementById('mentor-experience')?.value) || 0,
        rating: parseFloat(document.getElementById('mentor-rating')?.value) || 5,
        phone: '', // ✅ Tambahkan field required lainnya
        price_per_hour: 0,
        photo_profile: '',
        is_active: true,
        availability_status: 'available'
    };


    const consultanId = document.getElementById('mentor-id')?.value;
    // ✅ URL sudah benar
    const url = consultanId ? `/api/v1/consultants/${consultanId}` : '/api/v1/consultants';
    const method = consultanId ? 'PUT' : 'POST';

    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        const response = await fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json', // ✅ TAMBAHAN: Accept header
                ...(csrfToken && { 'X-CSRF-TOKEN': csrfToken })
            },
            body: JSON.stringify(formData)
        });

        const result = await response.json();

        if (result.success) {
            loadRealConsultans();
            closeMentorModal();
            showNotification(result.message || 'Consultan berhasil disimpan!', 'success');
        } else {
            // ✅ TAMBAHAN: Tampilkan detail error untuk debugging
            console.error('Validation errors:', result.errors);
            const errorMessage = result.message || 'Terjadi kesalahan validasi';
            showNotification(errorMessage, 'error');
        }
    } catch (error) {
        console.error('Error saving consultan:', error);
        showNotification('Terjadi kesalahan saat menyimpan consultan!', 'error');
    }
}

async function editConsultan(id) {
    try {
        // ✅ URL sudah benar
        const response = await fetch(`/api/v1/consultants/${id}`);
        const result = await response.json();

        if (result.success) {
            fillMentorForm(result.data);
            openMentorModal(id);
        } else {
            showNotification(result.message || 'Gagal memuat data consultan', 'error');
        }
    } catch (error) {
        console.error('Error loading consultan:', error);
        showNotification('Gagal memuat data consultan', 'error');
    }
}


async function deleteConsultan(id) {
    if (confirm('Apakah Anda yakin ingin menghapus consultan ini?')) {
        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            // ✅ URL sudah benar
            const response = await fetch(`/api/v1/consultants/${id}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json', // ✅ TAMBAHAN: Accept header
                    ...(csrfToken && { 'X-CSRF-TOKEN': csrfToken })
                }
            });

            const result = await response.json();

            if (result.success) {
                loadRealConsultans();
                showNotification(result.message || 'Consultan berhasil dihapus!', 'success');
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
        // ✅ DIPERBAIKI: Tambahkan prefix /api/v1/
        const response = await fetch(`/api/v1/dashboard/bookings/${id}`);
        const result = await response.json();

        if (result.success) {
            const booking = result.data;
            const details = `Detail Booking:

Nama: ${booking.full_name || '-'}
Email: ${booking.email || '-'}
Telepon: ${booking.phone || '-'}
Tanggal: ${booking.date || '-'}
Waktu: ${booking.time || '-'}
Durasi: ${booking.duration || '-'} menit
Consultan: ${booking.consultan ? booking.consultan.name : '-'}
Tipe: ${booking.type === 'free' ? 'Free Trial' : 'Paid'}
Status: ${getStatusText(booking.status)}
Topik: ${booking.topic || '-'}
Jumlah: Rp ${booking.amount ? booking.amount.toLocaleString() : '0'}
Catatan: ${booking.notes || '-'}`;

            alert(details);
        } else {
            showNotification(result.message || 'Gagal memuat detail booking', 'error');
        }
    } catch (error) {
        console.error('Error loading booking details:', error);
        showNotification('Gagal memuat detail booking', 'error');
    }
}

async function updateBookingStatus(id, status) {
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        // ✅ DIPERBAIKI: Fix parameter name dan URL
        const response = await fetch(`/api/v1/dashboard/bookings/${id}/status`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json', // ✅ TAMBAHAN: Accept header
                ...(csrfToken && { 'X-CSRF-TOKEN': csrfToken })
            },
            body: JSON.stringify({ status: status })
        });

        const result = await response.json();

        if (result.success) {
            loadRealBookings();
            showNotification(result.message || `Status berhasil diubah menjadi ${getStatusText(status)}`, 'success');
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
        // ✅ DIPERBAIKI: Tambahkan prefix /api/v1/
        const response = await fetch('/api/v1/dashboard/chart-data');
        const result = await response.json();

        if (result.success) {
            updateChartsWithRealData(result.data);
        }
    } catch (error) {
        console.error('Error loading chart data:', error);
        // Charts will use default data if real data fails to load
    }
}
function updateChartsWithRealData(data) {
    // Update monthly revenue chart
    if (data.monthly_revenue) {
        const monthlyRevenueCtx = document.getElementById('monthlyRevenueChart');
        if (monthlyRevenueCtx) {
            // Clear existing chart if any
            Chart.getChart(monthlyRevenueCtx)?.destroy();
            
            new Chart(monthlyRevenueCtx.getContext('2d'), {
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
    }

    // Update service distribution chart
    if (data.service_distribution) {
        const serviceDistributionCtx = document.getElementById('serviceDistributionChart');
        if (serviceDistributionCtx) {
            // Clear existing chart if any
            Chart.getChart(serviceDistributionCtx)?.destroy();
            
            new Chart(serviceDistributionCtx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: data.service_distribution.map(item => item.specialty),
                    datasets: [{
                        data: data.service_distribution.map(item => item.count),
                        backgroundColor: [
                            '#8B5CF6',
                            '#06B6D4',
                            '#10B981',
                            '#F59E0B',
                            '#EF4444',
                            '#6366F1',
                            '#EC4899'
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
        }
    }

    // Update mentor booking chart
    if (data.mentor_bookings) {
        const mentorBookingCtx = document.getElementById('mentorBookingChart');
        if (mentorBookingCtx) {
            // Clear existing chart if any
            Chart.getChart(mentorBookingCtx)?.destroy();
            
            new Chart(mentorBookingCtx.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: data.mentor_bookings.map(item => item.name),
                    datasets: [{
                        label: 'Jumlah Booking',
                        data: data.mentor_bookings.map(item => item.bookings_count),
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
    }

    // Update registration trend chart
    if (data.registration_trend) {
        const registrationTrendCtx = document.getElementById('registrationTrendChart');
        if (registrationTrendCtx) {
            // Clear existing chart if any
            Chart.getChart(registrationTrendCtx)?.destroy();
            
            new Chart(registrationTrendCtx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: data.registration_trend.map(item => item.week),
                    datasets: [{
                        label: 'Pendaftaran Baru',
                        data: data.registration_trend.map(item => item.count),
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
}

// Notification system
function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => notification.remove());

    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg transform transition-all duration-300 ease-in-out translate-x-full`;
    
    // Set notification style based on type
    switch (type) {
        case 'success':
            notification.classList.add('bg-green-500', 'text-white');
            break;
        case 'error':
            notification.classList.add('bg-red-500', 'text-white');
            break;
        case 'warning':
            notification.classList.add('bg-yellow-500', 'text-white');
            break;
        default:
            notification.classList.add('bg-blue-500', 'text-white');
    }

    // Add icon based on type
    let icon = '';
    switch (type) {
        case 'success':
            icon = '<i class="fas fa-check-circle mr-2"></i>';
            break;
        case 'error':
            icon = '<i class="fas fa-exclamation-circle mr-2"></i>';
            break;
        case 'warning':
            icon = '<i class="fas fa-exclamation-triangle mr-2"></i>';
            break;
        default:
            icon = '<i class="fas fa-info-circle mr-2"></i>';
    }

    notification.innerHTML = `
        <div class="flex items-center">
            ${icon}
            <span>${message}</span>
            <button class="ml-4 text-white hover:text-gray-200" onclick="this.parentElement.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;

    // Add to document
    document.body.appendChild(notification);

    // Animate in
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);

    // Auto remove after 5 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 5000);
}

// Search and filter functions
function filterBookings() {
    const searchTerm = document.getElementById('booking-search')?.value.toLowerCase() || '';
    const statusFilter = document.getElementById('status-filter')?.value || '';
    const typeFilter = document.getElementById('type-filter')?.value || '';

    let filteredBookings = realBookings;

    // Apply search filter
    if (searchTerm) {
        filteredBookings = filteredBookings.filter(booking => 
            booking.full_name?.toLowerCase().includes(searchTerm) ||
            booking.email?.toLowerCase().includes(searchTerm) ||
            booking.phone?.includes(searchTerm)
        );
    }

    // Apply status filter
    if (statusFilter) {
        filteredBookings = filteredBookings.filter(booking => booking.status === statusFilter);
    }

    // Apply type filter
    if (typeFilter) {
        filteredBookings = filteredBookings.filter(booking => booking.type === typeFilter);
    }

    renderBookingsTable(filteredBookings);
}

function filterConsultans() {
    const searchTerm = document.getElementById('consultan-search')?.value.toLowerCase() || '';
    const specialtyFilter = document.getElementById('specialty-filter')?.value || '';

    let filteredConsultans = realConsultans;

    // Apply search filter
    if (searchTerm) {
        filteredConsultans = filteredConsultans.filter(consultan => 
            consultan.name?.toLowerCase().includes(searchTerm) ||
            consultan.position?.toLowerCase().includes(searchTerm) ||
            consultan.company?.toLowerCase().includes(searchTerm)
        );
    }

    // Apply specialty filter
    if (specialtyFilter) {
        filteredConsultans = filteredConsultans.filter(consultan => 
            consultan.specialty === specialtyFilter
        );
    }

    renderConsultansGrid(filteredConsultans);
}

// Export functions
function exportBookings() {
    const csvContent = convertBookingsToCSV(realBookings);
    downloadCSV(csvContent, 'bookings_export.csv');
}

function convertBookingsToCSV(bookings) {
    const headers = ['Nama', 'Email', 'Telepon', 'Tanggal', 'Waktu', 'Tipe', 'Status', 'Consultan', 'Topik', 'Jumlah'];
    const csvRows = [headers.join(',')];

    bookings.forEach(booking => {
        const row = [
            booking.full_name || '',
            booking.email || '',
            booking.phone || '',
            booking.date || '',
            booking.time || '',
            booking.type === 'free' ? 'Free Trial' : 'Paid',
            getStatusText(booking.status),
            booking.consultan?.name || '',
            booking.topic || '',
            booking.amount || 0
        ];
        csvRows.push(row.map(field => `"${field}"`).join(','));
    });

    return csvRows.join('\n');
}

function downloadCSV(csvContent, filename) {
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    
    if (link.download !== undefined) {
        const url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', filename);
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
}

// Statistics refresh function
async function refreshStats() {
    const refreshBtn = document.getElementById('refresh-stats-btn');
    if (refreshBtn) {
        refreshBtn.classList.add('animate-spin');
    }

    try {
        await initializeDashboard();
        showNotification('Statistik berhasil diperbarui!', 'success');
    } catch (error) {
        console.error('Error refreshing stats:', error);
        showNotification('Gagal memperbarui statistik', 'error');
    } finally {
        if (refreshBtn) {
            refreshBtn.classList.remove('animate-spin');
        }
    }
}

// Initialize event listeners when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Search event listeners
    const bookingSearch = document.getElementById('booking-search');
    const statusFilter = document.getElementById('status-filter');
    const typeFilter = document.getElementById('type-filter');
    const consultanSearch = document.getElementById('consultan-search');
    const specialtyFilter = document.getElementById('specialty-filter');

    if (bookingSearch) bookingSearch.addEventListener('input', filterBookings);
    if (statusFilter) statusFilter.addEventListener('change', filterBookings);
    if (typeFilter) typeFilter.addEventListener('change', filterBookings);
    if (consultanSearch) consultanSearch.addEventListener('input', filterConsultans);
    if (specialtyFilter) specialtyFilter.addEventListener('change', filterConsultans);

    // Export button
    const exportBtn = document.getElementById('export-bookings-btn');
    if (exportBtn) exportBtn.addEventListener('click', exportBookings);

    // Refresh button
    const refreshBtn = document.getElementById('refresh-stats-btn');
    if (refreshBtn) refreshBtn.addEventListener('click', refreshStats);
});