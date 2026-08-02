<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'ReturnLy - Lost & Found Sekolah' }}</title>
    
    <!-- Google Fonts Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col antialiased bg-slate-950 text-slate-100 selection:bg-emerald-500 selection:text-slate-950 relative overflow-x-hidden" x-data="{ mobileMenuOpen: false }">

    <!-- Aurora Background Effects -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-emerald-500/20 rounded-full blur-[128px]"></div>
        <div class="absolute top-1/3 -right-40 w-96 h-96 bg-cyan-500/20 rounded-full blur-[128px]"></div>
        <div class="absolute -bottom-40 left-1/3 w-96 h-96 bg-purple-500/20 rounded-full blur-[128px]"></div>
    </div>

    <!-- Glass Navbar -->
    <header class="sticky top-0 z-50 bg-slate-950/70 backdrop-blur-xl border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group z-10">
                    <div class="w-10 h-10 rounded-[14px] bg-gradient-to-tr from-emerald-500 to-cyan-500 text-slate-950 flex items-center justify-center font-bold text-xl shadow-lg shadow-emerald-500/20 group-hover:scale-105 transition-transform">
                        RL
                    </div>
                    <div>
                        <span class="text-xl font-bold tracking-tight bg-gradient-to-r from-white via-slate-100 to-slate-300 bg-clip-text text-transparent block leading-none">ReturnLy</span>
                        <span class="text-xs text-emerald-400 font-medium tracking-wide">Lost & Found Sekolah</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-2 bg-slate-900/50 p-1.5 rounded-full border border-white/10 backdrop-blur-md">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-full text-xs font-semibold transition-all {{ request()->routeIs('home') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 shadow-md' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Beranda
                    </a>
                    <a href="{{ route('lost-items.index') }}" class="px-4 py-2 rounded-full text-xs font-semibold transition-all {{ request()->routeIs('lost-items.*') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 shadow-md' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Barang Hilang
                    </a>
                    <a href="{{ route('found-items.index') }}" class="px-4 py-2 rounded-full text-xs font-semibold transition-all {{ request()->routeIs('found-items.*') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 shadow-md' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Barang Ditemukan
                    </a>
                    <a href="{{ route('claims.status') }}" class="px-4 py-2 rounded-full text-xs font-semibold transition-all {{ request()->routeIs('claims.status') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 shadow-md' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Cek Klaim
                    </a>
                </nav>

                <!-- Desktop Actions -->
                <div class="hidden md:flex items-center space-x-3">
                    <a href="{{ route('report.lost') }}" class="px-4 py-2.5 text-xs font-semibold rounded-[16px] border border-amber-500/30 bg-amber-500/10 text-amber-300 hover:bg-amber-500/20 transition-all backdrop-blur-md">
                        + Lapor Hilang
                    </a>
                    <a href="{{ route('report.found') }}" class="px-4 py-2.5 text-xs font-semibold rounded-[16px] border border-cyan-500/30 bg-cyan-500/10 text-cyan-300 hover:bg-cyan-500/20 transition-all backdrop-blur-md">
                        + Lapor Ditemukan
                    </a>
                    <a href="{{ route('admin.login') }}" class="p-2.5 text-slate-400 hover:text-white rounded-[14px] hover:bg-white/5 border border-white/5 transition-all" title="Login Admin">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2.5 rounded-xl text-slate-300 hover:bg-white/10 focus:outline-none">
                        <svg class="w-6 h-6" x-show="!mobileMenuOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg class="w-6 h-6" x-show="mobileMenuOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Drawer -->
        <div x-show="mobileMenuOpen" x-transition.opacity class="md:hidden border-t border-white/10 bg-slate-950/95 backdrop-blur-2xl">
            <div class="px-4 pt-3 pb-6 space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl font-medium text-sm {{ request()->routeIs('home') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-semibold' : 'text-slate-300 hover:bg-white/5' }}">
                    Beranda
                </a>
                <a href="{{ route('lost-items.index') }}" class="block px-4 py-3 rounded-xl font-medium text-sm {{ request()->routeIs('lost-items.*') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-semibold' : 'text-slate-300 hover:bg-white/5' }}">
                    Barang Hilang
                </a>
                <a href="{{ route('found-items.index') }}" class="block px-4 py-3 rounded-xl font-medium text-sm {{ request()->routeIs('found-items.*') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-semibold' : 'text-slate-300 hover:bg-white/5' }}">
                    Barang Ditemukan
                </a>
                <a href="{{ route('claims.status') }}" class="block px-4 py-3 rounded-xl font-medium text-sm {{ request()->routeIs('claims.status') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-semibold' : 'text-slate-300 hover:bg-white/5' }}">
                    Cek Status Klaim
                </a>
                <div class="pt-3 border-t border-white/10 grid grid-cols-2 gap-2">
                    <a href="{{ route('report.lost') }}" class="block text-center py-2.5 px-3 rounded-xl bg-amber-500/20 text-amber-300 font-semibold text-xs border border-amber-500/30">
                        + Lapor Hilang
                    </a>
                    <a href="{{ route('report.found') }}" class="block text-center py-2.5 px-3 rounded-xl bg-cyan-500/20 text-cyan-300 font-semibold text-xs border border-cyan-500/30">
                        + Lapor Ditemukan
                    </a>
                </div>
                <div class="pt-2 text-right">
                    <a href="{{ route('admin.login') }}" class="inline-flex items-center space-x-1.5 text-xs text-slate-400 hover:text-white py-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <span>Portal Administrator</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="flex-grow z-10 pb-24 md:pb-12">
        <!-- Flash Alerts -->
        @if (session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
                <div class="p-4 rounded-[20px] bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-sm flex items-start space-x-3 backdrop-blur-xl shadow-lg">
                    <svg class="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <div>
                        <span class="font-semibold block">Berhasil!</span>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
                <div class="p-4 rounded-[20px] bg-rose-500/10 border border-rose-500/30 text-rose-300 text-sm flex items-start space-x-3 backdrop-blur-xl shadow-lg">
                    <svg class="w-5 h-5 text-rose-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>
                        <span class="font-semibold block">Terjadi Kesalahan!</span>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            </div>
        @endif

        {{ $slot }}
    </main>

    <!-- Mobile Navigation Bar -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 z-40 bg-slate-950/90 border-t border-white/10 backdrop-blur-xl px-2 py-2 flex justify-around items-center">
        <a href="{{ route('home') }}" class="flex flex-col items-center py-1 px-3 rounded-lg text-xs font-medium {{ request()->routeIs('home') ? 'text-emerald-400 font-bold' : 'text-slate-400' }}">
            <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Beranda
        </a>
        <a href="{{ route('lost-items.index') }}" class="flex flex-col items-center py-1 px-3 rounded-lg text-xs font-medium {{ request()->routeIs('lost-items.*') ? 'text-amber-400 font-bold' : 'text-slate-400' }}">
            <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            Hilang
        </a>
        <a href="{{ route('found-items.index') }}" class="flex flex-col items-center py-1 px-3 rounded-lg text-xs font-medium {{ request()->routeIs('found-items.*') ? 'text-cyan-400 font-bold' : 'text-slate-400' }}">
            <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Ditemukan
        </a>
        <a href="{{ route('claims.status') }}" class="flex flex-col items-center py-1 px-3 rounded-lg text-xs font-medium {{ request()->routeIs('claims.status') ? 'text-emerald-400 font-bold' : 'text-slate-400' }}">
            <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            Klaim
        </a>
    </nav>

    <!-- Footer -->
    <footer class="bg-slate-950/80 border-t border-white/10 py-12 z-10 backdrop-blur-md mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-emerald-500 to-cyan-500 text-slate-950 flex items-center justify-center font-bold text-base shadow-md">
                            RL
                        </div>
                        <span class="text-lg font-bold text-white">ReturnLy</span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed max-w-sm">
                        Platform Terpusat Pelaporan & Pengembalian Barang Hilang di Sekolah. Cepat, Transparan, dan Terpercaya.
                    </p>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-emerald-400 uppercase tracking-wider mb-3">Navigasi Utama</h4>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="{{ route('lost-items.index') }}" class="hover:text-white transition-colors">Barang Hilang</a></li>
                        <li><a href="{{ route('found-items.index') }}" class="hover:text-white transition-colors">Barang Ditemukan</a></li>
                        <li><a href="{{ route('claims.status') }}" class="hover:text-white transition-colors">Cek Status Klaim</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-cyan-400 uppercase tracking-wider mb-3">Lapor & Admin</h4>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li><a href="{{ route('report.lost') }}" class="hover:text-amber-300 text-amber-400 font-medium">+ Lapor Kehilangan</a></li>
                        <li><a href="{{ route('report.found') }}" class="hover:text-cyan-300 text-cyan-400 font-medium">+ Lapor Penemuan</a></li>
                        <li><a href="{{ route('admin.login') }}" class="hover:text-white transition-colors">Portal Admin</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-6 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} ReturnLy Lost & Found Sekolah. All rights reserved.</p>
                <p class="mt-2 sm:mt-0">Responsive Glassmorphism Web App</p>
            </div>
        </div>
    </footer>

</body>
</html>
