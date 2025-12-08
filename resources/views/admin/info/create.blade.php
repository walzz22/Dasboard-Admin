@extends('layout.app')

@section('content')

<h1 class="mb-4 display-6 text-primary">📢 Buat Pengumuman Baru</h1>

<div class="card shadow-sm">
    <div class="card-body p-4">
        
        <form action="{{ route('admin.info.store') }}" method="POST">
            @csrf
            
            <h5 class="mb-3 text-primary">Detail Pengumuman</h5>

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Judul Pengumuman <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" required placeholder="Contoh: Info Penting Mengenai Cuti Bersama">
            </div>
            
            <div class="mb-3">
                <label for="type" class="form-label fw-bold">Tipe Informasi</label>
                <select class="form-select w-50" id="type" name="type" required>
                    <option value="Umum" selected>Umum</option>
                    <option value="Peringatan">Peringatan</option>
                    <option value="Libur">Libur</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label fw-bold">Isi Pengumuman <span class="text-danger">*</span></label>
                <textarea class="form-control" id="content" name="content" rows="6" required placeholder="Tulis detail lengkap pengumuman di sini..."></textarea>
            </div>
            
            <hr class="my-4">
            
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg me-3 shadow-sm">
                    <i class="fas fa-paper-plane me-2"></i> Publikasikan
                </button>
                <a href="{{ route('admin.info.index') }}" class="btn btn-outline-secondary btn-lg">Batal</a>
            </div>
            
        </form>
        
    </div>
</div>

@endsection