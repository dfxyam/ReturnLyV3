<x-layout.guest title="Lapor Barang Ditemukan - ReturnLy">

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="text-center mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold text-zinc-900">Form Lapor Penemuan Barang</h1>
            <p class="text-xs sm:text-sm text-zinc-600 mt-1">Terima kasih telah berbuat baik! Laporkan barang yang Anda temukan di sekolah.</p>
        </div>

        <div class="bg-white rounded-2xl border border-[#E7E2DA] shadow-paper p-6 sm:p-8">
            <form action="{{ route('report.found.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <!-- Item Name -->
                <div>
                    <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Nama Barang Ditemukan <span class="text-red-500">*</span></label>
                    <input type="text" name="item_name" value="{{ old('item_name') }}" required placeholder="Contoh: Kunci Motor Honda, Tumbler Tupperware Biru..." class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                    @error('item_name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Category & Location -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select name="category_id" required class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Lokasi Penemuan <span class="text-red-500">*</span></label>
                        <select name="location_id" required class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                            <option value="">Pilih Lokasi</option>
                            @foreach ($locations as $loc)
                                <option value="{{ $loc->id }}" {{ old('location_id') == $loc->id ? 'selected' : '' }}>{{ $loc->name }}</option>
                            @endforeach
                        </select>
                        @error('location_id') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Found Date -->
                <div>
                    <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Tanggal Ditemukan <span class="text-red-500">*</span></label>
                    <input type="date" name="found_date" value="{{ old('found_date', date('Y-m-d')) }}" max="{{ date('Y-m-d') }}" required class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                    @error('found_date') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Deskripsi Kondisi Barang</label>
                    <textarea name="description" rows="4" placeholder="Jelaskan kondisi fisik barang, warna, atau tempat penyimpanan sementara..." class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">{{ old('description') }}</textarea>
                    @error('description') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Image Upload -->
                <div>
                    <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Foto Barang (Sangat Disarankan)</label>
                    <input type="file" name="image" accept="image/*" class="w-full text-xs text-zinc-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white hover:file:bg-zinc-800">
                    <span class="text-[11px] text-zinc-500 mt-1 block">Format: JPG, PNG, WEBP (Maksimal 5MB).</span>
                    @error('image') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Contact Name & Phone -->
                <div class="pt-4 border-t border-zinc-100 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Nama Penemu <span class="text-red-500">*</span></label>
                        <input type="text" name="contact_name" value="{{ old('contact_name') }}" required placeholder="Nama Anda" class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                        @error('contact_name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Nomor WhatsApp <span class="text-red-500">*</span></label>
                        <input type="tel" name="contact_phone" value="{{ old('contact_phone') }}" required placeholder="08123456789" class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                        @error('contact_phone') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm rounded-xl shadow-sm transition-colors">
                        Kirim Laporan Penemuan
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layout.guest>
