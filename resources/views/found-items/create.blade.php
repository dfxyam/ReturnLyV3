<x-layouts.guest title="Lapor Barang Ditemukan - ReturnLy">

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="text-center mb-8 space-y-2">
            <span class="px-3.5 py-1 rounded-full bg-cyan-500/10 text-cyan-300 text-xs font-semibold border border-cyan-500/20 backdrop-blur-md">
                Laporan Penemuan
            </span>
            <h1 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">Form Lapor Barang Ditemukan</h1>
            <p class="text-xs sm:text-sm text-slate-400">Bantu pemilik menemukan kembali barangnya dengan melaporkan barang yang Anda temukan.</p>
        </div>

        <div class="glass-card p-6 sm:p-8 rounded-[28px] border border-white/10 bg-slate-900/40 backdrop-blur-xl shadow-2xl">
            <form action="{{ route('report.found.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <!-- Item Name -->
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Nama Barang Ditemukan <span class="text-cyan-400">*</span></label>
                    <input type="text" name="item_name" value="{{ old('item_name') }}" required placeholder="Contoh: Botol Minum Thermos Hitam, Tas Eiger..." class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 transition-all">
                    @error('item_name') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Category & Location -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Kategori <span class="text-cyan-400">*</span></label>
                        <select name="category_id" required class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white focus:outline-none focus:border-cyan-500 transition-all">
                            <option value="" class="bg-slate-900 text-slate-400">Pilih Kategori</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" class="bg-slate-900 text-white" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Lokasi Ditemukan <span class="text-cyan-400">*</span></label>
                        <select name="location_id" required class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white focus:outline-none focus:border-cyan-500 transition-all">
                            <option value="" class="bg-slate-900 text-slate-400">Pilih Lokasi</option>
                            @foreach ($locations as $loc)
                                <option value="{{ $loc->id }}" class="bg-slate-900 text-white" {{ old('location_id') == $loc->id ? 'selected' : '' }}>{{ $loc->name }}</option>
                            @endforeach
                        </select>
                        @error('location_id') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Found Date & Storage Location -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Tanggal Ditemukan <span class="text-cyan-400">*</span></label>
                        <input type="date" name="found_date" value="{{ old('found_date', date('Y-m-d')) }}" max="{{ date('Y-m-d') }}" required class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white focus:outline-none focus:border-cyan-500 transition-all">
                        @error('found_date') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Tempat Penyimpanan Barang (Opsional)</label>
                        <input type="text" name="storage_location" value="{{ old('storage_location') }}" placeholder="Contoh: Ruang BK, Ruang Guru..." class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 transition-all">
                        @error('storage_location') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Deskripsi Kondisi Barang <span class="text-cyan-400">*</span></label>
                    <textarea name="description" rows="4" required placeholder="Jelaskan kondisi barang saat ditemukan, tempat persis penemuan, atau ciri mencolok..." class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 transition-all">{{ old('description') }}</textarea>
                    @error('description') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Photo Upload -->
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Foto Barang (Opsional)</label>
                    <input type="file" name="photo" accept="image/*" class="w-full text-xs text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-[14px] file:border-0 file:text-xs file:font-semibold file:bg-cyan-500/20 file:text-cyan-300 hover:file:bg-cyan-500/30 file:transition-all">
                    <span class="text-[11px] text-slate-500 mt-1 block">Format: JPG, JPEG, PNG, WEBP (Maksimal 2 MB).</span>
                    @error('photo') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Finder Details -->
                <div class="pt-4 border-t border-white/10 space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Nama Penemu <span class="text-cyan-400">*</span></label>
                            <input type="text" name="finder_name" value="{{ old('finder_name') }}" required placeholder="Nama lengkap Anda" class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 transition-all">
                            @error('finder_name') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Kelas (Opsional)</label>
                            <input type="text" name="class_name" value="{{ old('class_name') }}" placeholder="Contoh: XI TKJ 2" class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 transition-all">
                            @error('class_name') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Nomor WhatsApp <span class="text-cyan-400">*</span></label>
                        <input type="tel" name="phone_number" value="{{ old('phone_number') }}" required placeholder="08123456789" class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 transition-all">
                        @error('phone_number') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-cyan-500 to-emerald-500 text-slate-950 font-bold text-xs sm:text-sm rounded-[16px] hover:brightness-110 shadow-lg shadow-cyan-500/20 transition-all">
                        Kirim Laporan Penemuan
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.guest>
