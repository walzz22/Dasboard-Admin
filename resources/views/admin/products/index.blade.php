@extends('layout.app')

{{-- Judul Halaman --}}
@section('title', 'Produk Afiliasi')
@section('header_title', 'Produk Afiliasi')

@section('content')

<div class="max-w-7xl mx-auto">
    
    {{-- 1. HEADER & TOMBOL TAMBAH --}}
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-slate-900 dark:text-white sm:truncate sm:text-3xl sm:tracking-tight">
                Produk Afiliasi
            </h2>
            <p class="mt-1 text-sm text-slate-500">Kelola katalog produk, komisi, dan status ketersediaan.</p>
        </div>
        <div class="mt-4 flex md:ml-4 md:mt-0">
            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary_hover transition-all">
                <span class="material-symbols-outlined -ml-0.5 mr-2 text-xl">add</span>
                Tambah Produk Baru
            </a>
        </div>
    </div>

    {{-- 2. ALERT SUKSES --}}
    @if(session('success'))
    <div class="mb-4 rounded-md bg-green-50 p-4 border border-green-200 flex items-center">
        <span class="material-symbols-outlined text-green-500 mr-2">check_circle</span>
        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
    </div>
    @endif

    {{-- 3. TABEL DATA --}}
    <div class="overflow-hidden rounded-xl bg-white shadow-sm border border-border-light dark:bg-surface-dark dark:border-border-dark">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-border-light dark:divide-border-dark">
                <thead class="bg-slate-50 dark:bg-slate-800/50">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">No</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Nama Produk</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kategori</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Harga / Komisi</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Status</th>
                        <th scope="col" class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border-light bg-white dark:divide-border-dark dark:bg-surface-dark">
                    
                    @forelse ($products as $product)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        {{-- No --}}
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                            {{ $loop->iteration + ((request()->input('page', 1) - 1) *10) }}
                        </td>

                        {{-- Nama Produk & SKU --}}
                        <td class="whitespace-nowrap px-6 py-4">
                            <div class="flex items-center">
                                {{-- Ikon Dinamis Berdasarkan Kategori (Opsional) --}}
                                <div class="h-10 w-10 flex-shrink-0 rounded-lg bg-blue-50 flex items-center justify-center text-primary mr-3 border border-blue-100">
                                    @if(str_contains(strtolower($product->category), 'course'))
                                        <span class="material-symbols-outlined">school</span>
                                    @elseif(str_contains(strtolower($product->category), 'software') || str_contains(strtolower($product->category), 'tool'))
                                        <span class="material-symbols-outlined">code</span>
                                    @elseif(str_contains(strtolower($product->category), 'ebook'))
                                        <span class="material-symbols-outlined">book</span>
                                    @else
                                        <span class="material-symbols-outlined">inventory_2</span>
                                    @endif
                                </div>
                                <div>
                                    <div class="font-semibold text-slate-900 dark:text-white">{{ $product->name }}</div>
                                    <div class="text-xs text-slate-500 font-mono">SKU: {{ $product->sku ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </td>

                        {{-- Kategori --}}
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">
                            {{ $product->category }}
                        </td>

                        {{-- Harga & Komisi --}}
                        <td class="whitespace-nowrap px-6 py-4">
                            <div class="text-sm font-semibold text-slate-900">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                            <div class="text-xs font-medium text-green-600">
                                Komisi: {{ $product->commission }}%
                            </div>
                        </td>

                        {{-- Status (Badge Warna-warni) --}}
                        <td class="whitespace-nowrap px-6 py-4 text-sm">
                            @if($product->status == 'Aktif')
                                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Aktif</span>
                            @elseif($product->status == 'Draft')
                                <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-inset ring-yellow-600/20">Draft</span>
                            @else
                                <span class="inline-flex items-center rounded-md bg-slate-50 px-2 py-1 text-xs font-medium text-slate-600 ring-1 ring-inset ring-slate-500/20">Tidak Aktif</span>
                            @endif
                        </td>

                        {{-- Aksi --}}
                        <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="inline-flex items-center justify-center rounded-md bg-white px-2.5 py-1.5 text-xs font-semibold text-primary shadow-sm ring-1 ring-inset ring-blue-100 hover:bg-blue-50">
                                    <span class="material-symbols-outlined text-base mr-1">edit</span>
                                    Edit
                                </a>
                                
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center rounded-md bg-white px-2.5 py-1.5 text-xs font-semibold text-red-600 shadow-sm ring-1 ring-inset ring-red-100 hover:bg-red-50">
                                        <span class="material-symbols-outlined text-base mr-1">delete</span>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                            <span class="material-symbols-outlined text-4xl text-slate-300 mb-2">shopping_bag</span>
                            <p>Belum ada produk afiliasi.</p>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- Footer Pagination yang AMAN (Anti-Error) --}}
            <div class="bg-slate-50 px-6 py-3 border-t border-border-light dark:bg-slate-800/50 flex items-center justify-between">
                <p class="text-sm text-slate-500">
                    {{-- Cek apakah data punya fitur 'total' (Pagination) --}}
                    @if(method_exists($products, 'total'))
                        Menampilkan <span class="font-medium">{{ $products->count() }}</span> dari <span class="font-medium">{{ $products->total() }}</span> hasil
                    @else
                        {{-- Jika data biasa (Collection), tampilkan jumlah total saja --}}
                        Menampilkan <span class="font-medium">{{ $products->count() }}</span> hasil (Semua Data)
                    @endif
                </p>

                {{-- Tombol Next/Prev --}}
                <div class="flex gap-2">
                    @if(method_exists($products, 'hasPages') && $products->hasPages())
                        {{-- KONDISI 1: Jika menggunakan Pagination --}}
                        
                        @if($products->onFirstPage())
                            <span class="px-3 py-1 text-xs text-slate-400 border border-slate-200 rounded opacity-50 cursor-not-allowed">Previous</span>
                        @else
                            <a href="{{ $products->previousPageUrl() }}" class="px-3 py-1 text-xs text-slate-600 border border-slate-300 rounded hover:bg-white">Previous</a>
                        @endif

                        @if($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}" class="px-3 py-1 text-xs text-white bg-primary rounded hover:bg-primary_hover">Next</a>
                        @else
                            <span class="px-3 py-1 text-xs text-slate-400 border border-slate-200 rounded opacity-50 cursor-not-allowed">Next</span>
                        @endif

                    @else
                        {{-- KONDISI 2: Jika Data Biasa (Tidak ada halaman selanjutnya) --}}
                        <button disabled class="px-3 py-1 text-xs text-slate-400 border border-slate-200 rounded opacity-50 cursor-not-allowed">Previous</button>
                        <button disabled class="px-3 py-1 text-xs text-slate-400 border border-slate-200 rounded opacity-50 cursor-not-allowed">Next</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection