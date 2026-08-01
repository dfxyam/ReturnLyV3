<x-layout.admin header="Kelola Kategori Barang">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Add Category Form -->
        <div class="bg-white p-6 rounded-2xl border border-[#E7E2DA] shadow-paper space-y-4">
            <h3 class="text-base font-bold text-zinc-900">Tambah Kategori Baru</h3>
            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Nama Kategori <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required placeholder="Contoh: Elektronik, Pakaian..." class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                    @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="w-full py-3 bg-zinc-900 text-white font-bold text-xs rounded-xl hover:bg-zinc-800 transition-colors">
                    + Tambah Kategori
                </button>
            </form>
        </div>

        <!-- Categories List Table -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-[#E7E2DA] shadow-paper overflow-hidden">
            <div class="px-6 py-4 border-b border-zinc-100 flex items-center justify-between">
                <h3 class="text-base font-bold text-zinc-900">Daftar Kategori</h3>
                <span class="text-xs text-zinc-500 font-medium">Total: {{ $categories->total() }}</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-[#FAF8F4] border-b border-[#E7E2DA] text-[11px] font-bold text-zinc-500 uppercase tracking-wider">
                            <th class="py-3.5 px-4">Nama Kategori</th>
                            <th class="py-3.5 px-4">Total Barang Hilang</th>
                            <th class="py-3.5 px-4">Total Barang Ditemukan</th>
                            <th class="py-3.5 px-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        @forelse ($categories as $cat)
                            <tr class="hover:bg-zinc-50 transition-colors">
                                <td class="py-3.5 px-4 font-bold text-zinc-900">{{ $cat->name }}</td>
                                <td class="py-3.5 px-4 text-zinc-600 font-semibold">{{ $cat->lost_items_count }}</td>
                                <td class="py-3.5 px-4 text-zinc-600 font-semibold">{{ $cat->found_items_count }}</td>
                                <td class="py-3.5 px-4 text-right">
                                    <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kategori ini?')">
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
                                <td colspan="4" class="py-8 text-center text-zinc-400 text-xs">Belum ada kategori barang.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-zinc-100">
                {{ $categories->links() }}
            </div>
        </div>

    </div>

</x-layout.admin>
