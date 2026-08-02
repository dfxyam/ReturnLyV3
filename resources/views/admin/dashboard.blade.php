<x-layouts.admin title="Dashboard Administrator - ReturnLy">

    <div class="space-y-8">
        
        <!-- Header Banner & Quick Actions -->
        <div class="glass-card p-6 sm:p-8 rounded-[28px] border border-white/10 bg-gradient-to-r from-emerald-500/10 via-slate-900/60 to-cyan-500/10 backdrop-blur-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div>
                <span class="text-xs font-bold text-emerald-400 uppercase tracking-wider block mb-1">Selamat Datang, Admin!</span>
                <h2 class="text-2xl font-bold text-white">Pusat Kendali ReturnLy Sekolah</h2>
                <p class="text-xs text-slate-400 mt-1 max-w-xl">Kelola seluruh data barang hilang, barang ditemukan, verifikasi klaim kepemilikan, serta lakukan pencocokan barang secara cepat.</p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.matching.index') }}" class="px-5 py-3 rounded-[16px] bg-gradient-to-r from-purple-500 to-indigo-500 text-white font-bold text-xs hover:brightness-110 shadow-lg shadow-purple-500/20 transition-all flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <span>Smart Matching</span>
                </a>
                <a href="{{ route('admin.claims.index') }}" class="px-5 py-3 rounded-[16px] bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-bold text-xs hover:brightness-110 shadow-lg shadow-emerald-500/20 transition-all flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Verifikasi Klaim ({{ $stats['pending_claims'] }})</span>
                </a>
            </div>
        </div>

        <!-- Metric Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            
            <div class="glass-card p-5 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl flex items-center justify-between">
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Total Barang Hilang</span>
                    <span class="text-2xl font-extrabold text-white mt-1 block">{{ $stats['total_lost'] }}</span>
                </div>
                <div class="w-12 h-12 rounded-[18px] bg-amber-500/20 text-amber-300 border border-amber-500/30 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <div class="glass-card p-5 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl flex items-center justify-between">
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Total Barang Ditemukan</span>
                    <span class="text-2xl font-extrabold text-white mt-1 block">{{ $stats['total_found'] }}</span>
                </div>
                <div class="w-12 h-12 rounded-[18px] bg-cyan-500/20 text-cyan-300 border border-cyan-500/30 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
            </div>

            <div class="glass-card p-5 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl flex items-center justify-between">
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Pending Verifikasi Klaim</span>
                    <span class="text-2xl font-extrabold text-amber-400 mt-1 block">{{ $stats['pending_claims'] }}</span>
                </div>
                <div class="w-12 h-12 rounded-[18px] bg-amber-500/20 text-amber-300 border border-amber-500/30 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>

            <div class="glass-card p-5 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl flex items-center justify-between">
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Total Barang Dikembalikan</span>
                    <span class="text-2xl font-extrabold text-emerald-400 mt-1 block">{{ $stats['returned_items'] }}</span>
                </div>
                <div class="w-12 h-12 rounded-[18px] bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>

        </div>

        <!-- Recent Activity & Claim Grids -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Recent Lost Items -->
            <div class="glass-card rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl p-6">
                <div class="flex items-center justify-between mb-4 border-b border-white/10 pb-3">
                    <h3 class="text-base font-bold text-white">Barang Hilang Terbaru</h3>
                    <a href="{{ route('admin.lost-items.index') }}" class="text-xs font-semibold text-emerald-400 hover:underline">Lihat Semua &rarr;</a>
                </div>
                <div class="space-y-3">
                    @forelse ($recentLostItems as $item)
                        <div class="flex items-center justify-between p-3.5 rounded-[16px] bg-slate-950/60 border border-white/5">
                            <div>
                                <h4 class="text-xs font-bold text-white">{{ $item->item_name }}</h4>
                                <p class="text-[11px] text-slate-400">{{ $item->category->name }} • {{ $item->location->name }} (Pelapor: {{ $item->reporter_name }})</p>
                            </div>
                            <x-business.status-badge :status="$item->status" />
                        </div>
                    @empty
                        <p class="text-xs text-slate-500 text-center py-4">Belum ada data barang hilang.</p>
                    @endforelse
                </div>
            </div>

            <!-- Recent Claims -->
            <div class="glass-card rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl p-6">
                <div class="flex items-center justify-between mb-4 border-b border-white/10 pb-3">
                    <h3 class="text-base font-bold text-white">Pengajuan Klaim Terbaru</h3>
                    <a href="{{ route('admin.claims.index') }}" class="text-xs font-semibold text-cyan-400 hover:underline">Verifikasi Klaim &rarr;</a>
                </div>
                <div class="space-y-3">
                    @forelse ($recentClaims as $claim)
                        <div class="flex items-center justify-between p-3.5 rounded-[16px] bg-slate-950/60 border border-white/5">
                            <div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-xs font-bold text-white">#{{ $claim->id }}</span>
                                    <span class="text-[11px] text-slate-400">oleh {{ $claim->claimer_name }}</span>
                                </div>
                                <p class="text-[11px] text-slate-400">Barang: {{ $claim->foundItem->item_name ?? 'N/A' }}</p>
                            </div>
                            <x-business.status-badge :status="$claim->status" />
                        </div>
                    @empty
                        <p class="text-xs text-slate-500 text-center py-4">Belum ada pengajuan klaim.</p>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Recent Activity Logs & Notifications -->
        <div class="glass-card rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl p-6">
            <div class="flex items-center justify-between mb-4 border-b border-white/10 pb-3">
                <h3 class="text-base font-bold text-white">Aktivitas Terkini System & Admin</h3>
                <a href="{{ route('admin.activity-logs.index') }}" class="text-xs font-semibold text-slate-400 hover:text-white">Lihat Semua Activity Logs &rarr;</a>
            </div>
            <div class="divide-y divide-white/5">
                @forelse ($recentActivities as $act)
                    <div class="py-3 flex justify-between items-start text-xs">
                        <div>
                            <span class="font-bold text-emerald-400 block">{{ $act->activity }}</span>
                            <span class="text-slate-300">{{ $act->description }}</span>
                        </div>
                        <span class="text-[10px] text-slate-500 flex-shrink-0 ml-4">{{ $act->created_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <p class="text-xs text-slate-500 text-center py-4">Belum ada catatan aktivitas.</p>
                @endforelse
            </div>
        </div>

    </div>

</x-layouts.admin>
