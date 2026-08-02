<x-layouts.admin title="Smart Manual Matching - ReturnLy">
    <div class="space-y-8">
        <div>
            <h2 class="text-2xl font-bold text-white tracking-tight">Smart Manual Matching</h2>
            <p class="text-xs text-slate-400 mt-1">Cocokkan barang hilang dengan barang ditemukan berdasarkan Kategori dan Lokasi yang sama.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Panel: Select Lost Item -->
            <div class="lg:col-span-1 space-y-4">
                <div class="glass-card p-6 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl">
                    <h3 class="text-base font-bold text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        Pilih Barang Hilang
                    </h3>

                    @if($unfoundLostItems->isEmpty())
                        <div class="text-center py-8 text-slate-400 text-xs">
                            Tidak ada barang hilang dengan status 'Belum Ditemukan'.
                        </div>
                    @else
                        <div class="space-y-3 max-h-[500px] overflow-y-auto pr-1">
                            @foreach($unfoundLostItems as $lost)
                                <a href="{{ route('admin.matching.index', ['lost_item_id' => $lost->id]) }}" 
                                   class="block p-4 rounded-[18px] border transition-all {{ optional($selectedLostItem)->id === $lost->id ? 'bg-gradient-to-r from-emerald-500/20 to-cyan-500/20 border-emerald-500/40' : 'bg-slate-950/40 border-white/5 hover:border-white/20' }}">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="text-xs font-bold text-white line-clamp-1">{{ $lost->item_name }}</h4>
                                        <span class="text-[10px] text-amber-300 bg-amber-500/10 px-2 py-0.5 rounded-full border border-amber-500/20 font-medium">#{{ $lost->id }}</span>
                                    </div>
                                    <div class="text-[11px] text-slate-400 space-y-1">
                                        <div><strong class="text-slate-300">Kategori:</strong> {{ $lost->category->name }}</div>
                                        <div><strong class="text-slate-300">Lokasi:</strong> {{ $lost->location->name }}</div>
                                        <div><strong class="text-slate-300">Pelapor:</strong> {{ $lost->reporter_name }}</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Panel: Matching Results -->
            <div class="lg:col-span-2 space-y-6">
                @if(!$selectedLostItem)
                    <div class="glass-card p-12 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl text-center">
                        <svg class="w-16 h-16 mx-auto text-purple-400/50 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <h3 class="text-lg font-bold text-white mb-2">Pilih Barang Hilang Terlebih Dahulu</h3>
                        <p class="text-xs text-slate-400 max-w-md mx-auto">Klik salah satu barang hilang di panel sebelah kiri untuk menampilkan rekomendasi barang ditemukan yang memiliki kategori dan lokasi yang sama.</p>
                    </div>
                @else
                    <!-- Selected Lost Item Details Header -->
                    <div class="glass-card p-6 rounded-[24px] border border-emerald-500/30 bg-gradient-to-r from-emerald-500/10 via-slate-900/60 to-cyan-500/10 backdrop-blur-xl">
                        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-4 pb-4 border-b border-white/10">
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-400">Target Barang Hilang</span>
                                <h3 class="text-lg font-bold text-white">{{ $selectedLostItem->item_name }}</h3>
                            </div>
                            <x-business.status-badge :status="$selectedLostItem->status" />
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-xs">
                            <div>
                                <span class="text-slate-400 block text-[10px]">Kategori</span>
                                <span class="font-semibold text-white">{{ $selectedLostItem->category->name }}</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[10px]">Lokasi Hilang</span>
                                <span class="font-semibold text-white">{{ $selectedLostItem->location->name }}</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[10px]">Pelapor / WA</span>
                                <span class="font-semibold text-white">{{ $selectedLostItem->reporter_name }} ({{ $selectedLostItem->phone_number }})</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[10px]">Tgl Hilang</span>
                                <span class="font-semibold text-white">{{ $selectedLostItem->lost_date->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Recommended Matches Section -->
                    <div class="space-y-4">
                        <h3 class="text-base font-bold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Rekomendasi Match (Kategori: {{ $selectedLostItem->category->name }}, Lokasi: {{ $selectedLostItem->location->name }})
                        </h3>

                        @if($recommendations->isEmpty())
                            <div class="glass-card p-8 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl text-center">
                                <p class="text-xs text-slate-400 mb-3">Tidak ditemukan barang yang cocok untuk kategori dan lokasi ini dengan status 'Menunggu Pemilik'.</p>
                                <a href="{{ route('admin.lost-items.show', $selectedLostItem->id) }}" class="inline-flex items-center px-4 py-2 rounded-full text-xs font-semibold bg-slate-800 text-white hover:bg-slate-700">
                                    Lihat Detail Laporan Kehilangan
                                </a>
                            </div>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($recommendations as $found)
                                    <div class="glass-card p-5 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl flex flex-col justify-between space-y-4 hover:border-cyan-500/40 transition-all">
                                        <div>
                                            <div class="flex justify-between items-start mb-2">
                                                <h4 class="text-sm font-bold text-white">{{ $found->item_name }}</h4>
                                                <span class="text-[10px] text-cyan-300 bg-cyan-500/10 px-2 py-0.5 rounded-full border border-cyan-500/20 font-medium">#{{ $found->id }}</span>
                                            </div>
                                            <p class="text-xs text-slate-300 line-clamp-2 mb-3">{{ $found->description }}</p>
                                            <div class="text-[11px] text-slate-400 space-y-1 pt-2 border-t border-white/5">
                                                <div><strong>Penemu:</strong> {{ $found->finder_name }} ({{ $found->phone_number }})</div>
                                                <div><strong>Tanggal Ditemukan:</strong> {{ $found->found_date->format('d M Y') }}</div>
                                                @if($found->storage_location)
                                                    <div><strong>Penyimpanan:</strong> {{ $found->storage_location }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="flex items-center space-x-2 pt-2">
                                            <a href="{{ route('admin.found-items.show', $found->id) }}" class="flex-1 text-center py-2 px-3 rounded-[14px] bg-slate-800 text-white text-xs font-medium hover:bg-slate-700">
                                                Detail Barang
                                            </a>
                                            <form action="{{ route('admin.lost-items.update-status', $selectedLostItem->id) }}" method="POST" class="flex-1">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="Ditemukan">
                                                <button type="submit" onclick="return confirm('Tandai barang hilang ini sebagai DITEMUKAN?')" class="w-full text-center py-2 px-3 rounded-[14px] bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 text-xs font-bold hover:brightness-110 shadow-lg shadow-emerald-500/20">
                                                    Cocokkan
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.admin>
