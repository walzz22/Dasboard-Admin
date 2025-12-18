<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\In;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk (Index)
     */
    public function index()
    {
        // Menggunakan paginate agar halaman tidak berat saat data banyak
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Menampilkan Form Tambah Produk
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Memproses Penyimpanan Data (Store)
     */
  public function store(Request $request)
{
    // 1. Validasi Dasar (Hapus aturan 'image' dan 'mimes' di sini)
    $validatedData = $request->validate([
        'name'            => 'required|string|max:255',
        'sku'             => 'nullable|string|max:100',
        'category'        => 'required|string',
        'status'          => 'required',
        'price'           => 'required|numeric',
        'commission_type' => 'required',
        'commission'      => 'required|numeric',
        'link'            => 'nullable|string',
        // Kita hanya cek apakah ini benar-benar file dan ukurannya tidak lewat 5MB
        'image'           => 'nullable|file|max:5120', 
    ]);

    // 2. Logika Pengecekan Gambar Manual (Anti-Gagal)
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        
        // Ambil ekstensi asli file (misal: jpg, png)
        $extension = strtolower($file->getClientOriginalExtension());
        
        // Daftar ekstensi yang kita izinkan
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        // Cek apakah ekstensi file ada di daftar aman
        if (!in_array($extension, $allowedExtensions)) {
            return back()->withErrors([
                'image' => 'File gagal diupload! Ekstensi .' . $extension . ' tidak diizinkan. Gunakan JPG, PNG, atau JPEG.'
            ])->withInput();
        }

        // Jika lolos cek ekstensi, simpan filenya
        $path = $file->store('products', 'public');
        $validatedData['image'] = $path;
    }

    // 3. Simpan ke Database
    \App\Models\Product::create($validatedData);

    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
}

    /**
     * Menghapus Produk (Destroy)
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus gambar dari penyimpanan jika ada (agar tidak menumpuk sampah file)
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
    
    // Method edit() dan update() bisa ditambahkan nanti di sini...
}