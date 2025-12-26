<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Kantor</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="bg-slate-50 antialiased min-h-screen flex items-center justify-center p-4">
    <!-- Background Decor -->
    <div class="fixed inset-0 overflow-hidden -z-10">
        <div class="absolute -top-[10%] -right-[10%] w-[40%] h-[40%] bg-blue-100/50 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-[10%] -left-[10%] w-[40%] h-[40%] bg-blue-50 rounded-full blur-3xl"></div>
    </div>

    <div class="w-full max-w-md">
        <!-- Logo/Header Area -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center bg-blue-600 p-3 rounded-2xl shadow-xl mb-4 group hover:rotate-6 transition-transform">
                <span class="material-icons-outlined text-white text-3xl">dashboard</span>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Selamat Datang</h1>
            <p class="text-slate-500 font-medium mt-2">Sistem Manajemen Kantor V.1.0</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white/70 glass-effect p-8 rounded-[2rem] shadow-2xl shadow-blue-100/50 border border-white relative overflow-hidden">
            <!-- Decorative line -->
            <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-blue-400 via-blue-600 to-indigo-600"></div>

            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-4 rounded-2xl text-sm mb-6 border border-red-100 flex items-start gap-3 animate-shake">
                    <span class="material-icons-outlined text-red-500">error_outline</span>
                    <div>
                        @foreach ($errors->all() as $error)
                            <p class="font-semibold">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Alamat Email Staff</label>
                    <div class="relative group">
                        <span class="material-icons-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-600 transition-colors">email</span>
                        <input type="email" name="email" value="{{ old('email') }}" 
                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all text-slate-700 font-semibold placeholder:text-slate-300 placeholder:font-normal"
                            placeholder="nama@kantor.com" required autofocus>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Kata Sandi</label>
                    <div class="relative group">
                        <span class="material-icons-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-600 transition-colors">lock</span>
                        <input type="password" name="password" 
                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all text-slate-700 font-semibold placeholder:text-slate-300 placeholder:font-normal"
                            placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl transition-all shadow-xl shadow-blue-200 active:scale-[0.98] flex items-center justify-center gap-2 group">
                    <span>Masuk ke Dashboard</span>
                    <span class="material-icons-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </button>
            </form>
        </div>

        <!-- Footer -->
        <div class="mt-10 text-center">
            <p class="text-sm font-medium text-slate-400 flex items-center justify-center gap-1">
                &copy; {{ date('Y') }} <span class="text-blue-600 font-bold">Tim IT Kantor</span>
            </p>
            <div class="mt-4 flex justify-center gap-6">
                <a href="#" class="text-xs text-slate-400 hover:text-blue-600 transition-colors font-semibold">Bantuan</a>
                <a href="#" class="text-xs text-slate-400 hover:text-blue-600 transition-colors font-semibold">Kebijakan</a>
            </div>
        </div>
    </div>

    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-4px); }
            75% { transform: translateX(4px); }
        }
        .animate-shake {
            animation: shake 0.4s ease-in-out 0s 2;
        }
    </style>
</body>
</html>

