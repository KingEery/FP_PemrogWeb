<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\course\pilih;

Route::get('/', function () {
    return view(view: 'homepage');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/course', function () {
    return view('course.course');
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

// ----------- AUTH ROUTES -------------
Route::get('/register', [RegisterController::class, 'show'])->name('register.form');

// Login routes pakai LoginController
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
