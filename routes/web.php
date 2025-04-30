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

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\course\pilih;

Route::get('/register', [RegisterController::class, 'show']);

