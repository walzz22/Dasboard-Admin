@extends('layout.app')

@section('content')

<h1 class="mb-4 display-6 text-primary">👥 Daftar Karyawan</h1>
    
<div id="user-list">

    {{-- Header dan Tombol Tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <input type="text" class="form-control w-25" placeholder="Cari Nama atau Email Karyawan...">
        {{-- PASTIKAN RUTE CREATE INI ADA DI routes/web.php --}}
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-lg shadow-sm">
            <i class="fas fa-user-plus me-2"></i> Tambah Karyawan Baru
        </a>
    </div>

    {{-- Kartu Tabel --}}
    <div class="card p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color: #E3F2FD;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Email</th>
                        <th scope="col">Departemen</th>
                        <th scope="col">Status Akun</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Pastikan variabel $users dikirim dari rute --}}
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->department }}</td>
                            <td><span class="badge bg-success">Aktif</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-outline-secondary">Nonaktifkan</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                Belum ada data karyawan yang terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection