<x-layouts.guest title="Detail Barang Ditemukan - {{ $item->item_name }}">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <a href="{{ route('found-items.index') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-slate-400 hover:text-white mb-6 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            <span>Kembali ke Daftar Barang Ditemukan</span>
        </a>

        <div class="glass-card rounded-[28px] border border-white/10 bg-slate-900/40 backdrop-blur-xl overflow-hidden shadow-2xl">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <!-- Image -->
                <div class="relative bg-slate-950/80 min-h-[280px] md:min-h-full flex items-center justify-center border-b md:border-b-0 md:border-r border-white/10">
                    @if($item->photo)
                        <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->item_name }}" class="w-full h-full object-cover">
                    @else
                        <div class="text-center p-8 text-slate-500">
                            <svg class="w-16 h-16 mx-auto mb-2 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            <span class="text-xs font-medium">Tidak ada foto barang</span>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4">
                        <x-business.status-badge :status="$item->status" />
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6 sm:p-8 space-y-6">
                    <div>
                        <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider block mb-1">{{ $item->category->name }}</span>
                        <h1 class="text-2xl font-bold text-white">{{ $item->item_name }}</h1>
                    </div>

                    <div class="space-y-3 text-xs text-slate-300">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            <span><strong>Lokasi Ditemukan:</strong> {{ $item->location->name }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span><strong>Tanggal Penemuan:</strong> {{ $item->found_date->translatedFormat('d F Y') }}</span>
                        </div>
                        @if($item->storage_location)
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                <span><strong>Tempat Penyimpanan:</strong> {{ $item->storage_location }}</span>
                            </div>
                        @endif
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span><strong>Penemu:</strong> {{ $item->finder_name }} @if($item->class_name)({{ $item->class_name }})@endif</span>
                        </div>
                    </div>

                    <div class="p-4 rounded-[20px] bg-slate-950/60 border border-white/5 space-y-1">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Deskripsi Barang:</span>
                        <p class="text-xs text-slate-300 leading-relaxed">{{ $item->description }}</p>
                    </div>

                    <div class="pt-4 border-t border-white/10">
                        @if($item->status === 'Menunggu Pemilik')
                            <p class="text-xs text-slate-400 mb-3">Merasa barang ini milik Anda? Klik tombol di bawah untuk mengajukan klaim kepemilikan.</p>
                            <a href="{{ route('claims.create', $item->id) }}" class="w-full text-center py-3.5 px-4 rounded-[16px] bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-bold text-xs hover:brightness-110 shadow-lg shadow-emerald-500/20 transition-all block">
                                Ajukan Klaim Kepemilikan Barang Ini
                            </a>
                        @else
                            <div class="p-4 rounded-[16px] bg-slate-950/40 border border-white/5 text-center text-slate-400 text-xs font-semibold">
                                Barang ini berstatus {{ $item->status }} dan tidak dapat diklaim lagi.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.guest>
