<x-layout.admin header="Kelola Barang Ditemukan">

    <div class="space-y-6">
        
        <!-- Action & Filter Bar -->
        <div class="bg-white p-4 rounded-2xl border border-[#E7E2DA] shadow-paper flex flex-col sm:flex-row items-center justify-between gap-4">
            <form action="{{ route('admin.found-items.index') }}" method="GET" class="w-full sm:w-auto flex-1 flex flex-col sm:flex-row gap-3">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari barang atau penemu..." class="px-4 py-2.5 text-xs bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900 flex-1">
                
                <select name="status" class="px-4 py-2.5 text-xs bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                    <option value="">Semua Status</option>
                    <option value="found" {{ request('status') == 'found' ? 'selected' : '' }}>Ditemukan</option>
                    <option value="claimed" {{ request('status') == 'claimed' ? 'selected' : '' }}>Diklaim</option>
                    <option value="returned" {{ request('status') == 'returned' ? 'selected' : '' }}>Dikembalikan</option>
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
                            <th class="py-3.5 px-4">Barang</th>
                            <th class="py-3.5 px-4">Kategori & Lokasi</th>
                            <th class="py-3.5 px-4">Penemu & WA</th>
                            <th class="py-3.5 px-4">Tgl Ditemukan</th>
                            <th class="py-3.5 px-4">Status</th>
                            <th class="py-3.5 px-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 text-xs">
                        @forelse ($foundItems as $item)
                            <tr class="hover:bg-zinc-50 transition-colors">
                                <td class="py-3.5 px-4 font-bold text-zinc-900">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-lg bg-zinc-100 flex-shrink-0 overflow-hidden border border-zinc-200">
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-zinc-400 font-bold text-[10px]">NO IMG</div>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="font-bold text-zinc-900">{{ $item->item_name }}</div>
                                            <div class="text-[11px] text-zinc-400 line-clamp-1">{{ $item->description }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3.5 px-4 text-zinc-600">
                                    <span class="font-medium text-zinc-900 block">{{ $item->category->name }}</span>
                                    <span class="text-[11px] text-zinc-400">{{ $item->location->name }}</span>
                                </td>
                                <td class="py-3.5 px-4 text-zinc-600">
                                    <span class="font-semibold text-zinc-900 block">{{ $item->contact_name }}</span>
                                    <span class="text-[11px] text-zinc-500">{{ $item->contact_phone }}</span>
                                </td>
                                <td class="py-3.5 px-4 text-zinc-600">
                                    {{ \Carbon\Carbon::parse($item->found_date)->translatedFormat('d M Y') }}
                                </td>
                                <td class="py-3.5 px-4">
                                    <x-business.status-badge :status="$item->status" />
                                </td>
                                <td class="py-3.5 px-4 text-right space-x-2">
                                    <a href="{{ route('admin.found-items.show', $item->id) }}" class="px-2.5 py-1.5 rounded-lg bg-zinc-100 text-zinc-800 hover:bg-zinc-200 font-semibold text-[11px] inline-block">
                                        Detail / Match
                                    </a>
                                    <form action="{{ route('admin.found-items.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1.5 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 font-semibold text-[11px]">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-zinc-400 text-xs">Belum ada data laporan barang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-zinc-100">
                {{ $foundItems->links() }}
            </div>
        </div>

    </div>

</x-layout.admin>
