<?php

use App\Http\Controllers\SystemController;
use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;
use App\Models\Artikel;

// Halaman login utama
Route::get('/login', function () {
    return view('user.login');
})->name('login');

// Proses login
Route::post('/login/process', [SystemController::class, 'login'])->name('login.process');

// Logout
Route::get('/logout', [SystemController::class, 'logout'])->name('logout');

// Dashboard Admin + Artikel (admin only)
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [SystemController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::resource('artikel', ArtikelController::class);
});

// Dashboard User
Route::get('/user/dashboard', [SystemController::class, 'userDashboard'])->name('user.dashboard');

Route::get('/', function () {
    $artikels = Artikel::all(); // ambil artikel dari DB
    return view('welcome', compact('artikels'));
});


Route::get('/register', function() {
    return view('register');
})->name('register');

// Proses Register
Route::post('/register', [SystemController::class, 'registerProcess'])->name('register.process');