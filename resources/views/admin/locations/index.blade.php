<x-layout.admin header="Kelola Lokasi Sekolah">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Add Location Form -->
        <div class="bg-white p-6 rounded-2xl border border-[#E7E2DA] shadow-paper space-y-4">
            <h3 class="text-base font-bold text-zinc-900">Tambah Lokasi Baru</h3>
            <form action="{{ route('admin.locations.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Nama Lokasi <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required placeholder="Contoh: Kantin Utama, Perpustakaan Lt. 2..." class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                    @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="w-full py-3 bg-zinc-900 text-white font-bold text-xs rounded-xl hover:bg-zinc-800 transition-colors">
                    + Tambah Lokasi
                </button>
            </form>
        </div>

        <!-- Locations List Table -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-[#E7E2DA] shadow-paper overflow-hidden">
            <div class="px-6 py-4 border-b border-zinc-100 flex items-center justify-between">
                <h3 class="text-base font-bold text-zinc-900">Daftar Lokasi Sekolah</h3>
                <span class="text-xs text-zinc-500 font-medium">Total: {{ $locations->total() }}</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-[#FAF8F4] border-b border-[#E7E2DA] text-[11px] font-bold text-zinc-500 uppercase tracking-wider">
                            <th class="py-3.5 px-4">Nama Lokasi</th>
                            <th class="py-3.5 px-4">Total Barang Hilang</th>
                            <th class="py-3.5 px-4">Total Barang Ditemukan</th>
                            <th class="py-3.5 px-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        @forelse ($locations as $loc)
                            <tr class="hover:bg-zinc-50 transition-colors">
                                <td class="py-3.5 px-4 font-bold text-zinc-900">{{ $loc->name }}</td>
                                <td class="py-3.5 px-4 text-zinc-600 font-semibold">{{ $loc->lost_items_count }}</td>
                                <td class="py-3.5 px-4 text-zinc-600 font-semibold">{{ $loc->found_items_count }}</td>
                                <td class="py-3.5 px-4 text-right">
                                    <form action="{{ route('admin.locations.destroy', $loc->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus lokasi ini?')">
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
                                <td colspan="4" class="py-8 text-center text-zinc-400 text-xs">Belum ada lokasi sekolah.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-zinc-100">
                {{ $locations->links() }}
            </div>
        </div>

    </div>

</x-layout.admin>
