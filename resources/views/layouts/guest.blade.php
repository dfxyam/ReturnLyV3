<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'ReturnLy - Sistem Lost & Found Sekolah' }}</title>
    
    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col antialiased text-gray-900 selection:bg-zinc-900 selection:text-white" x-data="{ mobileMenuOpen: false }">

    <!-- Top Navigation Bar -->
    <header class="sticky top-0 z-40 bg-[#FCFAF7]/90 backdrop-blur-md border-b border-[#E7E2DA]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 rounded-xl bg-zinc-900 text-white flex items-center justify-center font-bold text-xl shadow-md group-hover:scale-105 transition-transform">
                        RL
                    </div>
                    <div>
                        <span class="text-xl font-bold tracking-tight text-zinc-900 block leading-none">ReturnLy</span>
                        <span class="text-xs text-zinc-500 font-medium tracking-wide">Lost & Found Sekolah</span>
                    </div>
                </a>

                <!-- Desktop Nav Links -->
                <nav class="hidden md:flex items-center space-x-1 lg:space-x-2">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('home') ? 'bg-zinc-900 text-white' : 'text-zinc-700 hover:bg-zinc-200/60' }}">
                        Beranda
                    </a>
                    <a href="{{ route('lost-items.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('lost-items.*') ? 'bg-zinc-900 text-white' : 'text-zinc-700 hover:bg-zinc-200/60' }}">
                        Barang Hilang
                    </a>
                    <a href="{{ route('found-items.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('found-items.*') ? 'bg-zinc-900 text-white' : 'text-zinc-700 hover:bg-zinc-200/60' }}">
                        Barang Ditemukan
                    </a>
                    <a href="{{ route('claims.status') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('claims.status') ? 'bg-zinc-900 text-white' : 'text-zinc-700 hover:bg-zinc-200/60' }}">
                        Cek Klaim
                    </a>
                </nav>

                <!-- Action Buttons (Desktop) -->
                <div class="hidden md:flex items-center space-x-3">
                    <a href="{{ route('report.lost') }}" class="px-4 py-2 text-xs font-semibold rounded-xl border border-red-200 bg-red-50 text-red-700 hover:bg-red-100 transition-colors">
                        + Lapor Hilang
                    </a>
                    <a href="{{ route('report.found') }}" class="px-4 py-2 text-xs font-semibold rounded-xl border border-blue-200 bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors">
                        + Lapor Ditemukan
                    </a>
                    <a href="{{ route('admin.login') }}" class="p-2 text-zinc-500 hover:text-zinc-900 rounded-lg hover:bg-zinc-200/60 transition-colors" title="Login Admin">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden space-x-2">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2 rounded-xl text-zinc-700 hover:bg-zinc-200/70 focus:outline-none">
                        <svg class="w-6 h-6" x-show="!mobileMenuOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg class="w-6 h-6" x-show="mobileMenuOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" x-transition.opacity class="md:hidden border-t border-[#E7E2DA] bg-[#FCFAF7]">
            <div class="px-4 pt-3 pb-6 space-y-2">
                <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-xl font-medium text-sm {{ request()->routeIs('home') ? 'bg-zinc-900 text-white' : 'text-zinc-800 hover:bg-zinc-200/60' }}">
                    Beranda
                </a>
                <a href="{{ route('lost-items.index') }}" class="block px-3 py-2.5 rounded-xl font-medium text-sm {{ request()->routeIs('lost-items.*') ? 'bg-zinc-900 text-white' : 'text-zinc-800 hover:bg-zinc-200/60' }}">
                    Barang Hilang
                </a>
                <a href="{{ route('found-items.index') }}" class="block px-3 py-2.5 rounded-xl font-medium text-sm {{ request()->routeIs('found-items.*') ? 'bg-zinc-900 text-white' : 'text-zinc-800 hover:bg-zinc-200/60' }}">
                    Barang Ditemukan
                </a>
                <a href="{{ route('claims.status') }}" class="block px-3 py-2.5 rounded-xl font-medium text-sm {{ request()->routeIs('claims.status') ? 'bg-zinc-900 text-white' : 'text-zinc-800 hover:bg-zinc-200/60' }}">
                    Cek Status Klaim
                </a>
                <div class="pt-3 border-t border-zinc-200 grid grid-cols-2 gap-2">
                    <a href="{{ route('report.lost') }}" class="block text-center py-2.5 px-3 rounded-xl bg-red-50 text-red-700 font-semibold text-xs border border-red-200">
                        + Lapor Hilang
                    </a>
                    <a href="{{ route('report.found') }}" class="block text-center py-2.5 px-3 rounded-xl bg-blue-50 text-blue-700 font-semibold text-xs border border-blue-200">
                        + Lapor Ditemukan
                    </a>
                </div>
                <div class="pt-2 text-right">
                    <a href="{{ route('admin.login') }}" class="inline-flex items-center space-x-1.5 text-xs text-zinc-500 hover:text-zinc-900 py-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <span>Area Administrator</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="flex-grow pb-24 md:pb-12">
        <!-- Flash Alerts -->
        @if (session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
                <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-start space-x-3 shadow-sm">
                    <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <div>
                        <span class="font-semibold block">Berhasil!</span>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
                <div class="p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 text-sm flex items-start space-x-3 shadow-sm">
                    <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>
                        <span class="font-semibold block">Terjadi Kesalahan!</span>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            </div>
        @endif

        {{ $slot }}
    </main>

    <!-- Mobile App Bottom Navigation Bar (Fixed) -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 z-40 bg-[#FCFAF7] border-t border-[#E7E2DA] shadow-lg px-2 py-2 flex justify-around items-center">
        <a href="{{ route('home') }}" class="flex flex-col items-center py-1 px-3 rounded-lg text-xs font-medium {{ request()->routeIs('home') ? 'text-zinc-900 font-bold' : 'text-zinc-500' }}">
            <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Beranda
        </a>
        <a href="{{ route('lost-items.index') }}" class="flex flex-col items-center py-1 px-3 rounded-lg text-xs font-medium {{ request()->routeIs('lost-items.*') ? 'text-red-700 font-bold' : 'text-zinc-500' }}">
            <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            Hilang
        </a>
        <a href="{{ route('found-items.index') }}" class="flex flex-col items-center py-1 px-3 rounded-lg text-xs font-medium {{ request()->routeIs('found-items.*') ? 'text-blue-700 font-bold' : 'text-zinc-500' }}">
            <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Ditemukan
        </a>
        <a href="{{ route('claims.status') }}" class="flex flex-col items-center py-1 px-3 rounded-lg text-xs font-medium {{ request()->routeIs('claims.status') ? 'text-zinc-900 font-bold' : 'text-zinc-500' }}">
            <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            Klaim
        </a>
    </nav>

    <!-- Footer (Desktop & Tablet) -->
    <footer class="bg-[#FAF8F4] border-t border-[#E7E2DA] py-10 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-8 h-8 rounded-lg bg-zinc-900 text-white flex items-center justify-center font-bold text-base">
                            RL
                        </div>
                        <span class="text-lg font-bold text-zinc-900">ReturnLy</span>
                    </div>
                    <p class="text-xs text-zinc-600 leading-relaxed max-w-sm">
                        Sistem Informasi Pelaporan Barang Hilang dan Ditemukan di Sekolah. Memudahkan pengembalian barang secara aman, transparan, dan terintegrasi.
                    </p>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-zinc-900 uppercase tracking-wider mb-3">Navigasi Cepat</h4>
                    <ul class="space-y-2 text-xs text-zinc-600">
                        <li><a href="{{ route('home') }}" class="hover:text-zinc-900">Beranda</a></li>
                        <li><a href="{{ route('lost-items.index') }}" class="hover:text-zinc-900">Daftar Barang Hilang</a></li>
                        <li><a href="{{ route('found-items.index') }}" class="hover:text-zinc-900">Daftar Barang Ditemukan</a></li>
                        <li><a href="{{ route('claims.status') }}" class="hover:text-zinc-900">Tracking Status Klaim</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-zinc-900 uppercase tracking-wider mb-3">Lapor Barang</h4>
                    <ul class="space-y-2 text-xs text-zinc-600">
                        <li><a href="{{ route('report.lost') }}" class="hover:text-zinc-900 text-red-600 font-medium">+ Lapor Kehilangan</a></li>
                        <li><a href="{{ route('report.found') }}" class="hover:text-zinc-900 text-blue-600 font-medium">+ Lapor Penemuan</a></li>
                        <li><a href="{{ route('admin.login') }}" class="hover:text-zinc-900">Portal Admin</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-6 border-t border-[#E7E2DA] flex flex-col sm:flex-row justify-between items-center text-xs text-zinc-500">
                <p>&copy; {{ date('Y') }} ReturnLy School Lost & Found. All rights reserved.</p>
                <p class="mt-2 sm:mt-0">Responsive Web App • Desktop & Mobile Compatible</p>
            </div>
        </div>
    </footer>

</body>
</html>
