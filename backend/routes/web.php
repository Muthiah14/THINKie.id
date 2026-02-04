<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController;

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


// Halaman utama dengan tombol pop-up
Route::get('/option', function () {
    return view('optionnote');
})->name('optionnote');

// Rute khusus untuk Private & Public
Route::get('/note/private', [NoteController::class, 'private'])->name('note.private');
Route::get('/note/public', [NoteController::class, 'public'])->name('note.public');

// Rute untuk menyimpan data (Form Submit)
Route::post('/note/store', [NoteController::class, 'store'])->name('note.store');