<x-layouts.admin title="Detail Barang Ditemukan - ReturnLy">

    <div class="space-y-8">
        <a href="{{ route('admin.found-items.index') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            <span>Kembali ke Daftar Barang Ditemukan</span>
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
                        <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider block mb-1">Laporan Penemuan</span>
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
                        <span class="text-slate-500 block text-[10px]">Lokasi Ditemukan:</span>
                        <span class="font-semibold text-white">{{ $item->location->name }}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block text-[10px]">Tanggal Ditemukan:</span>
                        <span class="font-semibold text-white">{{ $item->found_date->translatedFormat('d F Y') }}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block text-[10px]">Tempat Penyimpanan:</span>
                        <span class="font-semibold text-white">{{ $item->storage_location ?: 'Ruang BK' }}</span>
                    </div>
                    <div class="col-span-2">
                        <span class="text-slate-500 block text-[10px]">Penemu & WA:</span>
                        <span class="font-semibold text-white">{{ $item->finder_name }} @if($item->class_name)({{ $item->class_name }})@endif</span>
                        <span class="text-cyan-400 font-mono block text-[11px] mt-0.5">{{ $item->phone_number }}</span>
                    </div>
                </div>

                <div>
                    <h4 class="text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Deskripsi Kondisi Barang</h4>
                    <p class="text-xs text-slate-300 leading-relaxed bg-slate-950/40 p-3.5 rounded-[16px] border border-white/5">{{ $item->description }}</p>
                </div>

                <!-- Update Status & Storage Form -->
                <div class="pt-4 border-t border-white/10 space-y-3">
                    <form action="{{ route('admin.found-items.update-status', $item->id) }}" method="POST" class="space-y-3">
                        @csrf
                        @method('PATCH')
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="text-xs font-bold text-slate-300 block mb-1">Status Barang:</label>
                                <select name="status" class="w-full px-3.5 py-2 text-xs bg-slate-950 border border-white/10 rounded-[14px] text-white focus:outline-none focus:border-cyan-500">
                                    <option value="Menunggu Pemilik" {{ $item->status === 'Menunggu Pemilik' ? 'selected' : '' }}>Menunggu Pemilik</option>
                                    <option value="Diklaim" {{ $item->status === 'Diklaim' ? 'selected' : '' }}>Diklaim</option>
                                    <option value="Dikembalikan" {{ $item->status === 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-300 block mb-1">Lokasi Penyimpanan:</label>
                                <input type="text" name="storage_location" value="{{ old('storage_location', $item->storage_location) }}" placeholder="Contoh: Ruang BK / Ruang Guru" class="w-full px-3.5 py-2 text-xs bg-slate-950 border border-white/10 rounded-[14px] text-white focus:outline-none focus:border-cyan-500">
                            </div>
                        </div>
                        <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-cyan-500 to-emerald-500 text-slate-950 text-xs font-bold rounded-[14px] hover:brightness-110 shadow-lg shadow-cyan-500/20 transition-all">
                            Update Status & Storage
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Registered Claims for this Found Item -->
        <div class="glass-card rounded-[28px] border border-white/10 bg-slate-900/40 backdrop-blur-xl p-6 space-y-4">
            <h3 class="text-base font-bold text-white flex items-center">
                <svg class="w-5 h-5 mr-2 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Pengajuan Klaim Masuk untuk Barang Ini ({{ $item->claims->count() }})
            </h3>

            @if($item->claims->isEmpty())
                <div class="p-6 bg-slate-950/60 rounded-[20px] text-center text-xs text-slate-400 border border-white/5">
                    Belum ada pengajuan klaim dari pengguna untuk barang ini.
                </div>
            @else
                <div class="space-y-3">
                    @foreach($item->claims as $claim)
                        <div class="p-4 rounded-[20px] bg-slate-950/60 border border-white/5 flex flex-col sm:flex-row justify-between sm:items-center gap-3">
                            <div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-xs font-bold text-white">{{ $claim->claimer_name }} @if($claim->class_name)({{ $claim->class_name }})@endif</span>
                                    <span class="text-xs text-emerald-400 font-mono">({{ $claim->phone_number }})</span>
                                </div>
                                <p class="text-xs text-slate-300 italic mt-1">"{{ $claim->reason }}"</p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <x-business.status-badge :status="$claim->status" />
                                <a href="{{ route('admin.claims.show', $claim->id) }}" class="px-3 py-1.5 rounded-[12px] bg-slate-800 text-white text-xs font-medium hover:bg-slate-700">
                                    Verifikasi &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>

</x-layouts.admin>
