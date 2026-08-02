<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - ReturnLy</title>
    
    <!-- Google Fonts Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-slate-950 flex items-center justify-center p-4 antialiased text-slate-100 relative overflow-hidden">

    <!-- Aurora Background -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-emerald-500/20 rounded-full blur-[128px]"></div>
        <div class="absolute top-1/3 -right-40 w-96 h-96 bg-cyan-500/20 rounded-full blur-[128px]"></div>
    </div>

    <div class="w-full max-w-md glass-card rounded-[28px] border border-white/10 bg-slate-900/40 backdrop-blur-2xl p-8 space-y-6 relative z-10 shadow-2xl shadow-emerald-500/10">
        <!-- Brand Header -->
        <div class="text-center space-y-2">
            <div class="w-12 h-12 rounded-[16px] bg-gradient-to-tr from-emerald-500 to-cyan-500 text-slate-950 flex items-center justify-center font-bold text-2xl mx-auto shadow-lg shadow-emerald-500/20">
                RL
            </div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Portal Administrator</h1>
            <p class="text-xs text-slate-400">Masuk dengan akun admin untuk mengelola data ReturnLy</p>
        </div>

        @if (session('error'))
            <div class="p-3 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs font-medium text-center backdrop-blur-md">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Username Admin</label>
                <input type="text" name="username" value="{{ old('username', 'admin') }}" required autofocus placeholder="admin" class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 transition-all">
                @error('username') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Password</label>
                <input type="password" name="password" value="admin123" required placeholder="••••••••" class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 transition-all">
                @error('password') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center text-slate-400">
                    <input type="checkbox" name="remember" class="rounded border-white/10 bg-slate-950 text-emerald-500 focus:ring-emerald-500">
                    <span class="ml-2">Ingat saya</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-bold text-xs sm:text-sm rounded-[16px] hover:brightness-110 shadow-lg shadow-emerald-500/20 transition-all">
                Masuk Dashboard Admin
            </button>
        </form>

        <div class="text-center pt-2 border-t border-white/10">
            <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-white transition-colors">
                &larr; Kembali ke Beranda Utama
            </a>
        </div>
    </div>

</body>
</html>
