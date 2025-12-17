@extends('layout.app')

@section('content')

{{-- 1. SCRIPT PENDUKUNG (Hanya untuk halaman ini agar tampilan langsung bagus) --}}
<script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet"/>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: { primary: "#3b82f6" } // Warna biru default
            }
        }
    }
</script>

{{-- 2. KONTAINER UTAMA (Hanya mengisi area konten, tidak menimpa sidebar) --}}
<div class="w-full px-6 py-6 mx-auto">

    {{-- HEADER: Judul & Tombol Tambah --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Daftar Karyawan</h2>
            <p class="text-sm text-slate-500">Kelola anggota tim dan hak akses mereka.</p>
        </div>
        
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <span class="material-icons-outlined text-lg mr-2">add</span>
            Tambah Karyawan Baru
        </a>
    </div>

    {{-- ALERT: Pesan Sukses --}}
    @if(session('success'))
    <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg border border-green-200" role="alert">
        <span class="font-medium">Berhasil!</span> {{ session('success') }}
    </div>
    @endif

    {{-- TABEL: Card Style --}}
    <div class="relative flex flex-col min-w-0 break-words bg-white border border-slate-200 shadow-sm rounded-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-500">
                <thead class="text-xs text-slate-700 uppercase bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-semibold">No</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Nama</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Email</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Departemen</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Peran</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    
                    @forelse ($users as $user)
                    <tr class="hover:bg-slate-50 transition-colors duration-200">
                        {{-- 1. NOMOR URUT --}}
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-slate-900">
                            {{ $loop->iteration }}
                        </td>

                        {{-- 2. NAMA & AVATAR --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-xs font-bold text-blue-600 uppercase mr-3">
                                    {{ substr($user->name, 0, 2) }}
                                </div>
                                <div class="font-medium text-slate-900">{{ $user->name }}</div>
                            </div>
                        </td>

                        {{-- 3. EMAIL --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $user->email }}
                        </td>

                        {{-- 4. DEPARTEMEN --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                {{ $user->department ?? '-' }}
                            </span>
                        </td>

                        {{-- 5. PERAN --}}
                        <td class="px-6 py-4 whitespace-nowrap capitalize">
                            @if($user->role == 'admin')
                                <span class="text-purple-600 font-semibold bg-purple-50 px-2 py-1 rounded border border-purple-100">Admin</span>
                            @else
                                <span class="text-slate-600 bg-slate-100 px-2 py-1 rounded border border-slate-200">Staff</span>
                            @endif
                        </td>

                        {{-- 6. AKSI --}}
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex items-center justify-end space-x-2">
                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-blue-700 bg-blue-50 rounded-md hover:bg-blue-100 border border-blue-200 transition-colors">
                                    <span class="material-icons-outlined text-sm mr-1">edit</span>
                                    Edit
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-700 bg-red-50 rounded-md hover:bg-red-100 border border-red-200 transition-colors">
                                        <span class="material-icons-outlined text-sm mr-1">delete</span>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-slate-500">
                            <p>Belum ada data karyawan.</p>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        
        {{-- FOOTER / PAGINATION (Opsional) --}}
        <div class="p-4 border-t border-slate-200 bg-slate-50 rounded-b-xl">
            <span class="text-xs text-slate-500">Menampilkan {{ $users->count() }} data</span>
        </div>
    </div>
</div>

@endsection