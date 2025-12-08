<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// WAJIB: Import Model agar bisa dikenali
use App\Models\User;
use App\Models\Product;
use App\Models\Info;

class DashboardController extends Controller
{
    /**
     * Tampilkan dashboard dengan data statistik.
     */
    public function index()
    {
        // 1. MENGAMBIL DATA DARI DATABASE
        
        // Menghitung Total Karyawan
        $totalUsers = User::count(); 

        // Menghitung Produk Aktif (Asumsi: kolom 'status' di Model Product)
        $activeProducts = Product::where('status', 'aktif')->count();
        
        // Menghitung Total Pengumuman
        $totalAnnouncements = Info::count();
        
        // Placeholder untuk Komisi (Karena ini membutuhkan logika keuangan yang kompleks)
        // Anda bisa mengganti ini dengan data lain yang lebih sederhana jika ada.
        $commissionPlaceholder = "Rp 12.5 Jt"; 

        // 2. KIRIM DATA KE VIEW
        // Pastikan variabel yang dikirim (compact) sama persis dengan yang ada di View
        return view('admin.dashboard', compact(
            'totalUsers', 
            'activeProducts', 
            'totalAnnouncements', 
            'commissionPlaceholder'
        ));
    }
}