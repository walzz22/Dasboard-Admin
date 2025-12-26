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
    // --------------------------------------------------------------------------
    // 4. EDIT: Menampilkan Form Edit
    // --------------------------------------------------------------------------
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // --------------------------------------------------------------------------
    // 5. UPDATE: Menyimpan Perubahan Data
    // --------------------------------------------------------------------------
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'department' => 'required|string|max:255',
            'role' => 'required|in:admin,staff',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department' => $request->department,
            'role' => $request->role,
        ];

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $request->validate(['password' => 'min:8']);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
                         ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    // --------------------------------------------------------------------------
    // 6. DESTROY: Menghapus Data
    // --------------------------------------------------------------------------
    public function destroy(User $user)
    {
        // Cegah hapus diri sendiri (opsional tapi disarankan)
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri saat sedang login.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
                         ->with('success', 'Data pegawai berhasil dihapus.');
    }
}