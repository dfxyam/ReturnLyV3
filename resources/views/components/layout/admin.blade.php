<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard - ReturnLy' }}</title>
    
    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#F6F1EA] flex antialiased text-gray-900" x-data="{ sidebarOpen: false }">

    <!-- Admin Sidebar (Desktop) -->
    <aside class="hidden lg:flex flex-col w-64 bg-zinc-900 text-white min-h-screen sticky top-0 shadow-xl z-30">
        <!-- Sidebar Brand -->
        <div class="p-6 border-b border-zinc-800 flex items-center space-x-3">
            <div class="w-9 h-9 rounded-xl bg-white text-zinc-900 flex items-center justify-center font-bold text-lg">
                RL
            </div>
            <div>
                <span class="font-bold text-base tracking-tight block leading-none text-white">ReturnLy</span>
                <span class="text-[11px] text-zinc-400 font-medium">Admin Panel</span>
            </div>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white font-bold' : 'text-zinc-400 hover:text-white hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                <span>Dashboard</span>
            </a>

            <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Manajemen Barang</div>

            <a href="{{ route('admin.lost-items.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('admin.lost-items.*') ? 'bg-white/10 text-white font-bold' : 'text-zinc-400 hover:text-white hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <span>Barang Hilang</span>
            </a>

            <a href="{{ route('admin.found-items.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('admin.found-items.*') ? 'bg-white/10 text-white font-bold' : 'text-zinc-400 hover:text-white hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Barang Ditemukan</span>
            </a>

            <a href="{{ route('admin.claims.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('admin.claims.*') ? 'bg-white/10 text-white font-bold' : 'text-zinc-400 hover:text-white hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Verifikasi Klaim</span>
            </a>

            <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Master Data</div>

            <a href="{{ route('admin.categories.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('admin.categories.*') ? 'bg-white/10 text-white font-bold' : 'text-zinc-400 hover:text-white hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                <span>Kategori Barang</span>
            </a>

            <a href="{{ route('admin.locations.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('admin.locations.*') ? 'bg-white/10 text-white font-bold' : 'text-zinc-400 hover:text-white hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span>Lokasi Sekolah</span>
            </a>
        </nav>

        <!-- Admin Profile / Logout Footer -->
        <div class="p-4 border-t border-zinc-800 flex items-center justify-between">
            <div class="flex items-center space-x-2 overflow-hidden">
                <div class="w-8 h-8 rounded-lg bg-zinc-800 text-white flex items-center justify-center font-bold text-xs flex-shrink-0">
                    {{ substr(Auth::guard('admin')->user()->name ?? 'Admin', 0, 1) }}
                </div>
                <div class="truncate">
                    <span class="text-xs font-semibold text-white block truncate">{{ Auth::guard('admin')->user()->name ?? 'Administrator' }}</span>
                    <span class="text-[10px] text-zinc-400 block truncate">{{ Auth::guard('admin')->user()->email ?? 'admin@returnly.test' }}</span>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="p-2 text-zinc-400 hover:text-red-400 hover:bg-white/5 rounded-lg transition-colors" title="Logout">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0 min-h-screen">

        <!-- Top Header Bar -->
        <header class="bg-white border-b border-[#E7E2DA] sticky top-0 z-20 px-4 sm:px-6 py-4 flex items-center justify-between shadow-xs">
            <div class="flex items-center space-x-3">
                <!-- Mobile Hamburger -->
                <button @click="sidebarOpen = !sidebarOpen" type="button" class="lg:hidden p-2 rounded-xl text-zinc-700 hover:bg-zinc-100 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                
                <h1 class="text-lg sm:text-xl font-bold text-zinc-900 tracking-tight">{{ $header ?? 'Admin Dashboard' }}</h1>
            </div>

            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" target="_blank" class="px-3 py-1.5 text-xs font-medium text-zinc-600 hover:text-zinc-900 bg-zinc-100 hover:bg-zinc-200 rounded-lg transition-colors flex items-center space-x-1">
                    <span>Lihat Web Guest</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>
        </header>

        <!-- Main Body -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto">
            <!-- Flash Alerts -->
            @if (session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm flex items-start space-x-3 shadow-sm">
                    <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <div>
                        <span class="font-bold block">Berhasil!</span>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 text-xs sm:text-sm flex items-start space-x-3 shadow-sm">
                    <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>
                        <span class="font-bold block">Terjadi Kesalahan!</span>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>

</body>
</html>
