<?php

use App\Http\Controllers\SystemController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\TabunganController;
use App\Models\Artikel;
use Illuminate\Support\Facades\Route;

// Login
Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::post('/login/process', [SystemController::class, 'login'])->name('login.process');

// Logout
Route::get('/logout', [SystemController::class, 'logout'])->name('logout');

// Register
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [SystemController::class, 'registerProcess'])->name('register.process');

// Dashboard User
Route::get('/user/dashboard', [SystemController::class, 'userDashboard'])->name('user.dashboard');

// Dashboard Admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [SystemController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::resource('artikel', ArtikelController::class);
});

// Welcome page
Route::get('/', function () {
    $artikels = Artikel::all();
    return view('welcome', compact('artikels'));
});

// Nabung Sampah
Route::get('/nabung', [TabunganController::class, 'index'])->name('nabung.form');
Route::post('/nabung', [TabunganController::class, 'store'])->name('nabung.store');
