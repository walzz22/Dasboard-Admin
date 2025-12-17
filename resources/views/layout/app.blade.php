<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Admin Dashboard')</title>
    
    {{-- 1. LOAD SCRIPT TAILWIND & FONT (Wajib ada di sini) --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    
    {{-- 2. KONFIGURASI WARNA (Sesuai kode asli Anda) --}}
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#3b82f6", // Blue-500
                        primary_hover: "#2563eb", // Blue-600
                        secondary: "#64748b",
                        "background-light": "#f8fafc",
                        "background-dark": "#0f172a",
                        "surface-light": "#ffffff",
                        "surface-dark": "#1e293b",
                        "border-light": "#e2e8f0",
                        "border-dark": "#334155",
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
</head>

<body class="bg-background-light dark:bg-background-dark font-sans text-text-light dark:text-text-dark antialiased transition-colors duration-200">
    
    <div class="flex h-screen overflow-hidden">
        
        {{-- ================================================= --}}
        {{-- BAGIAN 1: SIDEBAR (NAV BAR)                       --}}
        {{-- ================================================= --}}
        <aside id="sidebar" class="hidden w-64 flex-col overflow-y-auto border-r border-border-light bg-surface-light dark:border-border-dark dark:bg-surface-dark md:flex fixed md:relative z-20 h-full">
            
            {{-- Logo App --}}
            <div class="flex h-16 items-center justify-center border-b border-border-light dark:border-border-dark px-6">
                <a class="text-xl font-bold text-primary tracking-wide" href="#">
                    APP DASHBOARD
                </a>
            </div>

            {{-- Menu Navigasi --}}
            <nav class="flex-1 space-y-1 px-3 py-4">
                
                {{-- Link: Dashboard --}}
                <a href="{{ route('admin.dashboard') }}" 
                   class="group flex items-center rounded-md px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-primary dark:bg-blue-900/20 dark:text-blue-400' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-700 dark:hover:text-white' }}">
                    <span class="material-symbols-outlined mr-3 text-xl {{ request()->routeIs('admin.dashboard') ? 'text-primary dark:text-blue-400' : 'text-slate-400 group-hover:text-slate-500 dark:text-slate-400 dark:group-hover:text-slate-300' }}">dashboard</span>
                    Dashboard
                </a>

                {{-- Link: Produk (Contoh link non-aktif) --}}
                <a href="{{ route('admin.products.index') }}" 
                   class="group flex items-center rounded-md px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('admin.products.*') ? 'bg-blue-50 text-primary dark:bg-blue-900/20 dark:text-blue-400' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-700 dark:hover:text-white' }}">
                    <span class="material-symbols-outlined mr-3 text-xl {{ request()->routeIs('admin.products.*') ? 'text-primary dark:text-blue-400' : 'text-slate-400 group-hover:text-slate-500 dark:text-slate-400 dark:group-hover:text-slate-300' }}">inventory_2</span>
                    Produk Afiliasi
                </a>

                {{-- Link: Info Kantor --}}
                <a href="{{ route('admin.info.index')}}" class="group flex items-center rounded-md px-3 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-700 dark:hover:text-white transition-colors">
                    <span class="material-symbols-outlined mr-3 text-xl text-slate-400 group-hover:text-slate-500 dark:text-slate-400 dark:group-hover:text-slate-300">business</span>
                    Info Kantor
                </a>

                {{-- Link: Karyawan (Aktif jika di halaman Users) --}}
                <a href="{{ route('admin.users.index') }}" 
                   class="group flex items-center rounded-md px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-blue-50 text-primary dark:bg-blue-900/20 dark:text-blue-400' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-700 dark:hover:text-white' }}">
                    <span class="material-symbols-outlined mr-3 text-xl {{ request()->routeIs('admin.users.*') ? 'text-primary dark:text-blue-400' : 'text-slate-400 group-hover:text-slate-500 dark:text-slate-400 dark:group-hover:text-slate-300' }}">people</span>
                    Karyawan
                </a>

                {{-- Link: Pengaturan --}}
                <a href="#" class="group flex items-center rounded-md px-3 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-700 dark:hover:text-white transition-colors">
                    <span class="material-symbols-outlined mr-3 text-xl text-slate-400 group-hover:text-slate-500 dark:text-slate-400 dark:group-hover:text-slate-300">settings</span>
                    Pengaturan
                </a>
            </nav>

            {{-- Profil User di Bawah Sidebar --}}
            <div class="border-t border-border-light dark:border-border-dark p-4">
                <div class="flex items-center">
                    <div class="h-8 w-8 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-xs font-bold text-slate-600 dark:text-slate-300 uppercase">
                        {{ substr(auth()->user()->name ?? 'AD', 0, 2) }}
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-slate-700 dark:text-slate-200">{{ auth()->user()->name ?? 'Guest' }}</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400">View Profile</p>
                    </div>
                </div>
            </div>
        </aside>

        {{-- ================================================= --}}
        {{-- BAGIAN 2: AREA KONTEN UTAMA (TERMASUK TOP BAR)    --}}
        {{-- ================================================= --}}
        <div class="flex flex-1 flex-col overflow-hidden relative">
            
            {{-- A. TOP BAR --}}
            <header class="flex h-16 items-center justify-between border-b border-border-light bg-surface-light px-6 dark:border-border-dark dark:bg-surface-dark shadow-sm z-10">
                
                {{-- Tombol Menu Mobile & Judul --}}
                <div class="flex items-center">
                    <button onclick="document.getElementById('sidebar').classList.toggle('hidden')" class="mr-4 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200 focus:outline-none md:hidden">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <div class="flex items-center gap-3">
                        <h1 class="text-lg font-semibold text-slate-800 dark:text-white">
                            @yield('header_title', 'Dashboard Overview')
                        </h1>
                    </div>
                </div>

                {{-- Notifikasi & Dropdown User --}}
                <div class="flex items-center space-x-4">
                    <button class="relative p-2 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200 focus:outline-none">
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="absolute top-1.5 right-1.5 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white dark:ring-surface-dark"></span>
                    </button>
                    <div class="relative">
                        <button class="flex items-center space-x-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary_hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors">
                            <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                            <span class="material-symbols-outlined text-sm">expand_more</span>
                        </button>
                    </div>
                </div>
            </header>

            {{-- B. CONTENT SLOT (Tempat isi halaman berubah-ubah) --}}
            <main class="flex-1 overflow-y-auto bg-background-light p-6 dark:bg-background-dark">
                @yield('content')
            </main>

        </div>
    </div>

    {{-- Script Sederhana untuk Mobile Menu --}}
    <script>
        // Opsional: Klik di luar sidebar untuk menutup di mobile
        document.addEventListener('click', function(event) {
            var sidebar = document.getElementById('sidebar');
            var button = document.querySelector('button[onclick*="sidebar"]');
            if (!sidebar.contains(event.target) && !button.contains(event.target) && !sidebar.classList.contains('hidden') && window.innerWidth < 768) {
                sidebar.classList.add('hidden');
            }
        });
    </script>
</body>
</html>