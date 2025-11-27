<?php

use App\Http\Controllers\SystemController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\TabunganController;
use App\Models\Artikel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest Routes (Belum Login)
|--------------------------------------------------------------------------
*/

// Welcome / Landing Page
Route::get('/', function () {
    $artikels = Artikel::all();
    return view('welcome', compact('artikels'));
})->name('welcome');

// Login
Route::get('/login', fn() => view('user.login'))->name('login');
Route::post('/login/process', [SystemController::class, 'login'])->name('login.process');

// Register
Route::get('/register', fn() => view('register'))->name('register');
Route::post('/register', [SystemController::class, 'registerProcess'])->name('register.process');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Sudah Login)
|--------------------------------------------------------------------------
*/

// Logout
Route::post('/logout', [SystemController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| User Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::prefix('user')->middleware('auth.custom')->group(function () {
    // Dashboard User
    Route::get('/dashboard', [SystemController::class, 'userDashboard'])->name('user.dashboard');
    
    // Profil User
    Route::get('/profil', [SystemController::class, 'profilUser'])->name('profil.user');
    
    // Nabung Sampah
    Route::get('/nabung', [TabunganController::class, 'index'])->name('nabung.form');
    Route::post('/nabung', [TabunganController::class, 'store'])->name('nabung.store');
    
    // Riwayat Tabungan
    Route::get('/riwayat', [SystemController::class, 'riwayatUser'])->name('riwayat.user');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth.custom')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [SystemController::class, 'adminDashboard'])->name('admin.dashboard');
    
    // Kelola Artikel
    Route::resource('artikel', ArtikelController::class);

    // routes/web.php
Route::post('/contact/save', [SystemController::class, 'contact'])->name('contact.save');

Route::get('/admin/kelola-admin', [SystemController::class, 'kelolaAdmin'])->name('admin.kelola');
Route::post('/admin/update', [SystemController::class, 'updateAdmin'])->name('admin.update');
Route::delete('/admin/delete/{id}', [SystemController::class, 'deleteAdmin'])->name('admin.delete');
Route::post('/admin/create', [SystemController::class, 'create'])->name('admin.create');



Route::get('/admin/kelola-sampah', [SystemController::class, 'kelolaSampah'])->name('admin.kelola.sampah');



  Route::get('/kelola-artikel', [SystemController::class, 'kelolaArtikel'])->name('admin.kelola.artikel');
    Route::post('/kelola-artikel/store', [SystemController::class, 'storeArtikel'])->name('admin.artikel.store');
    Route::post('/kelola-artikel/update', [SystemController::class, 'updateArtikel'])->name('admin.artikel.update');
    Route::delete('/kelola-artikel/delete/{id}', [SystemController::class, 'deleteArtikel'])->name('admin.artikel.delete');


    Route::get('/contact-admin', [SystemController::class, 'contactAdmin'])->name('admin.contact');

});