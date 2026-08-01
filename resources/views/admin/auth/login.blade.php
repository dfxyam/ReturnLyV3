<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - ReturnLy</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#F6F1EA] flex items-center justify-center p-4 antialiased">

    <div class="w-full max-w-md bg-white rounded-3xl border border-[#E7E2DA] shadow-paper-lg p-8 space-y-6">
        <!-- Brand Header -->
        <div class="text-center space-y-2">
            <div class="w-12 h-12 rounded-2xl bg-zinc-900 text-white flex items-center justify-center font-bold text-2xl mx-auto shadow-md">
                RL
            </div>
            <h1 class="text-2xl font-bold text-zinc-900">Portal Administrator</h1>
            <p class="text-xs text-zinc-500">Masuk untuk mengelola laporan dan klaim barang ReturnLy</p>
        </div>

        @if (session('error'))
            <div class="p-3 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs font-medium text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Email Administrator</label>
                <input type="email" name="email" value="{{ old('email', 'admin@returnly.test') }}" required autofocus placeholder="admin@returnly.test" class="w-full px-4 py-3 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Password</label>
                <input type="password" name="password" value="password123" required placeholder="••••••••" class="w-full px-4 py-3 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                @error('password') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center text-zinc-600">
                    <input type="checkbox" name="remember" class="rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900">
                    <span class="ml-2">Ingat saya</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3.5 bg-zinc-900 hover:bg-zinc-800 text-white font-bold text-xs sm:text-sm rounded-xl shadow-md transition-all">
                Masuk Dashboard
            </button>
        </form>

        <div class="text-center pt-2 border-t border-zinc-100">
            <a href="{{ route('home') }}" class="text-xs text-zinc-500 hover:text-zinc-900 transition-colors">
                &larr; Kembali ke Beranda Utama
            </a>
        </div>
    </div>

</body>
</html>
