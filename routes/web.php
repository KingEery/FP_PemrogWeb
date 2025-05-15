<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\course\pilih;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\UserController;


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

Route::get('/event', function () {
    return view('event.event');
})->name('event');

Route::get('/event_pendaftaran', function () {
    return view('event.event_pendaftaran');
})->name('event_pendaftaran');

Route::get('/mentoring', function () {
    return view('mentoring.mentoring');
})->name('mentoring');

Route::get('/course_description', function () {
    return view('course.course_description');
})->name('course_description');

Route::get('/mentoring_mendaftar', function () {
    return view('mentoring.mentoring_mendaftar');
})->name('mentoring_mendaftar');

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
Route::get('/register', [RegisterController::class, 'show'])->name('register');

// Login routes pakai LoginController
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');