@extends('layout.app')

@section('content')

<h1 class="mb-4 display-6 text-primary">➕ Tambah Karyawan Baru</h1>

{{-- 👇 INI ADALAH BAGIAN YANG HILANG: PENAMPIL ERROR --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Gagal Menyimpan!</strong> Silakan cek input berikut:
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-4">
        
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            
            <div class="row g-4">
                {{-- Kolom Kiri --}}
                <div class="col-lg-6">
                    <h5 class="mb-3 text-primary">Informasi Dasar</h5>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Lengkap *</label>
                        {{-- value="{{ old('name') }}" berguna agar saat error, tulisan tidak hilang --}}
                        <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email Kantor *</label>
                        <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nomor Telepon</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                    </div>
                </div>
                
                {{-- Kolom Kanan --}}
                <div class="col-lg-6">
                    <h5 class="mb-3 text-primary">Pengaturan Akun</h5>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Departemen *</label>
                        <select class="form-select" name="department" required>
                            <option value="" disabled selected>Pilih Departemen</option>
                            <option value="Admin">Admin / Operasional</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Teknologi">Teknologi / IT</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Peran (Role) *</label>
                        <select class="form-select" name="role" required>
                            <option value="staff" selected>Staff Biasa</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Kata Sandi Awal *</label>
                        <input type="password" class="form-control" name="password" required>
                        <div class="form-text">Minimal 8 karakter.</div>
                    </div>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg me-3">
                    Simpan Karyawan
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-lg">Batal</a>
            </div>
            
        </form>
    </div>
</div>

@endsection