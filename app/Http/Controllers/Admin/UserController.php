<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 

class UserController extends Controller
{
    // --------------------------------------------------------------------------
    // 1. READ: Menampilkan Daftar Data
    // --------------------------------------------------------------------------
    public function index()
    {
        // Variabel $users harus jamak untuk tampilan tabel
        $users = User::latest()->get(); 
        return view('admin.users.index', compact('users'));
    }

    // --------------------------------------------------------------------------
    // 2. CREATE: Menampilkan Form Input
    // --------------------------------------------------------------------------
    public function create()
    {
        return view('admin.users.create');
    }

    // --------------------------------------------------------------------------
    // 3. STORE: Menyimpan Data Baru ke Database (Bagian Kritis Anda)
    // --------------------------------------------------------------------------
    public function store(Request $request)
    {
        // 1. VALIDASI DATA (PENTING! Jangan dinonaktifkan permanen)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8 ', // Mencari field 'password_confirmation'
            'phone' => 'nullable|string|max:15',
            'department' => 'required|string|max:255',
            'role' => 'required|in:admin,staff', 
        ]);

        // 2. PROSES PENYIMPANAN
        // Array ini harus menggunakan NAMA KOLOM DB sebagai KUNCI (KEY)
        User::create([
            // Kunci DB => Nilai dari Form
            
            'name' => $request->name, 
            'email' => $request->email,
            
            // WAJIB: Enkripsi password sebelum disimpan!
            'password' => Hash::make($request->password), 
            
            'phone' => $request->phone,
            'department' => $request->department,
            'role' => $request->role,
        ]);

        // 3. REDIRECT DAN PESAN SUKSES
        return redirect()->route('admin.users.index')
                         ->with('success', 'Karyawan baru berhasil ditambahkan.');
    }

    // --------------------------------------------------------------------------
    // 4. SHOW, EDIT, UPDATE, DESTROY (CRUD Lainnya)
    // --------------------------------------------------------------------------
    // ... (metode show, edit, update, destroy lainnya)
    
    // Perhatikan: Pastikan Anda menambahkan semua metode CRUD ini
    // agar route::resource Anda tidak error (sudah ada di jawaban sebelumnya)
    
    // ...
    public function show(User $user) { /* ... */ }
    public function edit(User $user) { /* ... */ }
    public function update(Request $request, User $user) { /* ... */ }
    public function destroy(User $user) { /* ... */ }
}