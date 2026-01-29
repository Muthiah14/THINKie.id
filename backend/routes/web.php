<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;


// Welcome (halaman pertama)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Register
Route::get('/register', function () {
    return view('register');
})->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Login
Route::get('/login', function () {
    return view('login');
})->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// UpdateProfile
Route::middleware('auth')->group(function () {
    // Halaman form edit
    Route::get('/editProfile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Proses update data
    Route::post('/editProfile', [ProfileController::class, 'update'])->name('profile.update');
});

