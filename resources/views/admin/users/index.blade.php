@extends('layout.app')

{{-- Judul di Tab Browser --}}
@section('title', 'Daftar Karyawan')

{{-- Judul di Header Top Bar --}}
@section('header_title', 'Daftar Karyawan')

@section('content')

{{-- =============================================== --}}
{{-- KONTEN UTAMA (Tanpa Wrapper Body/HTML Tambahan) --}}
{{-- =============================================== --}}

<div class="max-w-7xl mx-auto">
    
    {{-- 1. BAGIAN ATAS: Judul & Tombol Tambah --}}
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-slate-900 dark:text-white sm:truncate sm:text-3xl sm:tracking-tight">
                Daftar Karyawan
            </h2>
            <p class="mt-1 text-sm text-slate-500">Kelola anggota tim dan hak akses mereka.</p>
        </div>
        <div class="mt-4 flex md:ml-4 md:mt-0">
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary_hover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary transition-all">
                <span class="material-symbols-outlined -ml-0.5 mr-2 text-xl">add</span>
                Tambah Karyawan Baru
            </a>
        </div>
    </div>

    {{-- 2. ALERT SUKSES --}}
    @if(session('success'))
    <div class="mb-4 rounded-md bg-green-50 p-4 border border-green-200">
        <div class="flex">
            <div class="flex-shrink-0">
                <span class="material-symbols-outlined text-green-400">check_circle</span>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
            </div>
        </div>
    </div>
    @endif

    {{-- 3. TABEL DATA (Card Putih Bersih) --}}
    <div class="overflow-hidden rounded-xl bg-white shadow-sm border border-border-light dark:bg-surface-dark dark:border-border-dark">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-border-light dark:divide-border-dark">
                <thead class="bg-slate-50 dark:bg-slate-800/50">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">No</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Nama</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Email</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Departemen</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Peran</th>
                        <th scope="col" class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border-light bg-white dark:divide-border-dark dark:bg-surface-dark">
                    
                    @forelse ($users as $user)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        {{-- No Urut --}}
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500 dark:text-slate-400">
                            {{ $loop->iteration }}
                        </td>

                        {{-- Nama & Avatar --}}
                        <td class="whitespace-nowrap px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-9 w-9 flex-shrink-0 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-primary font-bold text-xs mr-3 uppercase border border-blue-200 dark:border-blue-800">
                                    {{ substr($user->name, 0, 2) }}
                                </div>
                                <div class="font-medium text-slate-900 dark:text-white">{{ $user->name }}</div>
                            </div>
                        </td>

                        {{-- Email --}}
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500 dark:text-slate-400">
                            {{ $user->email }}
                        </td>

                        {{-- Departemen --}}
                        <td class="whitespace-nowrap px-6 py-4 text-sm">
                            <span class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 dark:bg-green-900/30 dark:text-green-400">
                                {{ $user->department ?? '-' }}
                            </span>
                        </td>

                        {{-- Peran --}}
                        <td class="whitespace-nowrap px-6 py-4 text-sm capitalize">
                            @if($user->role == 'admin')
                                <span class="inline-flex items-center rounded-full bg-purple-50 px-2.5 py-0.5 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-600/20 dark:bg-purple-900/30 dark:text-purple-400">
                                    {{ $user->role }}
                                </span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-slate-50 px-2.5 py-0.5 text-xs font-medium text-slate-600 ring-1 ring-inset ring-slate-500/20 dark:bg-slate-800 dark:text-slate-300">
                                    {{ $user->role }}
                                </span>
                            @endif
                        </td>

                        {{-- Tombol Aksi --}}
                        <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-flex items-center justify-center rounded-md bg-white px-2.5 py-1.5 text-xs font-semibold text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50">
                                    <span class="material-symbols-outlined text-base mr-1 text-primary">edit</span>
                                    Edit
                                </a>
                                
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center rounded-md bg-white px-2.5 py-1.5 text-xs font-semibold text-red-600 shadow-sm ring-1 ring-inset ring-red-200 hover:bg-red-50">
                                        <span class="material-symbols-outlined text-base mr-1">delete</span>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-slate-500">
                            <div class="flex flex-col items-center justify-center">
                                <span class="material-symbols-outlined text-4xl text-slate-300 mb-2">folder_off</span>
                                <p>Belum ada data karyawan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        
        {{-- Footer Tabel (Total Data) --}}
        <div class="bg-slate-50 px-6 py-3 border-t border-border-light dark:bg-slate-800/50 dark:border-border-dark">
            <p class="text-sm text-slate-500 dark:text-slate-400">
                Menampilkan <span class="font-medium text-slate-900 dark:text-white">{{ $users->count() }}</span> data
            </p>
        </div>
    </div>
</div>

@endsection 