<x-layout.guest title="{{ $item->item_name }} - Detail Barang Ditemukan">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <a href="{{ route('found-items.index') }}" class="inline-flex items-center text-xs font-semibold text-zinc-600 hover:text-zinc-900 mb-6">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Daftar Barang Ditemukan
        </a>

        <div class="bg-white rounded-2xl border border-[#E7E2DA] shadow-paper overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <!-- Image Container -->
                <div class="bg-zinc-100 min-h-[300px] flex items-center justify-center relative border-b md:border-b-0 md:border-r border-[#E7E2DA]">
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->item_name }}" class="w-full h-full object-cover">
                    @else
                        <div class="text-center text-zinc-400 p-8">
                            <svg class="w-16 h-16 mx-auto mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-xs font-medium">Foto Tidak Disediakan</span>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4">
                        <x-business.status-badge :status="$item->status" />
                    </div>
                </div>

                <!-- Info Container -->
                <div class="p-6 sm:p-8 flex flex-col justify-between space-y-6">
                    <div>
                        <div class="inline-block px-2.5 py-1 rounded-lg bg-zinc-100 text-zinc-800 text-xs font-semibold mb-2">
                            {{ $item->category->name }}
                        </div>
                        <h1 class="text-2xl font-bold text-zinc-900 mb-3">{{ $item->item_name }}</h1>
                        
                        <div class="space-y-2 text-xs text-zinc-600 mb-6">
                            <div class="flex items-center">
                                <span class="font-medium w-32 text-zinc-400">Lokasi Penemuan:</span>
                                <span class="font-semibold text-zinc-900">{{ $item->location->name }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="font-medium w-32 text-zinc-400">Tanggal Ditemukan:</span>
                                <span class="font-semibold text-zinc-900">{{ \Carbon\Carbon::parse($item->found_date)->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="font-medium w-32 text-zinc-400">Penemu / Penemu:</span>
                                <span class="font-semibold text-zinc-900">{{ $item->contact_name }}</span>
                            </div>
                        </div>

                        <div class="border-t border-zinc-100 pt-4">
                            <h3 class="text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Ciri-Ciri & Deskripsi Barang</h3>
                            <p class="text-xs text-zinc-600 leading-relaxed whitespace-pre-line">
                                {{ $item->description ?: 'Tidak ada deskripsi rinci yang dicantumkan.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Claim Action Button -->
                    <div class="border-t border-zinc-100 pt-6 space-y-3">
                        @if ($item->status === 'found')
                            <a href="{{ route('claims.create', ['found_item_id' => $item->id]) }}" 
                               class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl transition-colors flex items-center justify-center space-x-2 shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>Ajukan Klaim Kepemilikan Barang Ini</span>
                            </a>
                        @else
                            <div class="p-3 bg-zinc-100 rounded-xl text-center text-xs font-semibold text-zinc-500">
                                Barang ini telah diklaim atau dikembalikan.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout.guest>
