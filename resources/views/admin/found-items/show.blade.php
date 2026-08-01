<x-layout.admin header="Detail Barang Ditemukan & Smart Matching">

    <div class="space-y-8">
        <a href="{{ route('admin.found-items.index') }}" class="inline-flex items-center text-xs font-semibold text-zinc-600 hover:text-zinc-900">
            &larr; Kembali ke Daftar Barang Ditemukan
        </a>

        <!-- Main Detail Card -->
        <div class="bg-white rounded-2xl border border-[#E7E2DA] shadow-paper p-6 sm:p-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Image Column -->
            <div class="bg-zinc-100 rounded-xl overflow-hidden min-h-[200px] flex items-center justify-center border border-zinc-200">
                @if ($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover">
                @else
                    <span class="text-xs text-zinc-400 font-semibold">Tanpa Foto</span>
                @endif
            </div>

            <!-- Details Column -->
            <div class="md:col-span-2 space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-wider block">Laporan Barang Ditemukan</span>
                        <h2 class="text-2xl font-bold text-zinc-900">{{ $item->item_name }}</h2>
                    </div>
                    <x-business.status-badge :status="$item->status" />
                </div>

                <div class="grid grid-cols-2 gap-4 text-xs bg-[#FAF8F4] p-4 rounded-xl border border-zinc-200">
                    <div>
                        <span class="text-zinc-400 block">Kategori:</span>
                        <span class="font-bold text-zinc-900">{{ $item->category->name }}</span>
                    </div>
                    <div>
                        <span class="text-zinc-400 block">Lokasi Penemuan:</span>
                        <span class="font-bold text-zinc-900">{{ $item->location->name }}</span>
                    </div>
                    <div>
                        <span class="text-zinc-400 block">Tanggal Ditemukan:</span>
                        <span class="font-bold text-zinc-900">{{ \Carbon\Carbon::parse($item->found_date)->translatedFormat('d F Y') }}</span>
                    </div>
                    <div>
                        <span class="text-zinc-400 block">Penemu / Kontak:</span>
                        <span class="font-bold text-zinc-900">{{ $item->contact_name }} ({{ $item->contact_phone }})</span>
                    </div>
                </div>

                <div>
                    <h4 class="text-xs font-bold text-zinc-900 uppercase tracking-wider mb-1">Deskripsi & Kondisi</h4>
                    <p class="text-xs text-zinc-600 leading-relaxed">{{ $item->description ?: 'Tidak ada deskripsi.' }}</p>
                </div>

                <!-- Update Status Form -->
                <div class="pt-4 border-t border-zinc-100 flex items-center space-x-3">
                    <form action="{{ route('admin.found-items.update-status', $item->id) }}" method="POST" class="flex items-center space-x-2">
                        @csrf
                        @method('PATCH')
                        <label class="text-xs font-bold text-zinc-700">Ubah Status:</label>
                        <select name="status" class="px-3 py-1.5 text-xs bg-[#FAF8F4] border border-zinc-300 rounded-lg focus:outline-none">
                            <option value="found" {{ $item->status === 'found' ? 'selected' : '' }}>Ditemukan</option>
                            <option value="claimed" {{ $item->status === 'claimed' ? 'selected' : '' }}>Diklaim</option>
                            <option value="returned" {{ $item->status === 'returned' ? 'selected' : '' }}>Dikembalikan</option>
                        </select>
                        <button type="submit" class="px-3 py-1.5 bg-zinc-900 text-white text-xs font-bold rounded-lg hover:bg-zinc-800">
                            Update Status
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Smart Manual Matching Widget -->
        <div class="bg-amber-50/60 rounded-2xl border border-amber-200 p-6 space-y-4">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-amber-500 text-white flex items-center justify-center font-bold">
                    💡
                </div>
                <div>
                    <h3 class="text-base font-bold text-zinc-900">Smart Manual Matching</h3>
                    <p class="text-xs text-zinc-600">Daftar Laporan Kehilangan di lokasi <strong>{{ $item->location->name }}</strong> & kategori <strong>{{ $item->category->name }}</strong> yang berpotensi memiliki pemilik barang ini.</p>
                </div>
            </div>

            @if ($matchingLostItems->isEmpty())
                <div class="p-4 bg-white rounded-xl text-center text-xs text-zinc-500 border border-amber-200">
                    Belum ada laporan kehilangan yang berpotensi cocok dengan lokasi/kategori ini.
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ($matchingLostItems as $lItem)
                        <div class="bg-white p-4 rounded-xl border border-amber-200 shadow-sm flex items-center justify-between">
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold bg-red-100 text-red-800 px-2 py-0.5 rounded">Laporan Hilang</span>
                                <h4 class="text-xs font-bold text-zinc-900">{{ $lItem->item_name }}</h4>
                                <p class="text-[11px] text-zinc-500">Pelapor: {{ $lItem->contact_name }} ({{ $lItem->contact_phone }})</p>
                            </div>
                            <a href="{{ route('admin.lost-items.show', $lItem->id) }}" class="px-3 py-1.5 bg-red-600 text-white text-xs font-semibold rounded-lg hover:bg-red-700">
                                Lihat Laporan &rarr;
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>

</x-layout.admin>
