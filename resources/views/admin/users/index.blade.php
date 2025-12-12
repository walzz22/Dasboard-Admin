@extends('layout.app')

@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Karyawan</h1>

    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">
        Tambah Karyawan Baru
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Departemen</th>
                            <th scope="col">Peran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- LOOPING DATA USERS --}}
                        {{-- 👇 Pastikan nama variabelnya $users --}}
                        @foreach ($users as $user) 
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->department }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">Edit</a>
                                <form action="#" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        {{-- AKHIR LOOPING --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection