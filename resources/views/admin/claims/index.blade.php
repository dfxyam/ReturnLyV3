<x-layout.admin header="Verifikasi Klaim Barang">

    <div class="space-y-6">
        
        <!-- Action & Filter Bar -->
        <div class="bg-white p-4 rounded-2xl border border-[#E7E2DA] shadow-paper flex flex-col sm:flex-row items-center justify-between gap-4">
            <form action="{{ route('admin.claims.index') }}" method="GET" class="w-full sm:w-auto flex-1 flex flex-col sm:flex-row gap-3">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari Kode Klaim (CLM-...) atau nama pengklaim..." class="px-4 py-2.5 text-xs bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900 flex-1 font-mono">
                
                <select name="status" class="px-4 py-2.5 text-xs bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                    <option value="">Semua Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Disetujui</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                </select>

                <button type="submit" class="px-4 py-2.5 bg-zinc-900 text-white font-semibold text-xs rounded-xl hover:bg-zinc-800 transition-colors">
                    Filter
                </button>
            </form>
        </div>

        <!-- Table Data -->
        <div class="bg-white rounded-2xl border border-[#E7E2DA] shadow-paper overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#FAF8F4] border-b border-[#E7E2DA] text-[11px] font-bold text-zinc-500 uppercase tracking-wider">
                            <th class="py-3.5 px-4">Kode Klaim</th>
                            <th class="py-3.5 px-4">Barang Ditemukan</th>
                            <th class="py-3.5 px-4">Nama Pengklaim & WA</th>
                            <th class="py-3.5 px-4">Tanggal Pengajuan</th>
                            <th class="py-3.5 px-4">Status</th>
                            <th class="py-3.5 px-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 text-xs">
                        @forelse ($claims as $claim)
                            <tr class="hover:bg-zinc-50 transition-colors">
                                <td class="py-3.5 px-4 font-bold font-mono text-zinc-900">
                                    {{ $claim->claim_number }}
                                </td>
                                <td class="py-3.5 px-4 text-zinc-600">
                                    <span class="font-bold text-zinc-900 block">{{ $claim->foundItem->item_name ?? 'N/A' }}</span>
                                    <span class="text-[11px] text-zinc-400">{{ $claim->foundItem->location->name ?? '' }}</span>
                                </td>
                                <td class="py-3.5 px-4 text-zinc-600">
                                    <span class="font-semibold text-zinc-900 block">{{ $claim->claimant_name }}</span>
                                    <span class="text-[11px] text-zinc-500">{{ $claim->claimant_phone }}</span>
                                </td>
                                <td class="py-3.5 px-4 text-zinc-600">
                                    {{ $claim->created_at->translatedFormat('d M Y, H:i') }}
                                </td>
                                <td class="py-3.5 px-4">
                                    <x-business.status-badge :status="$claim->status" />
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    <a href="{{ route('admin.claims.show', $claim->id) }}" class="px-3 py-1.5 rounded-lg bg-zinc-900 text-white font-semibold text-[11px] hover:bg-zinc-800 inline-block">
                                        Verifikasi Klaim &rarr;
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-zinc-400 text-xs">Belum ada pengajuan klaim barang.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-zinc-100">
                {{ $claims->links() }}
            </div>
        </div>

    </div>

</x-layout.admin>
