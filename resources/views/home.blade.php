<x-layouts.guest title="ReturnLy - Temukan Kembali Barang Hilangmu dengan Mudah">

    <!-- Hero Section -->
    <section class="relative py-16 md:py-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto space-y-6">
                
                <!-- Badge -->
                <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-xs font-semibold text-emerald-300 backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Platform Lost & Found Resmi Sekolah</span>
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-tight">
                    Temukan Kembali <br class="hidden sm:inline">
                    <span class="bg-gradient-to-r from-emerald-400 via-cyan-400 to-purple-400 bg-clip-text text-transparent">Barang Hilangmu</span> dengan Mudah.
                </h1>

                <p class="text-xs sm:text-base text-slate-300 leading-relaxed max-w-2xl mx-auto">
                    Platform digital sekolah untuk mencatat, mencari, dan mengklaim barang tercecer di lingkungan sekolah secara transparan, aman, dan real-time.
                </p>

                <!-- Search Box -->
                <div class="pt-4">
                    <form action="{{ route('lost-items.index') }}" method="GET" class="max-w-xl mx-auto flex flex-col sm:flex-row gap-2 p-2 bg-slate-900/60 rounded-[20px] border border-white/10 backdrop-blur-2xl shadow-2xl shadow-emerald-500/5">
                        <div class="relative flex-1">
                            <svg class="w-5 h-5 text-emerald-400 absolute left-4 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <input type="text" name="search" placeholder="Cari nama barang (kalkulator, dompet, kunci...)" class="w-full pl-11 pr-4 py-3 text-xs sm:text-sm bg-transparent rounded-[16px] focus:outline-none text-white placeholder-slate-400">
                        </div>
                        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-bold text-xs sm:text-sm rounded-[16px] hover:brightness-110 shadow-lg shadow-emerald-500/20 transition-all flex items-center justify-center">
                            Cari Barang
                        </button>
                    </form>
                </div>

                <!-- Quick Action Buttons -->
                <div class="pt-4 flex flex-wrap justify-center gap-4">
                    <a href="{{ route('report.lost') }}" class="px-6 py-3.5 bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 font-semibold text-xs sm:text-sm rounded-[18px] border border-amber-500/30 transition-all backdrop-blur-md flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        <span>Saya Kehilangan Barang</span>
                    </a>
                    <a href="{{ route('report.found') }}" class="px-6 py-3.5 bg-cyan-500/20 hover:bg-cyan-500/30 text-cyan-300 font-semibold text-xs sm:text-sm rounded-[18px] border border-cyan-500/30 transition-all backdrop-blur-md flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Saya Menemukan Barang</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Latest Lost Items Section -->
    <section class="py-14 bg-slate-900/30 border-y border-white/5 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8">
                <div>
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block mb-1">Perlu Bantuan</span>
                    <h2 class="text-2xl font-bold text-white">Laporan Barang Hilang Terbaru</h2>
                </div>
                <a href="{{ route('lost-items.index') }}" class="mt-2 sm:mt-0 text-xs font-semibold text-emerald-400 hover:text-emerald-300 flex items-center transition-colors">
                    <span>Lihat Semua ({{ $stats['total_lost'] }})</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            @if ($latestLostItems->isEmpty())
                <div class="glass-card p-12 rounded-[24px] border border-white/10 bg-slate-900/40 text-center">
                    <svg class="w-12 h-12 text-slate-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <p class="text-xs font-medium text-slate-400">Belum ada laporan barang hilang terbaru.</p>
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
    <section class="py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8">
                <div>
                    <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider block mb-1">Siap Diklaim</span>
                    <h2 class="text-2xl font-bold text-white">Barang Ditemukan Terbaru</h2>
                </div>
                <a href="{{ route('found-items.index') }}" class="mt-2 sm:mt-0 text-xs font-semibold text-emerald-400 hover:text-emerald-300 flex items-center transition-colors">
                    <span>Lihat Semua ({{ $stats['total_found'] }})</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            @if ($latestFoundItems->isEmpty())
                <div class="glass-card p-12 rounded-[24px] border border-white/10 bg-slate-900/40 text-center">
                    <svg class="w-12 h-12 text-slate-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <p class="text-xs font-medium text-slate-400">Belum ada laporan barang ditemukan terbaru.</p>
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
    <section class="py-16 bg-slate-900/30 border-t border-white/5 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-white mb-2">Bagaimana ReturnLy Bekerja?</h2>
                <p class="text-xs sm:text-sm text-slate-400">Alur sederhana dan mudah untuk menemukan kembali barang berharga Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="glass-card p-6 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl text-center space-y-3">
                    <div class="w-12 h-12 rounded-[18px] bg-amber-500/20 text-amber-300 border border-amber-500/30 flex items-center justify-center font-bold text-xl mx-auto">
                        1
                    </div>
                    <h3 class="text-base font-bold text-white">Buat Laporan</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Isi form pelaporan barang hilang atau barang ditemukan dengan melengkapi lokasi, kategori, dan kontak Anda.
                    </p>
                </div>

                <div class="glass-card p-6 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl text-center space-y-3">
                    <div class="w-12 h-12 rounded-[18px] bg-cyan-500/20 text-cyan-300 border border-cyan-500/30 flex items-center justify-center font-bold text-xl mx-auto">
                        2
                    </div>
                    <h3 class="text-base font-bold text-white">Ajukan Klaim</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Jika menemukan barang milik Anda pada daftar barang ditemukan, ajukan klaim kepemilikan beserta deskripsi bukti.
                    </p>
                </div>

                <div class="glass-card p-6 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl text-center space-y-3">
                    <div class="w-12 h-12 rounded-[18px] bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 flex items-center justify-center font-bold text-xl mx-auto">
                        3
                    </div>
                    <h3 class="text-base font-bold text-white">Verifikasi & Pengembalian</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Admin sekolah memverifikasi klaim. Setelah disetujui, barang dapat diambil di lokasi penyimpanan sekolah.
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-layouts.guest>
