<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// Tambahkan rute ini di routes/web.php
// SOLUSI PALING SIMPEL
Route::redirect('/admin', '/admin/dashboard');

// Rute untuk Modul Admin (Pastikan nama view sesuai lokasi folder)

// Dashboard

Route::prefix('admin')->name('admin.')->group(function () {

    // Modul Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Modul Produk Afiliasi
    Route::resource('products', ProductController::class);
    
    // Modul Info Kantor
    Route::resource('info', InfoController::class);

    // Modul Karyawan
    Route::resource('users', UserController::class);

});