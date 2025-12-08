<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk.
     */
        public function index()
    {
        // Ambil semua data produk dari database, urutkan dari yang terbaru
        $products = Product::latest()->get(); 
        
        // Kirim variabel $products yang berisi data asli ke view
        return view('admin.products.index', compact('products'));
    }

    /**
     * Menampilkan formulir untuk membuat produk baru.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Menyimpan data produk baru dari formulir.
     */
        public function store(Request $request)
    {
        // 1. Validasi Data (Agar data yang masuk sesuai aturan)
        $request->validate([
            'name' => 'required|string|max:255',
            'commission' => 'required|numeric',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        // 2. Simpan ke Database menggunakan Model
        Product::create([
            'name' => $request->name,
            'commission' => $request->commission,
            'description' => $request->description,
            'status' => $request->status,
            // 'image' => ... (Kita skip upload gambar dulu agar simpel)
        ]);

        // 3. Kembali ke Halaman Index dengan Pesan Sukses
        return redirect()->route('admin.products.index')
                        ->with('success', 'Produk berhasil ditambahkan ke Database Laragon!');
    }

    // Fungsi edit, update, destroy, dan show akan diisi nanti.
    // ...
}