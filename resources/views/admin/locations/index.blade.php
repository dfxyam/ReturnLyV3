<x-layouts.admin title="Kelola Lokasi Sekolah - ReturnLy">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Add Location Form -->
        <div class="glass-card p-6 rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl space-y-4 h-fit">
            <h3 class="text-base font-bold text-white">Tambah Lokasi Baru</h3>
            <form action="{{ route('admin.locations.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Nama Lokasi Sekolah <span class="text-cyan-400">*</span></label>
                    <input type="text" name="name" required placeholder="Contoh: Kantin Utama, Perpustakaan Lt. 2..." class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 transition-all">
                    @error('name') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="w-full py-3 bg-gradient-to-r from-cyan-500 to-emerald-500 text-slate-950 font-bold text-xs rounded-[16px] hover:brightness-110 shadow-lg shadow-cyan-500/20 transition-all">
                    + Tambah Lokasi
                </button>
            </form>
        </div>

        <!-- Locations List Table -->
        <div class="lg:col-span-2 glass-card rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl overflow-hidden shadow-2xl">
            <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between">
                <h3 class="text-base font-bold text-white">Daftar Lokasi Sekolah</h3>
                <span class="text-xs text-cyan-400 font-semibold">Total: {{ $locations->total() }}</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300 border-collapse">
                    <thead class="bg-slate-950/80 text-slate-400 uppercase font-semibold text-[10px] tracking-wider border-b border-white/10">
                        <tr>
                            <th class="py-4 px-6">Nama Lokasi</th>
                            <th class="py-4 px-6">Total Barang Hilang</th>
                            <th class="py-4 px-6">Total Barang Ditemukan</th>
                            <th class="py-4 px-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($locations as $loc)
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="py-4 px-6 font-bold text-white">{{ $loc->name }}</td>
                                <td class="py-4 px-6 text-amber-300 font-bold">{{ $loc->lost_items_count }}</td>
                                <td class="py-4 px-6 text-cyan-300 font-bold">{{ $loc->found_items_count }}</td>
                                <td class="py-4 px-6 text-right">
                                    <form action="{{ route('admin.locations.destroy', $loc->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus lokasi ini?')">
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
                                <td colspan="4" class="py-12 text-center text-slate-500 text-xs">Belum ada lokasi sekolah.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-white/10">
                {{ $locations->links() }}
            </div>
        </div>

    </div>

</x-layouts.admin>
