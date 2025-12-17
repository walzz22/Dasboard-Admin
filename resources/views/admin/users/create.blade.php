@extends('layout.app')

@section('content')

{{-- 1. SCRIPT PENDUKUNG (Tailwind & Icons) --}}
<script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
<script>
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: { 
                    primary: "#3B82F6",
                },
                fontFamily: {
                    sans: ["Inter", "sans-serif"],
                },
            },
        },
    };
</script>

<div class="flex-grow py-10 px-4 sm:px-6 lg:px-8 bg-slate-50">
    <div class="max-w-5xl mx-auto">
        
        {{-- HEADER HALAMAN & BREADCRUMB --}}
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-3xl font-bold text-primary flex items-center gap-3">
                    <span class="material-icons text-4xl">group_add</span>
                    Tambah Karyawan Baru
                </h2>
                <p class="mt-2 text-sm text-slate-500">
                    Isi formulir di bawah ini untuk mendaftarkan karyawan baru ke dalam sistem.
                </p>
            </div>
            
            <nav aria-label="Breadcrumb" class="text-sm text-slate-500">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-primary">Dashboard</a> / 
                <a href="{{ route('admin.users.index') }}" class="hover:text-primary">Karyawan</a> / 
                <span class="text-slate-400">Tambah Baru</span>
            </nav>
        </div>

        {{-- AREA PESAN ERROR VALIDASI --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg relative mb-6 shadow-sm">
                <strong class="font-bold">Gagal Menyimpan!</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        {{-- FORM UTAMA --}}
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-slate-200">
            <form action="{{ route('admin.users.store') }}" class="p-6 sm:p-8" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                    
                    {{-- KOLOM KIRI: Informasi Dasar --}}
                    <div class="space-y-6">
                        <div class="border-b border-slate-200 pb-3 mb-4">
                            <h3 class="text-lg font-semibold text-primary flex items-center gap-2">
                                <span class="material-icons text-xl">person_outline</span>
                                Informasi Dasar
                            </h3>
                        </div>
                        
                        {{-- Field: Nama Lengkap --}}
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-700" for="name">Nama Lengkap</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-icons text-slate-400 text-lg">badge</span>
                                </div>
                                <input class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-900 focus:ring-primary focus:border-primary sm:text-sm h-11 @error('name') border-red-500 @enderror" 
                                       id="name" name="name" placeholder="Masukkan nama lengkap" type="text" value="{{ old('name') }}"/>
                                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        {{-- Field: Email Kantor --}}
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-700" for="email">Email Kantor</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-icons text-slate-400 text-lg">email</span>
                                </div>
                                <input class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-900 focus:ring-primary focus:border-primary sm:text-sm h-11 @error('email') border-red-500 @enderror" 
                                       id="email" name="email" placeholder="karyawan@perusahaan.com" type="email" value="{{ old('email') }}"/>
                                @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        {{-- Field: Nomor Telepon --}}
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-700" for="phone">Nomor Telepon</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-icons text-slate-400 text-lg">phone</span>
                                </div>
                                <input class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-900 focus:ring-primary focus:border-primary sm:text-sm h-11 @error('phone') border-red-500 @enderror" 
                                       id="phone" name="phone" placeholder="0812-xxxx-xxxx" type="tel" value="{{ old('phone') }}"/>
                                @error('phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    {{-- KOLOM KANAN: Pengaturan Akun --}}
                    <div class="space-y-6">
                        <div class="border-b border-slate-200 pb-3 mb-4">
                            <h3 class="text-lg font-semibold text-primary flex items-center gap-2">
                                <span class="material-icons text-xl">manage_accounts</span>
                                Pengaturan Akun
                            </h3>
                        </div>
                        
                        {{-- Field: Departemen (PERBAIKAN DROP DOWN) --}}
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-700" for="department">Departemen</label>
                            {{-- Dropdown sekarang menggunakan styling yang lebih standar tanpa ikon di dalam field --}}
                            <select class="block w-full rounded-lg border-slate-300 bg-white text-slate-900 focus:ring-primary focus:border-primary sm:text-sm h-11 @error('department') border-red-500 @enderror" 
                                    id="department" name="department">
                                <option value="" disabled selected>Pilih Departemen</option>
                                <option value="Teknologi Informasi" {{ old('department') == 'Teknologi Informasi' ? 'selected' : '' }}>Teknologi Informasi</option>
                                <option value="Sumber Daya Manusia" {{ old('department') == 'Sumber Daya Manusia' ? 'selected' : '' }}>Sumber Daya Manusia</option>
                                <option value="Keuangan" {{ old('department') == 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                                <option value="Pemasaran" {{ old('department') == 'Pemasaran' ? 'selected' : '' }}>Pemasaran</option>
                            </select>
                            @error('department')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        {{-- Field: Peran (Role) (PERBAIKAN DROP DOWN) --}}
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-700" for="role">Peran (Role)</label>
                            {{-- Dropdown sekarang menggunakan styling yang lebih standar tanpa ikon di dalam field --}}
                            <select class="block w-full rounded-lg border-slate-300 bg-white text-slate-900 focus:ring-primary focus:border-primary sm:text-sm h-11 @error('role') border-red-500 @enderror" 
                                    id="role" name="role">
                                <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff Biasa</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                                <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                            </select>
                            @error('role')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        {{-- Field: Kata Sandi Awal --}}
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-700" for="password">Kata Sandi Awal</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-icons text-slate-400 text-lg">lock</span>
                                </div>
                                <input class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-900 focus:ring-primary focus:border-primary sm:text-sm h-11 @error('password') border-red-500 @enderror" 
                                       id="password" name="password" placeholder="••••••••" type="password"/>
                            </div>
                            <p class="mt-1 text-xs text-slate-500">Minimal 8 karakter.</p>
                            @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-200 mt-10 mb-8"></div>
                
                {{-- Tombol Aksi --}}
                <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                    <a href="{{ route('admin.users.index') }}" class="w-full sm:w-auto px-6 py-2.5 border border-slate-300 shadow-sm text-sm font-medium rounded-lg text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors flex items-center justify-center">
                        Batal
                    </a>
                    <button class="w-full sm:w-auto px-6 py-2.5 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-primary hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors flex items-center justify-center gap-2" type="submit">
                        <span class="material-icons text-sm">save</span>
                        Simpan Karyawan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection