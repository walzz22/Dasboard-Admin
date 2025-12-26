@extends('layout.app')

@section('content')
<div class="max-w-4xl mx-auto py-5">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Edit Data Pegawai</h2>
            <p class="text-sm text-slate-500">Perbarui informasi akun pegawai.</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-blue-600 transition-colors">
            <span class="material-icons-outlined text-sm">west</span> Kembali
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6 border-b border-slate-100">
                <div class="space-y-4">
                    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 pb-2">Informasi Akun</h3>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-blue-500 text-sm" placeholder="Nama Lengkap" required>
                        @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-2">Alamat Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-blue-500 text-sm" placeholder="email@kantor.com" required>
                        @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-2">Password Baru <span class="font-normal text-slate-400">(Biarkan kosong jika tidak diganti)</span></label>
                        <input type="password" name="password" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-blue-500 text-sm" placeholder="Minimal 8 karakter">
                        @error('password') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 pb-2">Detail Kepegawaian</h3>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-2">Nomor Telepon</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-blue-500 text-sm" placeholder="08..." required>
                        @error('phone') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-2">Departemen</label>
                        <select name="department" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-blue-500 text-sm">
                            <option value="IT" {{ old('department', $user->department) == 'IT' ? 'selected' : '' }}>IT & Teknis</option>
                            <option value="HRD" {{ old('department', $user->department) == 'HRD' ? 'selected' : '' }}>HRD & Personalia</option>
                            <option value="Finance" {{ old('department', $user->department) == 'Finance' ? 'selected' : '' }}>Finance</option>
                            <option value="Marketing" {{ old('department', $user->department) == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                            <option value="Operasional" {{ old('department', $user->department) == 'Operasional' ? 'selected' : '' }}>Operasional</option>
                        </select>
                        @error('department') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-2">Role / Hak Akses</label>
                        <select name="role" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-blue-500 text-sm">
                            <option value="staff" {{ old('role', $user->role) == 'staff' ? 'selected' : '' }}>Staff (Terbatas)</option>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrator (Penuh)</option>
                        </select>
                        @error('role') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="p-6 bg-slate-50 flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-bold shadow-lg shadow-blue-200 transition-all flex items-center gap-2">
                    <span class="material-icons-outlined">save</span>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
