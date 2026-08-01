<x-layout.guest title="{{ $item->item_name }} - Detail Barang Hilang">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <a href="{{ route('lost-items.index') }}" class="inline-flex items-center text-xs font-semibold text-zinc-600 hover:text-zinc-900 mb-6">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Daftar Barang Hilang
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
                                <span class="font-medium w-32 text-zinc-400">Lokasi Kehilangan:</span>
                                <span class="font-semibold text-zinc-900">{{ $item->location->name }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="font-medium w-32 text-zinc-400">Tanggal Hilang:</span>
                                <span class="font-semibold text-zinc-900">{{ \Carbon\Carbon::parse($item->lost_date)->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="font-medium w-32 text-zinc-400">Nama Pelapor:</span>
                                <span class="font-semibold text-zinc-900">{{ $item->contact_name }}</span>
                            </div>
                        </div>

                        <div class="border-t border-zinc-100 pt-4">
                            <h3 class="text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Ciri-Ciri & Deskripsi</h3>
                            <p class="text-xs text-zinc-600 leading-relaxed whitespace-pre-line">
                                {{ $item->description ?: 'Tidak ada deskripsi rinci yang dicantumkan.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Contact Action -->
                    <div class="border-t border-zinc-100 pt-6 space-y-3">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->contact_phone) }}?text=Halo%20{{ urlencode($item->contact_name) }},%20saya%20melihat%20laporan%20barang%20hilang%20'{{ urlencode($item->item_name) }}'%20di%20ReturnLy." 
                           target="_blank" 
                           class="w-full py-3 px-4 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl transition-colors flex items-center justify-center space-x-2 shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                            <span>Hubungi Pelapor via WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout.guest>
