<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua pengumuman/informasi kantor.
     */
    public function index()
    {
        $users = User::latest()->get(); 
        // Kirim variabel $users
        return view('admin.users.index', compact('users')); // Pastikan compact() 'users'
    }

    /**
     * Menampilkan formulir untuk membuat pengumuman baru.
     */
    public function create()
    {
        return view('admin.info.create');
    }

    /**
     * Menyimpan data pengumuman baru dari formulir.
     */
    public function store(Request $request)
    {
        // --- TEMPAT LOGIC VALIDASI DAN PENYIMPANAN DATA DI SINI ---
        
        // Redirect kembali ke halaman daftar setelah berhasil
        return redirect()->route('admin.info.index')->with('success', 'Pengumuman berhasil dipublikasi!');
    }

    // Fungsi show, edit, update, dan destroy sudah otomatis dibuatkan oleh Laravel.
}