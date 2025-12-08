@extends('layout.app') 

@section('content')

<h1 class="mb-4 display-6 text-primary">➕ Tambah Karyawan Baru</h1>

<div class="card shadow-sm">
    <div class="card-body p-4">
        
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            
            <div class="row g-4">
                
                {{-- Kolom Kiri: Informasi Pribadi Karyawan --}}
                <div class="col-lg-6">
                    <h5 class="mb-3 text-primary">Informasi Dasar Karyawan</h5>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Contoh: Budi Santoso">
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email Kantor <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="budi@kantor.com">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="e.g., 0812xxxxxx">
                    </div>
                </div>
                
                {{-- Kolom Kanan: Pengaturan Akun & Tugas Karyawan --}}
                <div class="col-lg-6">
                    <h5 class="mb-3 text-primary">Pengaturan Tugas & Akun</h5>
                    
                    <div class="mb-3">
                        <label for="department" class="form-label fw-bold">Departemen <span class="text-danger">*</span></label>
                        <select class="form-select" id="department" name="department" required>
                            <option value="" disabled selected>Pilih Departemen</option>
                            <option value="Admin">Admin / Operasional</option>
                            <option value="Marketing">Marketing</option>
                            <option value="HRD">HRD</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Kata Sandi Awal <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                
            </div>
            
            <hr class="my-4">
            
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg me-3 shadow-sm">
                    <i class="fas fa-user-plus me-2"></i> Tambah Karyawan
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-lg">Batal</a>
            </div>
            
        </form>
        
    </div>
</div>

@endsection