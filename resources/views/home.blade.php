<x-layout.guest title="ReturnLy - Temukan Kembali Barang Hilangmu dengan Mudah">

    <!-- Hero Section -->
    <section class="relative py-12 md:py-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto space-y-6">
                
                <!-- Badge -->
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-zinc-900/5 border border-zinc-900/10 text-xs font-semibold text-zinc-900">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Sistem Lost & Found Resmi Sekolah</span>
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-zinc-900 leading-tight">
                    Temukan Kembali <br class="hidden sm:inline">
                    <span class="bg-gradient-to-r from-zinc-900 via-zinc-700 to-zinc-900 bg-clip-text text-transparent">Barang Hilangmu</span> dengan Mudah.
                </h1>

                <p class="text-sm sm:text-base text-zinc-600 leading-relaxed">
                    Platform digital sekolah untuk mencatat, mencari, dan mengklaim barang tercecer atau tertinggal di lingkungan sekolah secara aman dan transparan.
                </p>

                <!-- Search Box -->
                <div class="pt-2">
                    <form action="{{ route('lost-items.index') }}" method="GET" class="max-w-xl mx-auto flex flex-col sm:flex-row gap-2 p-2 bg-white rounded-2xl shadow-paper border border-[#E7E2DA]">
                        <div class="relative flex-1">
                            <svg class="w-5 h-5 text-zinc-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <input type="text" name="q" placeholder="Cari nama barang (kalkulator, dompet, kunci...)" class="w-full pl-10 pr-4 py-3 text-xs sm:text-sm bg-transparent rounded-xl focus:outline-none text-zinc-900 placeholder-zinc-400">
                        </div>
                        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-zinc-900 text-white font-semibold text-xs sm:text-sm rounded-xl hover:bg-zinc-800 transition-colors flex items-center justify-center">
                            Cari Barang
                        </button>
                    </form>
                </div>

                <!-- Quick Action Buttons -->
                <div class="pt-4 flex flex-wrap justify-center gap-3">
                    <a href="{{ route('report.lost') }}" class="px-6 py-3.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs sm:text-sm rounded-xl shadow-sm transition-all transform hover:-translate-y-0.5 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        <span>Saya Kehilangan Barang</span>
                    </a>
                    <a href="{{ route('report.found') }}" class="px-6 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm rounded-xl shadow-sm transition-all transform hover:-translate-y-0.5 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Saya Menemukan Barang</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Latest Lost Items Section -->
    <section class="py-10 bg-[#FAF8F4] border-y border-[#E7E2DA]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8">
                <div>
                    <span class="text-xs font-bold text-red-600 uppercase tracking-wider block mb-1">Perlu Bantuan</span>
                    <h2 class="text-2xl font-bold text-zinc-900">Barang Kehilangan Terbaru</h2>
                </div>
                <a href="{{ route('lost-items.index') }}" class="mt-2 sm:mt-0 text-xs font-bold text-zinc-900 hover:underline flex items-center">
                    <span>Lihat Semua ({{ \App\Models\LostItem::count() }})</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            @if ($latestLostItems->isEmpty())
                <div class="text-center py-12 bg-white rounded-2xl border border-[#E7E2DA] p-6">
                    <svg class="w-12 h-12 text-zinc-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <p class="text-sm font-medium text-zinc-600">Belum ada laporan barang hilang terbaru.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($latestLostItems as $item)
                        <x-business.lost-item-card :item="$item" />
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Latest Found Items Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8">
                <div>
                    <span class="text-xs font-bold text-blue-600 uppercase tracking-wider block mb-1">Siap Diklaim</span>
                    <h2 class="text-2xl font-bold text-zinc-900">Barang Ditemukan Terbaru</h2>
                </div>
                <a href="{{ route('found-items.index') }}" class="mt-2 sm:mt-0 text-xs font-bold text-zinc-900 hover:underline flex items-center">
                    <span>Lihat Semua ({{ \App\Models\FoundItem::count() }})</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            @if ($latestFoundItems->isEmpty())
                <div class="text-center py-12 bg-white rounded-2xl border border-[#E7E2DA] p-6">
                    <svg class="w-12 h-12 text-zinc-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <p class="text-sm font-medium text-zinc-600">Belum ada laporan barang ditemukan terbaru.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($latestFoundItems as $item)
                        <x-business.found-item-card :item="$item" />
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-12 bg-[#FAF8F4] border-t border-[#E7E2DA]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-zinc-900 mb-2">Bagaimana ReturnLy Bekerja?</h2>
                <p class="text-xs sm:text-sm text-zinc-600">Alur sederhana dan mudah untuk menemukan kembali barang berharga Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl border border-[#E7E2DA] shadow-paper text-center space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center font-bold text-xl mx-auto">
                        1
                    </div>
                    <h3 class="text-base font-bold text-zinc-900">Buat Laporan</h3>
                    <p class="text-xs text-zinc-600 leading-relaxed">
                        Isi form pelaporan barang hilang atau barang ditemukan dengan melengkapi lokasi, kategori, dan kontak Anda.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-[#E7E2DA] shadow-paper text-center space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-xl mx-auto">
                        2
                    </div>
                    <h3 class="text-base font-bold text-zinc-900">Ajukan Klaim</h3>
                    <p class="text-xs text-zinc-600 leading-relaxed">
                        Jika menemukan barang milik Anda pada daftar barang ditemukan, ajukan klaim kepemilikan beserta deskripsi bukti.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-[#E7E2DA] shadow-paper text-center space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xl mx-auto">
                        3
                    </div>
                    <h3 class="text-base font-bold text-zinc-900">Verifikasi & Pengembalian</h3>
                    <p class="text-xs text-zinc-600 leading-relaxed">
                        Admin sekolah memverifikasi klaim. Setelah disetujui, barang dapat diambil di ruang administrasi sekolah.
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-layout.guest>
