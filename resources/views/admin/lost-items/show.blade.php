<x-layouts.admin title="Detail Barang Hilang & Smart Matching - ReturnLy">

    <div class="space-y-8">
        <a href="{{ route('admin.lost-items.index') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            <span>Kembali ke Daftar Barang Hilang</span>
        </a>

        <!-- Main Detail Card -->
        <div class="glass-card rounded-[28px] border border-white/10 bg-slate-900/40 backdrop-blur-xl p-6 sm:p-8 grid grid-cols-1 md:grid-cols-3 gap-6 shadow-2xl">
            <!-- Image Column -->
            <div class="bg-slate-950/80 rounded-[20px] overflow-hidden min-h-[220px] flex items-center justify-center border border-white/10 relative">
                @if ($item->photo)
                    <img src="{{ asset('storage/' . $item->photo) }}" class="w-full h-full object-cover">
                @else
                    <span class="text-xs text-slate-500 font-semibold">Tanpa Foto</span>
                @endif
            </div>

            <!-- Details Column -->
            <div class="md:col-span-2 space-y-5">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-3">
                    <div>
                        <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block mb-1">Laporan Kehilangan</span>
                        <h2 class="text-2xl font-bold text-white">{{ $item->item_name }}</h2>
                    </div>
                    <x-business.status-badge :status="$item->status" />
                </div>

                <div class="grid grid-cols-2 gap-4 text-xs bg-slate-950/60 p-4 rounded-[20px] border border-white/5">
                    <div>
                        <span class="text-slate-500 block text-[10px]">Kategori:</span>
                        <span class="font-semibold text-white">{{ $item->category->name }}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block text-[10px]">Perkiraan Lokasi Hilang:</span>
                        <span class="font-semibold text-white">{{ $item->location->name }}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block text-[10px]">Tanggal Hilang:</span>
                        <span class="font-semibold text-white">{{ $item->lost_date->translatedFormat('d F Y') }}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block text-[10px]">Pelapor & WA:</span>
                        <span class="font-semibold text-white">{{ $item->reporter_name }} @if($item->class_name)({{ $item->class_name }})@endif</span>
                        <span class="text-emerald-400 font-mono block text-[11px] mt-0.5">{{ $item->phone_number }}</span>
                    </div>
                </div>

                <div>
                    <h4 class="text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Deskripsi & Ciri Khusus</h4>
                    <p class="text-xs text-slate-300 leading-relaxed bg-slate-950/40 p-3.5 rounded-[16px] border border-white/5">{{ $item->description }}</p>
                </div>

                <!-- Update Status Form -->
                <div class="pt-4 border-t border-white/10 flex flex-wrap items-center gap-3">
                    <form action="{{ route('admin.lost-items.update-status', $item->id) }}" method="POST" class="flex items-center space-x-3">
                        @csrf
                        @method('PATCH')
                        <label class="text-xs font-bold text-slate-300">Ubah Status:</label>
                        <select name="status" class="px-3.5 py-2 text-xs bg-slate-950 border border-white/10 rounded-[14px] text-white focus:outline-none focus:border-emerald-500">
                            <option value="Belum Ditemukan" {{ $item->status === 'Belum Ditemukan' ? 'selected' : '' }}>Belum Ditemukan</option>
                            <option value="Ditemukan" {{ $item->status === 'Ditemukan' ? 'selected' : '' }}>Ditemukan</option>
                            <option value="Selesai" {{ $item->status === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 text-xs font-bold rounded-[14px] hover:brightness-110 shadow-lg shadow-emerald-500/20 transition-all">
                            Update Status
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Smart Manual Matching Recommendations -->
        <div class="glass-card rounded-[28px] border border-purple-500/30 bg-purple-500/5 backdrop-blur-xl p-6 space-y-4">
            <div class="flex items-center space-x-3">
                <div class="w-9 h-9 rounded-[14px] bg-purple-500/20 text-purple-300 border border-purple-500/30 flex items-center justify-center font-bold">
                    💡
                </div>
                <div>
                    <h3 class="text-base font-bold text-white">Smart Manual Matching</h3>
                    <p class="text-xs text-slate-400">Barang Ditemukan yang cocok untuk Kategori <strong>{{ $item->category->name }}</strong> dan Lokasi <strong>{{ $item->location->name }}</strong>.</p>
                </div>
            </div>

            @if ($matchingFoundItems->isEmpty())
                <div class="p-6 bg-slate-950/60 rounded-[20px] text-center text-xs text-slate-400 border border-white/5">
                    Belum ada barang ditemukan dengan kategori dan lokasi ini yang berstatus 'Menunggu Pemilik'.
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ($matchingFoundItems as $mItem)
                        <div class="glass-card p-4 rounded-[20px] border border-white/10 bg-slate-950/60 backdrop-blur-md flex items-center justify-between">
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-cyan-300 bg-cyan-500/10 px-2 py-0.5 rounded-full border border-cyan-500/20">Ditemukan</span>
                                <h4 class="text-xs font-bold text-white">{{ $mItem->item_name }}</h4>
                                <p class="text-[11px] text-slate-400">{{ $mItem->location->name }} • {{ $mItem->found_date->format('d M Y') }}</p>
                            </div>
                            <a href="{{ route('admin.found-items.show', $mItem->id) }}" class="px-3.5 py-2 bg-slate-800 text-white text-xs font-semibold rounded-[14px] hover:bg-slate-700 transition-all">
                                Detail &rarr;
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>

</x-layouts.admin>
