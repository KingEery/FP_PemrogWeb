<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

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


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\course\pilih;


Route::get('/register', [RegisterController::class, 'show']);

