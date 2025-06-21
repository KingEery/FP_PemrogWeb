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
use App\Http\Controllers\ConsultanController;
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

Route::get('/payment', function() {
    return view('payment.payment');
})->name('payment');

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


Route::get('/mentoring', [MentoringController::class, 'index'])->name('mentoring.index');

Route::prefix('event')->group(function() {
    // List events - /events
    Route::get('/', [EventController::class, 'index'])->name('events.index');

    // Show single event - /events/1
    Route::get('/{id}', [EventController::class, 'show'])->name('event.show');

});


Route::get('/mentoring/{id}', [MentoringController::class, 'show'])->name('mentoring.show');

//Course
Route::get('/course_description', [CourseDescriptionController::class,'index']);
Route::get('/course', [CourseController::class, 'index'])->name('courses');
Route::get('/course_description/{id}', [CourseDescriptionController::class, 'show']);

// Session keep alive route (for CSRF token refresh)
Route::post('/session/keep-alive', function () {
    return response()->json(['status' => 'alive']);
})->name('session.keep_alive');



// ----------- BOOKING ROUTES (Global - Diperlukan untuk form) -------------
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::post('/consultan/free-trial', [FreeTrialController::class, 'store'])->name('consultan.Free-Trial.store');

// ----------- CONSULTANT DASHBOARD ROUTES -------------
Route::get('/dashboard_consultant', [DashboardConsultanController::class, 'dashboard'])->name('dashboard_consultant');

// Dashboard API Routes
Route::prefix('dashboard_consultant/api')->name('dashboard_consultant.')->group(function () {
    Route::get('/chart-data', [DashboardConsultanController::class, 'chartData'])->name('chart_data');
    Route::get('/upcoming-bookings', [DashboardConsultanController::class, 'upcomingBookings'])->name('upcoming_bookings');
    Route::get('/stats', [DashboardConsultanController::class, 'getStats'])->name('stats');
    Route::get('/bookings', [DashboardConsultanController::class, 'getBookings'])->name('bookings');
    Route::get('/free-trials', [DashboardConsultanController::class, 'getFreeTrials'])->name('free_trials');
});

// Consultant Management Routes
Route::prefix('consultant')->name('consultant.')->group(function () {
    // Booking Management
    Route::prefix('booking')->name('booking.')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::get('/{id}', [BookingController::class, 'show'])->name('show');
        Route::put('/{id}', [BookingController::class, 'update'])->name('update');
        Route::put('/{id}/status', [BookingController::class, 'updateStatus'])->name('update_status');
        Route::delete('/{id}', [BookingController::class, 'destroy'])->name('destroy');
        Route::get('/export/csv', [BookingController::class, 'exportCsv'])->name('export_csv');
    });

    // Free Trial Management
    Route::prefix('free-trials')->name('free_trials.')->group(function () {
        Route::get('/', [FreeTrialController::class, 'index'])->name('index');
        Route::post('/', [FreeTrialController::class, 'save'])->name('save');
        Route::get('/{id}', [FreeTrialController::class, 'show'])->name('show');
        Route::put('/{id}', [FreeTrialController::class, 'update'])->name('update');
        Route::delete('/{id}', [FreeTrialController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/toggle-status', [FreeTrialController::class, 'toggleStatus'])->name('toggle_status');
        Route::post('/{id}/duplicate', [FreeTrialController::class, 'duplicate'])->name('duplicate');
        Route::get('/{id}/participants', [FreeTrialController::class, 'getParticipants'])->name('participants');
        Route::get('/{id}/export-participants', [FreeTrialController::class, 'exportParticipants'])->name('export_participants');
        Route::get('/{id}/available-slots', [FreeTrialController::class, 'getAvailableSlots'])->name('available_slots');
        Route::get('/statistics', [FreeTrialController::class, 'getStatistics'])->name('statistics');
    });

    // Profile Management
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ConsultanController::class, 'show'])->name('show');
        Route::put('/', [ConsultanController::class, 'update'])->name('update');
    });
});

// ----------- API ROUTES -------------
Route::prefix('api/public')->name('api.public.')->group(function () {
    Route::get('/consultants', [ConsultanController::class, 'index'])->name('consultants.index');
    Route::get('/consultants/{id}', [ConsultanController::class, 'show'])->name('consultants.show');
    Route::get('/free-trials', [FreeTrialController::class, 'index'])->name('free_trials.index');
    Route::get('/free-trials/{id}', [FreeTrialController::class, 'show'])->name('free_trials.show');
});
