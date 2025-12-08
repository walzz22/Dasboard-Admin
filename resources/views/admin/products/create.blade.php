@extends('layout.app')

@section('content')

<h1 class="mb-4 display-6 text-primary">➕ Tambah Produk Afiliasi Baru</h1>

<div class="card shadow-sm">
    <div class="card-body p-4">
        
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            
            <h5 class="mb-3 text-primary">Detail Produk</h5>

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Produk <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" required placeholder="Contoh: Kursus Digital Marketing">
            </div>
            
            <div class="mb-3">
                <label for="commission" class="form-label fw-bold">Komisi Afiliasi (%) <span class="text-danger">*</span></label>
                <input type="number" step="0.1" class="form-control w-25" id="commission" name="commission" required placeholder="e.g., 20.0">
                <div class="form-text">Masukkan persentase komisi (misalnya 20 untuk 20%).</div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Deskripsi Produk</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>
            
            <div class="mb-3">
                <label for="status" class="form-label fw-bold">Status Produk</label>
                <select class="form-select w-50" id="status" name="status" required>
                    <option value="Aktif" selected>Aktif</option>
                    <option value="Nonaktif">Nonaktif</option>
                </select>
            </div>
            
            <hr class="my-4">
            
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg me-3 shadow-sm">
                    <i class="fas fa-save me-2"></i> Simpan Produk
                </button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary btn-lg">Batal</a>
            </div>
            
        </form>
        
    </div>
</div>

@endsection