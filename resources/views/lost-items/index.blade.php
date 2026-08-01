<x-layout.guest title="Daftar Barang Hilang - ReturnLy">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-zinc-900 tracking-tight">Daftar Barang Hilang</h1>
                <p class="text-xs sm:text-sm text-zinc-600 mt-1">Cari dan bantu sesama siswa menemukan barang yang hilang.</p>
            </div>
            <a href="{{ route('report.lost') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs rounded-xl shadow-sm transition-colors">
                + Lapor Kehilangan
            </a>
        </div>

        <!-- Filter & Search Bar -->
        <div class="bg-white p-4 rounded-2xl border border-[#E7E2DA] shadow-paper mb-8">
            <form action="{{ route('lost-items.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <!-- Search Input -->
                <div class="relative">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama barang..." class="w-full px-3.5 py-2.5 text-xs bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                </div>

                <!-- Category Filter -->
                <div>
                    <select name="category_id" class="w-full px-3.5 py-2.5 text-xs bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Location Filter -->
                <div>
                    <select name="location_id" class="w-full px-3.5 py-2.5 text-xs bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                        <option value="">Semua Lokasi</option>
                        @foreach ($locations as $loc)
                            <option value="{{ $loc->id }}" {{ request('location_id') == $loc->id ? 'selected' : '' }}>{{ $loc->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="flex gap-2">
                    <button type="submit" class="flex-1 bg-zinc-900 text-white font-semibold text-xs rounded-xl hover:bg-zinc-800 transition-colors py-2.5">
                        Terapkan Filter
                    </button>
                    @if (request()->hasAny(['q', 'category_id', 'location_id', 'status']))
                        <a href="{{ route('lost-items.index') }}" class="px-3.5 py-2.5 bg-zinc-100 text-zinc-700 font-semibold text-xs rounded-xl hover:bg-zinc-200 transition-colors flex items-center justify-center" title="Reset Filter">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Items Grid -->
        @if ($lostItems->isEmpty())
            <div class="text-center py-16 bg-white rounded-2xl border border-[#E7E2DA] p-6 shadow-paper">
                <svg class="w-16 h-16 text-zinc-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <h3 class="text-base font-bold text-zinc-900 mb-1">Tidak Ada Laporan Ditemukan</h3>
                <p class="text-xs text-zinc-500 max-w-sm mx-auto mb-6">Coba ubah kata kunci atau filter pencarian Anda.</p>
                <a href="{{ route('lost-items.index') }}" class="px-4 py-2 bg-zinc-900 text-white text-xs font-semibold rounded-xl">Lihat Semua Barang Hilang</a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach ($lostItems as $item)
                    <x-business.lost-item-card :item="$item" />
                @endforeach
            </div>

            <!-- Pagination -->
            <div>
                {{ $lostItems->links() }}
            </div>
        @endif
    </div>

</x-layout.guest>
