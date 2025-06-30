<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\course\pilih;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventsDescriptionController;
use App\Http\Controllers\MentoringController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseDescriptionController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\FreeTrialController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardConsultanController;




Route::get('/', function () {
    return view('homepage.homepage');
});

// Route::get('/about_consultan', function () {
//     return view('mentoring.about_consultan');
// })->name('about_consultan');

Route::get('/profil_consultan', function () {
    return view('mentoring.profil_consultan');
})->name('profil_consultan');

Route::get('/course', function () {
    $kategoris = ['Web', 'Mobile', 'UI/UX', 'Data Science', 'DevOps', 'Game', 'AI'];
    return view('course.course', compact('kategoris'));
})->name('course');

// Route::get('/event', function () {
//     return view('event.event');
// })->name('event');

// Route::get('/event_pendaftaran', function () {
//     return view('event.event_pendaftaran');
// })->name('event_pendaftaran');

// Route::get('/mentoring', function () {
//     return view('mentoring.mentoring');
// })->name('mentoring');

Route::get('/course_description', function () {
    return view('course.course_description');
})->name('course_description');

Route::get('/course_content', function () {
    return view('course.course_content');
})->name('course_content');

// Route::get('/mentoring_mendaftar', function () {
//     return view('mentoring.mentoring_mendaftar');
// })->name('mentoring_mendaftar');

// Route::get('/payment', function() {
//     return view('payment.payment');
// })->name('payment');

Route::get('/learnmore', function() {
    return view('learnmore.learnmore');
})->name('learnmore');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');

Route::get('/explore', function () {
    return view('explore.explore');
})->name('explore');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::get('/certificate', function () {
    return view('user.certificate');
})->name('certificate');



Route::get('/certificate/download', [CertificateController::class, 'download'])->name('certificate.download');


// ----------- AUTH ROUTES -------------
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.submit');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/tanyamentor', function () {
    return view('user.tanyamentor');
})->name('tanyamentor');

Route::get('/reward', function () {
    return view('user.reward');
})->name('reward');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/password/change', [ProfileController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');
Route::get('/voucher', function () {
    return view('user.voucher');
})->name('voucher');



Route::prefix('event')->group(function() {
    // List events - /events
    Route::get('/', [EventController::class, 'index'])->name('events.index');

    // Show single event - /events/1
    Route::get('/{id}', [EventController::class, 'show'])->name('event.show');

});
Route::get('/profil_consultan/{id}', [ConsultantController::class, 'show'])->name('profil_consultan');

// API routes untuk AJAX (optional)
Route::get('/api/consultants', [MentoringController::class, 'getConsultants'])->name('api.consultants');
Route::get('/payment/{id}', [App\Http\Controllers\PaymentController::class, 'show'])->name('payment.show');
Route::get('/course_description/{id}', [CourseDescriptionController::class, 'show'])->name('course_description.show');

Route::get('/payment/success', function () {
    return view('payment.success');
})->name('payment.success');
// Perbaiki (BENAR)
// Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/mentoring', [MentoringController::class, 'index'])->name('mentoring.index');
Route::get('/mentoring/{id}', [MentoringController::class, 'show'])->name('mentoring.show');

//Course
Route::get('/course_description', [CourseDescriptionController::class,'index']);
Route::get('/course', [CourseController::class, 'index'])->name('courses');
Route::get('/course_description/{id}', [CourseDescriptionController::class, 'show']);

// Session keep alive route (for CSRF token refresh)
Route::post('/session/keep-alive', function () {
    return response()->json(['status' => 'alive']);
})->name('session.keep_alive');



//  Route::get('/dashboard_consultant', [DashboardConsultanController::class, 'dashboard'])->name('dashboard_consultant');
// // // ✅ Web routes untuk form submission dari profil consultant
// Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
// Route::post('/free-trials', [FreeTrialController::class, 'store'])->name('free-trials.store');

// // // ✅ Dashboard routes
// Route::get('/dashboard', [DashboardConsultanController::class, 'index'])->name('dashboard');
// Route::get('/dashboard/consultant', [DashboardConsultanController::class, 'index'])->name('dashboard.consultant');
// // // Dashboard Consultan Routes - REAL-TIME ENABLED
// Route::prefix('dashboard-consultan')->group(function () {
//     Route::get('/', [DashboardConsultanController::class, 'dashboard'])->name('dashboard.consultan');
    
//     // API Routes untuk Real-time Dashboard
//     Route::get('/stats', [DashboardConsultanController::class, 'getStats'])->name('dashboard.consultan.stats');
//     Route::get('/bookings', [DashboardConsultanController::class, 'apiBookings'])->name('dashboard.consultan.bookings');
//     Route::get('/booking/{id}', [DashboardConsultanController::class, 'getBookingDetail'])->name('dashboard.consultan.booking.detail');
//     Route::put('/booking/{id}/status', [DashboardConsultanController::class, 'updateBookingStatus'])->name('dashboard.consultan.booking.status');
//     Route::get('/chart-data', [DashboardConsultanController::class, 'chartData'])->name('dashboard.consultan.chart');
// });