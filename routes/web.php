<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\UserController;
use App\Livewire\Admin\CreateInfo;
use Illuminate\Support\Facades\Route;

// Tambahkan rute ini di routes/web.php
// SOLUSI PALING SIMPEL
Route::redirect('/admin', '/admin/dashboard');

// Rute untuk Modul Admin (Pastikan nama view sesuai lokasi folder)

// Dashboard

Route::prefix('admin')->name('admin.')->group(function () {
    // Halaman Utama Tabel
    Route::get('/info', [InfoController::class, 'index'])->name('info.index');
    
    // Halaman Form Tambah (Menggunakan Livewire)
    Route::get('/info/create', function() {
        return view('admin.info.create'); 
    })->name('info.create');
});