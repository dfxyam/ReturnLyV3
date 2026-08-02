<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard - ReturnLy' }}</title>
    
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
<body class="min-h-screen bg-slate-950 text-slate-100 antialiased selection:bg-emerald-500 selection:text-slate-950 relative overflow-x-hidden" x-data="{ sidebarOpen: false }">

    <!-- Aurora Background -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-emerald-500/15 rounded-full blur-[128px]"></div>
        <div class="absolute top-1/3 -right-40 w-96 h-96 bg-cyan-500/15 rounded-full blur-[128px]"></div>
    </div>

    <div class="flex h-screen overflow-hidden relative z-10">
        <!-- Sidebar Navigation -->
        <aside 
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
            class="fixed md:static inset-y-0 left-0 z-50 w-64 bg-slate-900/80 backdrop-blur-2xl text-white flex flex-col transition-transform duration-300 ease-in-out border-r border-white/10 shadow-2xl">
            
            <!-- Sidebar Header -->
            <div class="h-20 px-6 flex items-center justify-between border-b border-white/10">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-emerald-500 to-cyan-500 text-slate-950 flex items-center justify-center font-bold text-lg shadow-lg shadow-emerald-500/20">
                        RL
                    </div>
                    <div>
                        <span class="text-lg font-bold tracking-tight text-white block leading-none">ReturnLy</span>
                        <span class="text-[10px] text-emerald-400 font-semibold uppercase tracking-wider">Admin Portal</span>
                    </div>
                </a>
                <button @click="sidebarOpen = false" class="md:hidden text-slate-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3.5 py-2.5 rounded-[14px] text-xs font-semibold transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 shadow-md shadow-emerald-500/20 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>

                <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-emerald-400 uppercase tracking-wider">Manajemen Data</div>

                <a href="{{ route('admin.matching.index') }}" class="flex items-center px-3.5 py-2.5 rounded-[14px] text-xs font-semibold transition-all {{ request()->routeIs('admin.matching.*') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 shadow-md shadow-emerald-500/20 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    Smart Matching
                </a>

                <a href="{{ route('admin.lost-items.index') }}" class="flex items-center px-3.5 py-2.5 rounded-[14px] text-xs font-semibold transition-all {{ request()->routeIs('admin.lost-items.*') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 shadow-md shadow-emerald-500/20 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Barang Hilang
                </a>

                <a href="{{ route('admin.found-items.index') }}" class="flex items-center px-3.5 py-2.5 rounded-[14px] text-xs font-semibold transition-all {{ request()->routeIs('admin.found-items.*') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 shadow-md shadow-emerald-500/20 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Barang Ditemukan
                </a>

                <a href="{{ route('admin.claims.index') }}" class="flex items-center px-3.5 py-2.5 rounded-[14px] text-xs font-semibold transition-all {{ request()->routeIs('admin.claims.*') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 shadow-md shadow-emerald-500/20 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Verifikasi Klaim
                </a>

                <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-cyan-400 uppercase tracking-wider">Master & System</div>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center px-3.5 py-2.5 rounded-[14px] text-xs font-semibold transition-all {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 shadow-md shadow-emerald-500/20 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 11h.01M7 15h.01M11 7h8M11 11h8M11 15h8"/></svg>
                    Kategori Barang
                </a>

                <a href="{{ route('admin.locations.index') }}" class="flex items-center px-3.5 py-2.5 rounded-[14px] text-xs font-semibold transition-all {{ request()->routeIs('admin.locations.*') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 shadow-md shadow-emerald-500/20 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                    Lokasi Sekolah
                </a>

                <a href="{{ route('admin.notifications.index') }}" class="flex items-center px-3.5 py-2.5 rounded-[14px] text-xs font-semibold transition-all {{ request()->routeIs('admin.notifications.*') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 shadow-md shadow-emerald-500/20 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    Notifikasi Sistem
                </a>

                <a href="{{ route('admin.activity-logs.index') }}" class="flex items-center px-3.5 py-2.5 rounded-[14px] text-xs font-semibold transition-all {{ request()->routeIs('admin.activity-logs.*') ? 'bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 shadow-md shadow-emerald-500/20 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Activity Logs
                </a>
            </nav>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-white/10 flex items-center justify-between">
                <div class="flex items-center space-x-3 overflow-hidden">
                    <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-emerald-500 to-cyan-500 text-slate-950 flex items-center justify-center font-bold text-xs">
                        {{ strtoupper(substr(auth('admin')->user()->username ?? 'A', 0, 1)) }}
                    </div>
                    <div class="truncate">
                        <div class="text-xs font-semibold text-white truncate">{{ auth('admin')->user()->username ?? 'admin' }}</div>
                        <div class="text-[10px] text-emerald-400 truncate">Administrator</div>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="p-2 text-slate-400 hover:text-rose-400 rounded-xl hover:bg-white/5 transition-colors" title="Logout">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar Header -->
            <header class="h-20 bg-slate-950/70 backdrop-blur-xl border-b border-white/10 px-4 sm:px-8 flex items-center justify-between flex-shrink-0">
                <div class="flex items-center space-x-4">
                    <button @click="sidebarOpen = true" class="md:hidden p-2.5 rounded-xl text-slate-300 hover:bg-white/10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <h1 class="text-lg sm:text-xl font-bold text-white">{{ $header ?? $title ?? 'Dashboard Admin' }}</h1>
                </div>

                <div class="flex items-center space-x-3">
                    <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center space-x-2 text-xs font-semibold px-4 py-2.5 rounded-[16px] bg-slate-900 border border-white/10 text-slate-300 hover:text-white hover:bg-slate-800 transition-all">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        <span>Lihat Website</span>
                    </a>
                </div>
            </header>

            <!-- Scrollable Content -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-8">
                <!-- Flash Alerts -->
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-[20px] bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-sm flex items-start space-x-3 backdrop-blur-xl shadow-lg">
                        <svg class="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <div>
                            <span class="font-semibold block">Berhasil!</span>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 p-4 rounded-[20px] bg-rose-500/10 border border-rose-500/30 text-rose-300 text-sm flex items-start space-x-3 backdrop-blur-xl shadow-lg">
                        <svg class="w-5 h-5 text-rose-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <div>
                            <span class="font-semibold block">Terjadi Kesalahan!</span>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                {{ $slot ?? $content ?? '' }}
            </main>
        </div>
    </div>

</body>
</html>
