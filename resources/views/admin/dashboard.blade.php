<x-layout.admin header="Dashboard Administrator">

    <div class="space-y-8">
        
        <!-- Summary Metric Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            
            <div class="bg-white p-5 rounded-2xl border border-[#E7E2DA] shadow-paper flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-zinc-500 uppercase tracking-wider block">Total Barang Hilang</span>
                    <span class="text-2xl font-extrabold text-zinc-900">{{ $totalLostItems }}</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-red-50 text-red-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-[#E7E2DA] shadow-paper flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-zinc-500 uppercase tracking-wider block">Total Barang Ditemukan</span>
                    <span class="text-2xl font-extrabold text-zinc-900">{{ $totalFoundItems }}</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-[#E7E2DA] shadow-paper flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-zinc-500 uppercase tracking-wider block">Pending Verifikasi Klaim</span>
                    <span class="text-2xl font-extrabold text-amber-600">{{ $pendingClaimsCount }}</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-[#E7E2DA] shadow-paper flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-zinc-500 uppercase tracking-wider block">Barang Sukses Dikembalikan</span>
                    <span class="text-2xl font-extrabold text-emerald-600">{{ $returnedItemsCount }}</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>

        </div>

        <!-- Recent Activity Grids -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Recent Lost Items -->
            <div class="bg-white rounded-2xl border border-[#E7E2DA] shadow-paper p-6">
                <div class="flex items-center justify-between mb-4 border-b border-zinc-100 pb-3">
                    <h3 class="text-base font-bold text-zinc-900">Laporan Barang Hilang Terbaru</h3>
                    <a href="{{ route('admin.lost-items.index') }}" class="text-xs font-bold text-red-600 hover:underline">Kelola Semua &rarr;</a>
                </div>
                <div class="space-y-3">
                    @forelse ($recentLostItems as $item)
                        <div class="flex items-center justify-between p-3 rounded-xl bg-[#FAF8F4] border border-zinc-100">
                            <div>
                                <h4 class="text-xs font-bold text-zinc-900">{{ $item->item_name }}</h4>
                                <p class="text-[11px] text-zinc-500">{{ $item->category->name }} • {{ $item->location->name }}</p>
                            </div>
                            <x-business.status-badge :status="$item->status" />
                        </div>
                    @empty
                        <p class="text-xs text-zinc-400 text-center py-4">Belum ada data barang hilang.</p>
                    @endforelse
                </div>
            </div>

            <!-- Recent Claims -->
            <div class="bg-white rounded-2xl border border-[#E7E2DA] shadow-paper p-6">
                <div class="flex items-center justify-between mb-4 border-b border-zinc-100 pb-3">
                    <h3 class="text-base font-bold text-zinc-900">Pengajuan Klaim Terbaru</h3>
                    <a href="{{ route('admin.claims.index') }}" class="text-xs font-bold text-amber-600 hover:underline">Verifikasi Klaim &rarr;</a>
                </div>
                <div class="space-y-3">
                    @forelse ($recentClaims as $claim)
                        <div class="flex items-center justify-between p-3 rounded-xl bg-[#FAF8F4] border border-zinc-100">
                            <div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-xs font-bold font-mono text-zinc-900">{{ $claim->claim_number }}</span>
                                    <span class="text-[11px] text-zinc-500">oleh {{ $claim->claimant_name }}</span>
                                </div>
                                <p class="text-[11px] text-zinc-500">Barang: {{ $claim->foundItem->item_name ?? 'N/A' }}</p>
                            </div>
                            <x-business.status-badge :status="$claim->status" />
                        </div>
                    @empty
                        <p class="text-xs text-zinc-400 text-center py-4">Belum ada pengajuan klaim.</p>
                    @endforelse
                </div>
            </div>

        </div>

    </div>

</x-layout.admin>
