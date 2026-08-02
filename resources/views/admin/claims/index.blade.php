<x-layouts.admin title="Verifikasi Klaim Barang - ReturnLy">

    <div class="space-y-6">
        
        <!-- Action & Filter Bar -->
        <div class="glass-card p-4 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl flex flex-col sm:flex-row items-center justify-between gap-4">
            <form action="{{ route('admin.claims.index') }}" method="GET" class="w-full sm:w-auto flex-1 flex flex-col sm:flex-row gap-3">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama pengklaim atau nomor WA..." class="px-4 py-2.5 text-xs bg-slate-950/60 border border-white/10 rounded-[16px] text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 flex-1">
                
                <select name="status" class="px-4 py-2.5 text-xs bg-slate-950/60 border border-white/10 rounded-[16px] text-white focus:outline-none focus:border-emerald-500">
                    <option value="" class="bg-slate-900 text-slate-400">Semua Status</option>
                    <option value="Pending" class="bg-slate-900 text-white" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Disetujui" class="bg-slate-900 text-white" {{ request('status') == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="Ditolak" class="bg-slate-900 text-white" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>

                <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-bold text-xs rounded-[16px] hover:brightness-110 shadow-lg shadow-emerald-500/20 transition-all">
                    Filter
                </button>
            </form>
        </div>

        <!-- Table Data -->
        <div class="glass-card rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl overflow-hidden shadow-2xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300 border-collapse">
                    <thead class="bg-slate-950/80 text-slate-400 uppercase font-semibold text-[10px] tracking-wider border-b border-white/10">
                        <tr>
                            <th class="py-4 px-6">ID Klaim</th>
                            <th class="py-4 px-6">Barang Ditemukan</th>
                            <th class="py-4 px-6">Pengklaim & WA</th>
                            <th class="py-4 px-6">Tgl Pengajuan</th>
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($claims as $claim)
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="py-4 px-6 font-bold text-emerald-400 font-mono">
                                    #{{ $claim->id }}
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-bold text-white block">{{ $claim->foundItem->item_name ?? 'N/A' }}</span>
                                    <span class="text-[11px] text-slate-400">{{ $claim->foundItem->location->name ?? '' }}</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-semibold text-white block">{{ $claim->claimer_name }} @if($claim->class_name)({{ $claim->class_name }})@endif</span>
                                    <span class="text-[11px] text-emerald-400 font-mono">{{ $claim->phone_number }}</span>
                                </td>
                                <td class="py-4 px-6 text-slate-400 whitespace-nowrap">
                                    {{ $claim->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <x-business.status-badge :status="$claim->status" />
                                </td>
                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    <a href="{{ route('admin.claims.show', $claim->id) }}" class="px-3.5 py-2 rounded-[14px] bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-bold text-xs hover:brightness-110 shadow-md transition-all inline-block">
                                        Verifikasi &rarr;
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-slate-500 text-xs">Belum ada pengajuan klaim barang.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-white/10">
                {{ $claims->links() }}
            </div>
        </div>

    </div>

</x-layouts.admin>
