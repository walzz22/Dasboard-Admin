<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Menampilkan daftar semua pengumuman/informasi kantor.
     */
    public function index()
    {
        // Untuk sementara, kita kirimkan array kosong agar halaman index tidak error.
        $announcements = []; 
        return view('admin.info.index', compact('announcements'));
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