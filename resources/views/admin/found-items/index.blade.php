<x-layouts.admin title="Kelola Barang Ditemukan - ReturnLy">

    <div class="space-y-6">
        
        <!-- Action & Filter Bar -->
        <div class="glass-card p-4 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl flex flex-col sm:flex-row items-center justify-between gap-4">
            <form action="{{ route('admin.found-items.index') }}" method="GET" class="w-full sm:w-auto flex-1 flex flex-col sm:flex-row gap-3">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari barang atau nama penemu..." class="px-4 py-2.5 text-xs bg-slate-950/60 border border-white/10 rounded-[16px] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 flex-1">
                
                <select name="status" class="px-4 py-2.5 text-xs bg-slate-950/60 border border-white/10 rounded-[16px] text-white focus:outline-none focus:border-cyan-500">
                    <option value="" class="bg-slate-900 text-slate-400">Semua Status</option>
                    <option value="Menunggu Pemilik" class="bg-slate-900 text-white" {{ request('status') == 'Menunggu Pemilik' ? 'selected' : '' }}>Menunggu Pemilik</option>
                    <option value="Diklaim" class="bg-slate-900 text-white" {{ request('status') == 'Diklaim' ? 'selected' : '' }}>Diklaim</option>
                    <option value="Dikembalikan" class="bg-slate-900 text-white" {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                </select>

                <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-cyan-500 to-emerald-500 text-slate-950 font-bold text-xs rounded-[16px] hover:brightness-110 shadow-lg shadow-cyan-500/20 transition-all">
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
                            <th class="py-4 px-6">Barang</th>
                            <th class="py-4 px-6">Kategori & Lokasi</th>
                            <th class="py-4 px-6">Penemu & WA</th>
                            <th class="py-4 px-6">Penyimpanan</th>
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($items as $item)
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="py-4 px-6 font-bold text-white">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-[12px] bg-slate-950 flex-shrink-0 overflow-hidden border border-white/10 flex items-center justify-center">
                                            @if ($item->photo)
                                                <img src="{{ asset('storage/' . $item->photo) }}" class="w-full h-full object-cover">
                                            @else
                                                <span class="text-[9px] text-slate-500 font-bold">NO IMG</span>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="font-bold text-white">{{ $item->item_name }}</div>
                                            <div class="text-[11px] text-slate-400 line-clamp-1 font-normal">{{ $item->description }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-medium text-white block">{{ $item->category->name }}</span>
                                    <span class="text-[11px] text-slate-400">{{ $item->location->name }}</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-semibold text-white block">{{ $item->finder_name }} @if($item->class_name)({{ $item->class_name }})@endif</span>
                                    <span class="text-[11px] text-cyan-400 font-mono">{{ $item->phone_number }}</span>
                                </td>
                                <td class="py-4 px-6 text-slate-300">
                                    {{ $item->storage_location ?: 'Ruang BK' }}
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <x-business.status-badge :status="$item->status" />
                                </td>
                                <td class="py-4 px-6 text-right space-x-2 whitespace-nowrap">
                                    <a href="{{ route('admin.found-items.show', $item->id) }}" class="px-3 py-1.5 rounded-[12px] bg-slate-800 text-slate-200 hover:text-white hover:bg-slate-700 font-semibold text-[11px] inline-block transition-all">
                                        Detail / Status
                                    </a>
                                    <form action="{{ route('admin.found-items.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 rounded-[12px] bg-rose-500/20 text-rose-300 hover:bg-rose-500/30 font-semibold text-[11px] border border-rose-500/30 transition-all">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-slate-500 text-xs">Belum ada data laporan barang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-white/10">
                {{ $items->links() }}
            </div>
        </div>

    </div>

</x-layouts.admin>
