@extends('layout.app')

@section('content')

{{-- ===================================================================== --}}
{{-- 1. SCRIPT KONFIGURASI TAILWIND (Wajib Ada agar warna tidak 'Basic')   --}}
{{-- ===================================================================== --}}
<script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

<script>
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    primary: "#3b82f6", // Blue-500
                    primary_hover: "#2563eb", // Blue-600
                    secondary: "#64748b",
                    "background-light": "#f8fafc", // Slate-50
                    "background-dark": "#0f172a", // Slate-900
                    "surface-light": "#ffffff",
                    "surface-dark": "#1e293b", // Slate-800
                    "border-light": "#e2e8f0", // Slate-200
                    "border-dark": "#334155", // Slate-700
                    "text-light": "#1e293b",
                    "text-dark": "#e2e8f0",
                    danger: "#ef4444",
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                },
                borderRadius: {
                    DEFAULT: "0.5rem",
                },
            },
        },
    };
</script>

{{-- ===================================================================== --}}
{{-- 2. KONTEN DASHBOARD UTAMA                                             --}}
{{-- ===================================================================== --}}

{{-- Container Utama dengan Background Sesuai Config --}}
<div class="bg-background-light dark:bg-background-dark min-h-screen text-text-light dark:text-text-dark font-sans transition-colors duration-200">
    
    {{-- Main Content Padding --}}
    <div class="mx-auto max-w-7xl p-6">

        {{-- A. HEADER DASHBOARD --}}
        <div class="mb-8">
            <h2 class="text-2xl font-bold leading-7 text-slate-900 dark:text-white sm:truncate sm:text-3xl sm:tracking-tight">
                Selamat Datang, {{ auth()->user()->name ?? 'Admin' }}!
            </h2>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Berikut adalah ringkasan aktivitas perusahaan hari ini.</p>
        </div>

        {{-- B. GRID KARTU STATISTIK (4 Kolom) --}}
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8">
            
            {{-- Kartu 1: Total Karyawan --}}
            <div class="overflow-hidden rounded-xl bg-white p-6 shadow-sm border border-border-light dark:bg-surface-dark dark:border-border-dark hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <div class="rounded-full bg-blue-100 p-3 dark:bg-blue-900/30">
                        <span class="material-symbols-outlined text-2xl text-primary">groups</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Karyawan</h3>
                        <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $totalUsers ?? 0 }}</p>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-green-600 dark:text-green-400">
                    <span class="material-symbols-outlined text-lg mr-1">trending_up</span>
                    <span class="font-medium">+4%</span>
                    <span class="ml-2 text-slate-400 dark:text-slate-500">dari bulan lalu</span>
                </div>
            </div>

            {{-- Kartu 2: Produk Aktif --}}
            <div class="overflow-hidden rounded-xl bg-white p-6 shadow-sm border border-border-light dark:bg-surface-dark dark:border-border-dark hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <div class="rounded-full bg-purple-100 p-3 dark:bg-purple-900/30">
                        <span class="material-symbols-outlined text-2xl text-purple-600 dark:text-purple-400">inventory_2</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-slate-500 dark:text-slate-400">Produk Aktif</h3>
                        <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $totalProducts ?? 0 }}</p>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-green-600 dark:text-green-400">
                    <span class="material-symbols-outlined text-lg mr-1">trending_up</span>
                    <span class="font-medium">+12%</span>
                    <span class="ml-2 text-slate-400 dark:text-slate-500">pertumbuhan</span>
                </div>
            </div>

            {{-- Kartu 3: Cabang Kantor --}}
            <div class="overflow-hidden rounded-xl bg-white p-6 shadow-sm border border-border-light dark:bg-surface-dark dark:border-border-dark hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <div class="rounded-full bg-orange-100 p-3 dark:bg-orange-900/30">
                        <span class="material-symbols-outlined text-2xl text-orange-600 dark:text-orange-400">business</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-slate-500 dark:text-slate-400">Cabang Kantor</h3>
                        <p class="text-2xl font-semibold text-slate-900 dark:text-white">5</p>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-slate-500 dark:text-slate-400">
                    <span class="font-medium text-orange-600 dark:text-orange-400">2</span>
                    <span class="ml-1">dalam renovasi</span>
                </div>
            </div>

            {{-- Kartu 4: Pelamar Baru --}}
            <div class="overflow-hidden rounded-xl bg-white p-6 shadow-sm border border-border-light dark:bg-surface-dark dark:border-border-dark hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <div class="rounded-full bg-green-100 p-3 dark:bg-green-900/30">
                        <span class="material-symbols-outlined text-2xl text-green-600 dark:text-green-400">person_add</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-slate-500 dark:text-slate-400">Pelamar Baru</h3>
                        <p class="text-2xl font-semibold text-slate-900 dark:text-white">24</p>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-red-600 dark:text-red-400">
                    <span class="material-symbols-outlined text-lg mr-1">trending_down</span>
                    <span class="font-medium">-2%</span>
                    <span class="ml-2 text-slate-400 dark:text-slate-500">minggu ini</span>
                </div>
            </div>
        </div>

        {{-- C. BAGIAN TENGAH (Tabel & Widget) --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            
            {{-- 1. TABEL KARYAWAN TERBARU --}}
            <div class="col-span-1 lg:col-span-2 overflow-hidden rounded-xl bg-white shadow-sm border border-border-light dark:bg-surface-dark dark:border-border-dark">
                <div class="flex items-center justify-between border-b border-border-light px-6 py-4 dark:border-border-dark">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Karyawan Terbaru</h3>
                    <a class="text-sm font-medium text-primary hover:text-primary_hover" href="{{ route('admin.users.index') }}">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-border-light dark:divide-border-dark">
                        <thead class="bg-slate-50 dark:bg-slate-800/50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Departemen</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Status</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border-light bg-surface-light dark:divide-border-dark dark:bg-surface-dark">
                            
                            {{-- LOOPING DATA DARI DATABASE --}}
                            @forelse($recentUsers as $user)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex items-center">
                                        {{-- Avatar Initials --}}
                                        <div class="h-8 w-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-primary font-bold text-xs mr-3">
                                            {{ substr($user->name, 0, 2) }}
                                        </div>
                                        <div>
                                            <div class="font-medium text-slate-900 dark:text-white">{{ $user->name }}</div>
                                            <div class="text-xs text-slate-500">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500 dark:text-slate-400">
                                    {{ $user->department ?? '-' }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm">
                                    <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 dark:bg-green-900/30 dark:text-green-400">
                                        Aktif
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-right text-sm text-slate-500 dark:text-slate-400">
                                    {{ $user->created_at->format('d M Y') }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-sm text-slate-500 dark:text-slate-400">Belum ada data karyawan.</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 2. WIDGET SIDEBAR KANAN --}}
            <div class="col-span-1 space-y-6">
                
                {{-- Grafik Departemen (Dummy Visual CSS) --}}
                <div class="overflow-hidden rounded-xl bg-white p-6 shadow-sm border border-border-light dark:bg-surface-dark dark:border-border-dark">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Departemen</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-slate-600 dark:text-slate-300">Teknologi</span>
                                <span class="font-medium text-slate-900 dark:text-white">45%</span>
                            </div>
                            <div class="h-2 w-full rounded-full bg-slate-100 dark:bg-slate-700">
                                <div class="h-2 rounded-full bg-primary" style="width: 45%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-slate-600 dark:text-slate-300">Pemasaran</span>
                                <span class="font-medium text-slate-900 dark:text-white">30%</span>
                            </div>
                            <div class="h-2 w-full rounded-full bg-slate-100 dark:bg-slate-700">
                                <div class="h-2 rounded-full bg-blue-400" style="width: 30%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-slate-600 dark:text-slate-300">Keuangan</span>
                                <span class="font-medium text-slate-900 dark:text-white">15%</span>
                            </div>
                            <div class="h-2 w-full rounded-full bg-slate-100 dark:bg-slate-700">
                                <div class="h-2 rounded-full bg-indigo-400" style="width: 15%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-slate-600 dark:text-slate-300">HR</span>
                                <span class="font-medium text-slate-900 dark:text-white">10%</span>
                            </div>
                            <div class="h-2 w-full rounded-full bg-slate-100 dark:bg-slate-700">
                                <div class="h-2 rounded-full bg-sky-400" style="width: 10%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kartu Biru (Rapat) --}}
                <div class="overflow-hidden rounded-xl bg-gradient-to-br from-primary to-primary_hover p-6 shadow-md text-white">
                    <h3 class="text-lg font-semibold mb-2">Rapat Bulanan</h3>
                    <p class="text-blue-100 text-sm mb-4">Jangan lupa untuk menghadiri rapat evaluasi bulanan tim.</p>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="rounded bg-white/20 p-2">
                            <span class="material-symbols-outlined text-xl">calendar_month</span>
                        </div>
                        <div>
                            <p class="font-medium text-sm">Senin, 25 Okt</p>
                            <p class="text-xs text-blue-100">10:00 AM - 11:30 AM</p>
                        </div>
                    </div>
                    <button class="w-full rounded-lg bg-white py-2 text-sm font-semibold text-primary hover:bg-slate-50 transition-colors">Lihat Detail</button>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection