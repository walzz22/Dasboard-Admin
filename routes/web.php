<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// AUTH ROUTES
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::redirect('/', '/login');

// ADMIN ROUTES (Protected)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // INFO
    Route::get('/info', [InfoController::class, 'index'])->name('info.index');
    Route::get('/info/create', [InfoController::class, 'create'])->name('info.create');
    Route::get('/info/{info}/edit', [InfoController::class, 'edit'])->name('info.edit');

    // USERS (DATA PEGAWAI)
    Route::resource('users', UserController::class);

    // PRODUCTS (Jika ada)
    // Route::resource('products', ProductController::class);
});