<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Info Kantor</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 antialiased">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-white border-r border-slate-200 flex flex-col sticky top-0 h-screen shadow-sm">
            <div class="p-6 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="bg-blue-600 p-2 rounded-xl">
                        <span class="material-icons-outlined text-white">dashboard</span>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-800 uppercase">Aplikasi</span>
                </div>
            </div>

            <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
                <p class="px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Menu Utama</p>
                
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-all group">
                    <span class="material-icons-outlined">home</span>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="{{ route('admin.info.index') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-600 text-white rounded-xl shadow-md shadow-blue-200 transition-all">
                    <span class="material-icons-outlined">campaign</span>
                    <span class="font-medium">Info Kantor</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-all">
                    <span class="material-icons-outlined">people</span>
                    <span class="font-medium">Data Pegawai</span>
                </a>

                <p class="px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-6 mb-2">Pengaturan</p>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-red-50 hover:text-red-600 rounded-xl transition-all group">
                    <span class="material-icons-outlined group-hover:rotate-12 transition-transform">logout</span>
                    <span class="font-medium">Keluar</span>
                </a>
            </nav>

            <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                <div class="flex items-center gap-3 px-2">
                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold border-2 border-white shadow-sm">
                        A
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-xs font-bold text-slate-800 truncate">Administrator</p>
                        <p class="text-[10px] text-slate-500 truncate">admin@kantor.com</p>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 flex flex-col">
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-10">
                <div class="text-sm font-medium text-slate-500">
                    Sistem Manajemen Kantor &bull; {{ date('d F Y') }}
                </div>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-slate-400 hover:text-blue-600 transition-colors">
                        <span class="material-icons-outlined">notifications</span>
                    </button>
                </div>
            </header>

            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>

    @livewireScripts
</body>
</html>