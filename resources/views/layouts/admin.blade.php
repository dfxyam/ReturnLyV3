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
<body class="min-h-screen bg-[#F6F1EA] antialiased text-gray-900" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Navigation (Desktop & Mobile Drawer) -->
        <aside 
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
            class="fixed md:static inset-y-0 left-0 z-50 w-64 bg-zinc-900 text-white flex flex-col transition-transform duration-200 ease-in-out shadow-xl md:shadow-none">
            
            <!-- Sidebar Header -->
            <div class="h-20 px-6 flex items-center justify-between border-b border-zinc-800">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-xl bg-white text-zinc-900 flex items-center justify-center font-bold text-lg">
                        RL
                    </div>
                    <div>
                        <span class="text-lg font-bold tracking-tight text-white block leading-none">ReturnLy</span>
                        <span class="text-[10px] text-zinc-400 font-medium uppercase tracking-wider">Admin Portal</span>
                    </div>
                </a>
                <button @click="sidebarOpen = false" class="md:hidden text-zinc-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-zinc-800 text-white font-semibold' : 'text-zinc-400 hover:bg-zinc-800/60 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>

                <div class="pt-4 pb-1 px-3 text-[11px] font-bold text-zinc-500 uppercase tracking-wider">Manajemen Data</div>

                <a href="{{ route('admin.lost-items.index') }}" class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.lost-items.*') ? 'bg-zinc-800 text-white font-semibold' : 'text-zinc-400 hover:bg-zinc-800/60 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Barang Hilang
                </a>

                <a href="{{ route('admin.found-items.index') }}" class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.found-items.*') ? 'bg-zinc-800 text-white font-semibold' : 'text-zinc-400 hover:bg-zinc-800/60 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Barang Ditemukan
                </a>

                <a href="{{ route('admin.claims.index') }}" class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.claims.*') ? 'bg-zinc-800 text-white font-semibold' : 'text-zinc-400 hover:bg-zinc-800/60 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Verifikasi Klaim
                </a>

                <div class="pt-4 pb-1 px-3 text-[11px] font-bold text-zinc-500 uppercase tracking-wider">Master Data</div>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.categories.*') ? 'bg-zinc-800 text-white font-semibold' : 'text-zinc-400 hover:bg-zinc-800/60 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 11h.01M7 15h.01M11 7h8M11 11h8M11 15h8"/></svg>
                    Kategori Barang
                </a>

                <a href="{{ route('admin.locations.index') }}" class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.locations.*') ? 'bg-zinc-800 text-white font-semibold' : 'text-zinc-400 hover:bg-zinc-800/60 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                    Lokasi Sekolah
                </a>
            </nav>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-zinc-800 flex items-center justify-between">
                <div class="flex items-center space-x-3 overflow-hidden">
                    <div class="w-8 h-8 rounded-full bg-zinc-700 flex items-center justify-center font-bold text-xs text-white">
                        {{ strtoupper(substr(auth('admin')->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="truncate">
                        <div class="text-xs font-semibold text-white truncate">{{ auth('admin')->user()->name ?? 'Administrator' }}</div>
                        <div class="text-[10px] text-zinc-400 truncate">{{ auth('admin')->user()->email ?? 'admin@returnly.test' }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="p-1.5 text-zinc-400 hover:text-red-400 rounded-lg hover:bg-zinc-800 transition-colors" title="Logout">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar Header -->
            <header class="h-20 bg-[#FCFAF7] border-b border-[#E7E2DA] px-4 sm:px-8 flex items-center justify-between flex-shrink-0">
                <div class="flex items-center space-x-4">
                    <button @click="sidebarOpen = true" class="md:hidden p-2 rounded-xl text-zinc-700 hover:bg-zinc-200/60">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <h1 class="text-lg sm:text-xl font-bold text-zinc-900">{{ $header ?? 'Dashboard' }}</h1>
                </div>

                <div class="flex items-center space-x-3">
                    <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center space-x-1.5 text-xs font-semibold px-3 py-2 rounded-xl bg-zinc-100 text-zinc-700 hover:bg-zinc-200 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        <span>Lihat Website Guest</span>
                    </a>
                </div>
            </header>

            <!-- Scrollable Content -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-8">
                <!-- Flash Alerts -->
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-start space-x-3 shadow-sm">
                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <div>
                            <span class="font-semibold block">Berhasil!</span>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 text-sm flex items-start space-x-3 shadow-sm">
                        <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <div>
                            <span class="font-semibold block">Terjadi Kesalahan!</span>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>
