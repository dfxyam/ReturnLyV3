<x-layouts.guest title="Daftar Barang Ditemukan - ReturnLy">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 space-y-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <span class="px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-300 text-xs font-semibold border border-cyan-500/20 backdrop-blur-md">
                    Barang Ditemukan
                </span>
                <h1 class="text-2xl sm:text-4xl font-bold text-white tracking-tight mt-2">Daftar Barang Ditemukan</h1>
                <p class="text-xs sm:text-sm text-slate-400 mt-1">Lihat daftar barang yang ditemukan di sekolah dan ajukan klaim kepemilikan.</p>
            </div>
            <a href="{{ route('report.found') }}" class="px-5 py-3 bg-gradient-to-r from-cyan-500 to-emerald-500 text-slate-950 font-bold text-xs sm:text-sm rounded-[16px] hover:brightness-110 shadow-lg shadow-cyan-500/20 transition-all flex items-center justify-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>+ Lapor Barang Ditemukan</span>
            </a>
        </div>

        <!-- Search & Filter Form -->
        <div class="glass-card p-5 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl">
            <form action="{{ route('found-items.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama barang..." class="w-full px-4 py-2.5 text-xs bg-slate-950/60 border border-white/10 rounded-[16px] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500">
                </div>

                <div>
                    <select name="category_id" class="w-full px-4 py-2.5 text-xs bg-slate-950/60 border border-white/10 rounded-[16px] text-white focus:outline-none focus:border-cyan-500">
                        <option value="" class="bg-slate-900 text-slate-400">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" class="bg-slate-900 text-white" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <select name="location_id" class="w-full px-4 py-2.5 text-xs bg-slate-950/60 border border-white/10 rounded-[16px] text-white focus:outline-none focus:border-cyan-500">
                        <option value="" class="bg-slate-900 text-slate-400">Semua Lokasi</option>
                        @foreach($locations as $loc)
                            <option value="{{ $loc->id }}" class="bg-slate-900 text-white" {{ request('location_id') == $loc->id ? 'selected' : '' }}>{{ $loc->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex space-x-2">
                    <select name="status" class="flex-1 px-4 py-2.5 text-xs bg-slate-950/60 border border-white/10 rounded-[16px] text-white focus:outline-none focus:border-cyan-500">
                        <option value="" class="bg-slate-900 text-slate-400">Semua Status</option>
                        <option value="Menunggu Pemilik" class="bg-slate-900 text-white" {{ request('status') == 'Menunggu Pemilik' ? 'selected' : '' }}>Menunggu Pemilik</option>
                        <option value="Diklaim" class="bg-slate-900 text-white" {{ request('status') == 'Diklaim' ? 'selected' : '' }}>Diklaim</option>
                        <option value="Dikembalikan" class="bg-slate-900 text-white" {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    </select>
                    <button type="submit" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white font-semibold text-xs rounded-[16px] transition-colors">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Items Grid -->
        @if ($items->isEmpty())
            <div class="glass-card p-12 rounded-[24px] border border-white/10 bg-slate-900/40 text-center">
                <svg class="w-12 h-12 text-slate-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <h3 class="text-sm font-bold text-white mb-1">Tidak Ada Laporan Barang Ditemukan</h3>
                <p class="text-xs text-slate-400">Coba ubah kata kunci pencarian atau filter yang Anda gunakan.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($items as $item)
                    <x-business.found-item-card :item="$item" />
                @endforeach
            </div>

            <div class="pt-4">
                {{ $items->links() }}
            </div>
        @endif
    </div>

</x-layouts.guest>
