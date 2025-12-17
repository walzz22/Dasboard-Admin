<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung Total Data untuk Kartu Statistik
        $totalUsers = User::count();
        $totalProducts = Product::count(); // Pastikan Model Product ada
        
        // 2. Ambil 5 Karyawan Terbaru untuk Tabel
        $recentUsers = User::latest()->take(5)->get();

        // 3. Kirim semua variabel ke view 'admin.dashboard'
        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'recentUsers'));
    }
}