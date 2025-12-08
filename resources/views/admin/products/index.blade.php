@extends('layout.app')

@section('content')

<h1 class="mb-4 display-6 text-primary">🛍️ Daftar Produk Afiliasi</h1>
    
<div id="product-list">

    {{-- Header dan Tombol Tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <input type="text" class="form-control w-25" placeholder="Cari Produk atau Komisi...">
        {{-- PASTIKAN RUTE CREATE INI ADA DI routes/web.php --}}
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-lg shadow-sm">
            <i class="fas fa-plus me-2"></i> Tambah Produk Baru
        </a>
    </div>

    {{-- Kartu Tabel --}}
    <div class="card p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color: #E3F2FD;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Komisi (%)</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Pastikan variabel $products dikirim dari rute (meskipun array kosong) --}}
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->commission }}%</td>
                            <td><span class="badge bg-success">{{ $product->status }}</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                Belum ada produk yang terdaftar. Silakan tambahkan produk baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection