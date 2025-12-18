@extends('layout.app')

@section('title', 'Tambah Produk Afiliasi')
@section('header_title', 'Tambah Produk Baru')

@section('content')
<div class="max-w-5xl mx-auto">
    
    {{-- 1. BREADCRUMB --}}
    <nav class="flex mb-4 text-sm text-slate-500" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-primary">Dashboard</a></li>
            <li><span class="mx-2 text-slate-400">/</span></li>
            <li><a href="{{ route('admin.products.index') }}" class="hover:text-primary">Produk Afiliasi</a></li>
            <li><span class="mx-2 text-slate-400">/</span></li>
            <li class="text-slate-400 font-medium">Tambah Baru</li>
        </ol>
    </nav>

    {{-- 2. HEADER --}}
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Buat Produk Afiliasi Baru</h2>
        <p class="text-slate-500 dark:text-slate-400 text-sm">Lengkapi formulir di bawah ini untuk menambahkan produk ke katalog.</p>
    </div>

    {{-- 3. NOTIFIKASI ERROR (PENTING AGAR TIDAK STUCK) --}}
    @if ($errors->any())
    <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 flex items-start">
        <span class="material-symbols-outlined text-red-500 mr-3">error</span>
        <div>
            <h3 class="text-sm font-bold text-red-800">Ada kesalahan pengisian:</h3>
            <ul class="mt-1 list-disc list-inside text-xs text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    {{-- 4. FORM UTAMA --}}
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- CARD 1: INFORMASI DASAR --}}
        <div class="bg-white dark:bg-surface-dark rounded-xl shadow-sm border border-border-light dark:border-border-dark p-6">
            <h3 class="text-lg font-semibold text-primary mb-6 flex items-center">
                <span class="material-symbols-outlined mr-2">info</span> Informasi Dasar
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nama Produk</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Masterclass SEO 2024" required
                        class="w-full rounded-lg border-slate-300 dark:border-border-dark dark:bg-slate-800 focus:ring-primary focus:border-primary text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Kategori</label>
                    <select name="category" class="w-full rounded-lg border-slate-300 dark:border-border-dark dark:bg-slate-800 text-sm">
                        <option value="E-Course" {{ old('category') == 'E-Course' ? 'selected' : '' }}>E-Course</option>
                        <option value="Software" {{ old('category') == 'Software' ? 'selected' : '' }}>Software</option>
                        <option value="Ebook" {{ old('category') == 'Ebook' ? 'selected' : '' }}>Ebook</option>
                        <option value="Digital Product" {{ old('category') == 'Digital Product' ? 'selected' : '' }}>Digital Product</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">SKU Produk</label>
                    <input type="text" name="sku" value="{{ old('sku') }}" placeholder="MC-SEO-001"
                        class="w-full rounded-lg border-slate-300 dark:border-border-dark dark:bg-slate-800 text-sm">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Status</label>
                    <select name="status" class="w-full rounded-lg border-slate-300 dark:border-border-dark dark:bg-slate-800 text-sm">
                        <option value="Aktif">Aktif</option>
                        <option value="Draft">Draft</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- CARD 2: HARGA & KOMISI --}}
        <div class="bg-white dark:bg-surface-dark rounded-xl shadow-sm border border-border-light dark:border-border-dark p-6">
            <h3 class="text-lg font-semibold text-primary mb-6 flex items-center">
                <span class="material-symbols-outlined mr-2">payments</span> Harga & Komisi
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Harga Produk</label>
                    <div class="relative">
                        <span class="absolute left-3 top-2 text-slate-400 text-sm">Rp</span>
                        <input type="number" name="price" value="{{ old('price') }}" placeholder="0" required
                            class="w-full pl-10 rounded-lg border-slate-300 dark:border-border-dark dark:bg-slate-800 text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Tipe Komisi</label>
                    <div class="flex space-x-4 h-10 items-center">
                        <label class="inline-flex items-center">
                            <input type="radio" name="commission_type" value="percent" checked class="text-primary focus:ring-primary">
                            <span class="ml-2 text-sm text-slate-600 dark:text-slate-400">Persentase (%)</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="commission_type" value="fixed" class="text-primary focus:ring-primary">
                            <span class="ml-2 text-sm text-slate-600 dark:text-slate-400">Nominal (Rp)</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nilai Komisi</label>
                    <input type="number" name="commission" value="{{ old('commission') }}" placeholder="Contoh: 25 atau 50000" required
                        class="w-full rounded-lg border-slate-300 dark:border-border-dark dark:bg-slate-800 text-sm">
                </div>
            </div>
        </div>

        {{-- CARD 3: MEDIA --}}
        <div class="bg-white dark:bg-surface-dark rounded-xl shadow-sm border border-border-light dark:border-border-dark p-6">
            <h3 class="text-lg font-semibold text-primary mb-6 flex items-center">
                <span class="material-symbols-outlined mr-2">image</span> Detail & Media
            </h3>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Landing Page URL</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-slate-300 dark:border-border-dark bg-slate-50 dark:bg-slate-800 text-slate-500 text-sm">https://</span>
                        <input type="text" name="link" value="{{ old('link') }}" placeholder="www.example.com"
                            class="w-full rounded-r-lg border-slate-300 dark:border-border-dark dark:bg-slate-800 text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Gambar Produk</label>
                    
                    {{-- Area Upload --}}
                    <div id="upload-area" class="border-2 border-dashed border-slate-300 dark:border-border-dark rounded-xl p-8 text-center hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-all cursor-pointer">
                        <input type="file" name="image" id="file-upload" class="hidden" accept="image/*" onchange="handlePreview(this)">
                        <div onclick="document.getElementById('file-upload').click()">
                            <span class="material-symbols-outlined text-4xl text-slate-400 mb-2">cloud_upload</span>
                            <p class="text-sm text-slate-600 dark:text-slate-400"><span class="text-primary font-semibold">Upload file</span> atau drag and drop</p>
                            <p class="text-xs text-slate-500 mt-1">PNG, JPG, JPEG up to 5MB</p>
                        </div>
                    </div>

                    {{-- Area Preview (Tersembunyi Awalnya) --}}
                    <div id="preview-container" class="hidden mt-4 p-4 bg-slate-50 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-border-dark">
                        <div class="flex items-center gap-4">
                            <img id="preview-img" src="#" alt="Preview" class="h-16 w-16 object-cover rounded-lg border">
                            <div class="flex-1 min-w-0">
                                <p id="preview-name" class="text-sm font-medium text-slate-900 dark:text-white truncate">nama_file.jpg</p>
                                <p id="preview-size" class="text-xs text-slate-500">0 KB</p>
                            </div>
                            <button type="button" onclick="resetUpload()" class="text-red-500 hover:text-red-700">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TOMBOL AKSI --}}
        <div class="flex items-center justify-end gap-3 pb-12">
            <a href="{{ route('admin.products.index') }}" class="px-6 py-2.5 rounded-lg border border-slate-300 text-slate-700 dark:text-slate-300 font-medium hover:bg-slate-50 transition-all">Batal</a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-primary text-white font-medium hover:bg-primary_hover shadow-md transition-all flex items-center">
                <span class="material-symbols-outlined mr-2 text-xl">save</span>
                Simpan Produk
            </button>
        </div>
    </form>
</div>

{{-- SCRIPT PREVIEW LANGSUNG DI SINI (SOLUSI 404) --}}
<script>
    function handlePreview(input) {
        const area = document.getElementById('upload-area');
        const container = document.getElementById('preview-container');
        const img = document.getElementById('preview-img');
        const name = document.getElementById('preview-name');
        const size = document.getElementById('preview-size');

        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                img.src = e.target.result;
                name.textContent = file.name;
                size.textContent = (file.size / 1024).toFixed(2) + ' KB';
                
                area.classList.add('hidden');
                container.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    function resetUpload() {
        const input = document.getElementById('file-upload');
        const area = document.getElementById('upload-area');
        const container = document.getElementById('preview-container');
        
        input.value = "";
        area.classList.remove('hidden');
        container.classList.add('hidden');
    }
</script>
@endsection