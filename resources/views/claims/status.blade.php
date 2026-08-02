<x-layouts.guest title="Tracking Status Klaim - ReturnLy">

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="text-center mb-8 space-y-2">
            <span class="px-3.5 py-1 rounded-full bg-emerald-500/10 text-emerald-300 text-xs font-semibold border border-emerald-500/20 backdrop-blur-md">
                Tracking Real-Time
            </span>
            <h1 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">Cek Status Pengajuan Klaim</h1>
            <p class="text-xs sm:text-sm text-slate-400">Masukkan Nomor WhatsApp atau ID Klaim Anda untuk memantau proses verifikasi.</p>
        </div>

        <!-- Search Box -->
        <div class="glass-card p-6 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl mb-8">
            <form action="{{ route('claims.status') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
                <input type="text" name="phone" value="{{ request('phone', request('search')) }}" placeholder="Masukkan Nomor WA atau ID Klaim (contoh: 081234567890)" required class="flex-1 px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 transition-all">
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-bold text-xs sm:text-sm rounded-[18px] hover:brightness-110 shadow-lg shadow-emerald-500/20 transition-all">
                    Cari Status
                </button>
            </form>
        </div>

        <!-- Results Section -->
        @if($search)
            <div class="space-y-6">
                <h3 class="text-sm font-bold text-slate-300">Hasil Pencarian Klaim untuk: <span class="text-emerald-400">'{{ $search }}'</span></h3>

                @if($claims->isEmpty())
                    <div class="glass-card p-12 rounded-[24px] border border-white/10 bg-slate-900/40 text-center">
                        <svg class="w-12 h-12 text-slate-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <p class="text-xs font-medium text-slate-400 mb-2">Tidak ada data klaim yang ditemukan untuk pencarian ini.</p>
                        <p class="text-[11px] text-slate-500">Pastikan nomor WhatsApp yang Anda masukkan sesuai saat pengisian form klaim.</p>
                    </div>
                @else
                    <div class="space-y-6">
                        @foreach($claims as $claim)
                            <div class="glass-card p-6 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl space-y-5">
                                <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-2 pb-4 border-b border-white/10">
                                    <div>
                                        <span class="text-[10px] text-slate-400 block">ID Klaim: #{{ $claim->id }}</span>
                                        <h4 class="text-base font-bold text-white">{{ $claim->foundItem->item_name }}</h4>
                                    </div>
                                    <x-business.status-badge :status="$claim->status" />
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs text-slate-300">
                                    <div>
                                        <span class="text-slate-500 block text-[10px]">Nama Pengklaim</span>
                                        <span class="font-semibold text-white">{{ $claim->claimer_name }} @if($claim->class_name)({{ $claim->class_name }})@endif</span>
                                    </div>
                                    <div>
                                        <span class="text-slate-500 block text-[10px]">Lokasi Penemuan</span>
                                        <span class="font-semibold text-white">{{ $claim->foundItem->location->name }}</span>
                                    </div>
                                    <div>
                                        <span class="text-slate-500 block text-[10px]">Tanggal Pengajuan</span>
                                        <span class="font-semibold text-white">{{ $claim->created_at->format('d M Y H:i') }}</span>
                                    </div>
                                </div>

                                <div class="p-4 rounded-[18px] bg-slate-950/60 border border-white/5 space-y-1">
                                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Alasan & Bukti Klaim:</span>
                                    <p class="text-xs text-slate-300 italic">"{{ $claim->reason }}"</p>
                                </div>

                                <!-- Status Progress Timeline -->
                                <div class="pt-2">
                                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-3">Timeline Status:</span>
                                    <div class="grid grid-cols-3 gap-2 text-center text-[11px]">
                                        <div class="p-2.5 rounded-xl border {{ $claim->status === 'Pending' ? 'bg-amber-500/20 text-amber-300 border-amber-500/40 font-bold' : 'bg-slate-950/40 text-slate-500 border-white/5' }}">
                                            1. Pending
                                        </div>
                                        <div class="p-2.5 rounded-xl border {{ $claim->status === 'Disetujui' ? 'bg-emerald-500/20 text-emerald-300 border-emerald-500/40 font-bold' : 'bg-slate-950/40 text-slate-500 border-white/5' }}">
                                            2. Disetujui
                                        </div>
                                        <div class="p-2.5 rounded-xl border {{ $claim->status === 'Ditolak' ? 'bg-rose-500/20 text-rose-300 border-rose-500/40 font-bold' : 'bg-slate-950/40 text-slate-500 border-white/5' }}">
                                            3. Ditolak
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif
    </div>

</x-layouts.guest>
