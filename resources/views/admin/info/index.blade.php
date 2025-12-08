@extends('layout.app')

@section('content')

<h1 class="mb-4 display-6 text-primary">📢 Daftar Informasi & Pengumuman</h1>
    
<div id="info-list">
    
    {{-- Header dan Tombol Tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <input type="text" class="form-control w-25" placeholder="Cari Judul Pengumuman...">
        {{-- PASTIKAN RUTE CREATE INI ADA DI routes/web.php --}}
        <a href="{{ route('admin.info.create') }}" class="btn btn-primary btn-lg shadow-sm">
            <i class="fas fa-plus me-2"></i> Buat Pengumuman Baru
        </a>
    </div>

    {{-- Kartu Tabel --}}
    <div class="card p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color: #E3F2FD;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Tanggal Publikasi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Pastikan variabel $announcements dikirim dari rute --}}
                    @forelse ($announcements as $info)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $info->title }}</td>
                            <td>{{ $info->type }}</td>
                            <td>{{ $info->published_at }}</td>
                            <td><span class="badge bg-success">{{ $info->status }}</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary">Lihat</a>
                                <a href="#" class="btn btn-sm btn-outline-danger">Arsip</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                Belum ada pengumuman yang dibuat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection