<x-layouts.admin title="Verifikasi & Validasi Klaim - ReturnLy">

    <div class="max-w-4xl mx-auto space-y-6">
        <a href="{{ route('admin.claims.index') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            <span>Kembali ke Daftar Klaim</span>
        </a>

        <!-- Claim Header Card -->
        <div class="glass-card rounded-[28px] border border-white/10 bg-slate-900/40 backdrop-blur-xl p-6 sm:p-8 space-y-6 shadow-2xl">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-white/10 pb-4 gap-4">
                <div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block">ID Klaim</span>
                    <h2 class="text-2xl font-bold font-mono text-emerald-400">#{{ $claim->id }}</h2>
                </div>
                <x-business.status-badge :status="$claim->status" />
            </div>

            <!-- Grid Comparison / Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Found Item Info -->
                <div class="glass-card p-5 rounded-[20px] border border-cyan-500/30 bg-cyan-500/10 space-y-3">
                    <span class="text-[11px] font-bold text-cyan-300 uppercase tracking-wider block">Detail Barang Ditemukan</span>
                    <h3 class="text-base font-bold text-white">{{ $claim->foundItem->item_name ?? 'N/A' }}</h3>
                    
                    <div class="space-y-1.5 text-xs text-slate-300">
                        <p><span class="text-slate-400">Kategori:</span> {{ $claim->foundItem->category->name ?? 'N/A' }}</p>
                        <p><span class="text-slate-400">Lokasi:</span> {{ $claim->foundItem->location->name ?? 'N/A' }}</p>
                        <p><span class="text-slate-400">Tanggal Ditemukan:</span> {{ \Carbon\Carbon::parse($claim->foundItem->found_date)->translatedFormat('d F Y') }}</p>
                        <p><span class="text-slate-400">Tempat Simpan:</span> {{ $claim->foundItem->storage_location ?: 'Ruang BK' }}</p>
                        <p><span class="text-slate-400">Penemu:</span> {{ $claim->foundItem->finder_name ?? 'N/A' }} ({{ $claim->foundItem->phone_number ?? 'N/A' }})</p>
                    </div>

                    @if ($claim->foundItem->photo)
                        <div class="mt-3 h-32 rounded-[16px] overflow-hidden border border-white/10">
                            <img src="{{ asset('storage/' . $claim->foundItem->photo) }}" class="w-full h-full object-cover">
                        </div>
                    @endif
                </div>

                <!-- Claimant Info & Proof -->
                <div class="glass-card p-5 rounded-[20px] border border-white/10 bg-slate-950/60 space-y-3">
                    <span class="text-[11px] font-bold text-emerald-400 uppercase tracking-wider block">Data Pengklaim & Alasan Klaim</span>
                    
                    <div class="space-y-1.5 text-xs text-slate-300">
                        <p><span class="text-slate-400">Nama Pengklaim:</span> <strong class="text-white">{{ $claim->claimer_name }} @if($claim->class_name)({{ $claim->class_name }})@endif</strong></p>
                        <p><span class="text-slate-400">No. WhatsApp:</span> <strong class="text-emerald-400 font-mono">{{ $claim->phone_number }}</strong></p>
                        <p><span class="text-slate-400">Tanggal Pengajuan:</span> {{ $claim->created_at->translatedFormat('d F Y, H:i') }}</p>
                    </div>

                    <div class="pt-3 border-t border-white/10">
                        <span class="text-xs font-bold text-slate-300 uppercase tracking-wider block mb-1">Alasan & Bukti Kepemilikan:</span>
                        <div class="p-3 bg-slate-900/80 rounded-[14px] border border-white/5 text-xs text-slate-200 leading-relaxed italic">
                            "{{ $claim->reason }}"
                        </div>
                    </div>
                </div>
            </div>

            <!-- Verification Action Form -->
            <div class="border-t border-white/10 pt-6">
                <h3 class="text-base font-bold text-white mb-4">Keputusan Verifikasi Admin</h3>
                
                <form action="{{ route('admin.claims.update-status', $claim->id) }}" method="POST" class="space-y-4 glass-card p-5 rounded-[20px] border border-white/10 bg-slate-950/40">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Status Verifikasi Klaim <span class="text-emerald-400">*</span></label>
                        <div class="flex flex-wrap items-center gap-4">
                            <label class="inline-flex items-center space-x-2 text-xs font-bold text-amber-300 bg-amber-500/10 px-3 py-1.5 rounded-full border border-amber-500/20">
                                <input type="radio" name="status" value="Pending" {{ $claim->status === 'Pending' ? 'checked' : '' }} class="text-amber-500 focus:ring-amber-500">
                                <span>Pending</span>
                            </label>
                            <label class="inline-flex items-center space-x-2 text-xs font-bold text-emerald-300 bg-emerald-500/10 px-3 py-1.5 rounded-full border border-emerald-500/20">
                                <input type="radio" name="status" value="Disetujui" {{ $claim->status === 'Disetujui' ? 'checked' : '' }} class="text-emerald-500 focus:ring-emerald-500">
                                <span>Disetujui</span>
                            </label>
                            <label class="inline-flex items-center space-x-2 text-xs font-bold text-rose-300 bg-rose-500/10 px-3 py-1.5 rounded-full border border-rose-500/20">
                                <input type="radio" name="status" value="Ditolak" {{ $claim->status === 'Ditolak' ? 'checked' : '' }} class="text-rose-500 focus:ring-rose-500">
                                <span>Ditolak</span>
                            </label>
                        </div>
                    </div>

                    <div class="pt-2">
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Status Barang Ditemukan Setelah Disetujui</label>
                        <select name="item_status" class="px-4 py-2.5 text-xs bg-slate-950 border border-white/10 rounded-[14px] text-white focus:outline-none focus:border-emerald-500">
                            <option value="Diklaim" {{ optional($claim->foundItem)->status === 'Diklaim' ? 'selected' : '' }}>Diklaim (Barang sudah terkonfirmasi pemilik)</option>
                            <option value="Dikembalikan" {{ optional($claim->foundItem)->status === 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan (Barang sudah diserahkan kepada pemilik)</option>
                        </select>
                    </div>

                    <div class="pt-2 flex justify-end">
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-bold text-xs sm:text-sm rounded-[16px] hover:brightness-110 shadow-lg shadow-emerald-500/20 transition-all">
                            Simpan Hasil Verifikasi
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</x-layouts.admin>
