<x-layout.guest title="Form Pengajuan Klaim - ReturnLy">

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="text-center mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold text-zinc-900">Form Pengajuan Klaim Kepemilikan</h1>
            <p class="text-xs sm:text-sm text-zinc-600 mt-1">Buktikan bahwa barang yang ditemukan adalah milik Anda.</p>
        </div>

        @if ($foundItem)
            <!-- Selected Found Item Preview -->
            <div class="bg-blue-50 border border-blue-200 rounded-2xl p-4 mb-6 flex items-center space-x-4">
                <div class="w-16 h-16 rounded-xl bg-white flex-shrink-0 overflow-hidden border border-blue-100 flex items-center justify-center">
                    @if ($foundItem->image)
                        <img src="{{ asset('storage/' . $foundItem->image) }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-6 h-6 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    @endif
                </div>
                <div>
                    <span class="text-[11px] font-bold text-blue-600 uppercase tracking-wider">Barang Yang Mengajukan Klaim</span>
                    <h3 class="text-sm font-bold text-zinc-900">{{ $foundItem->item_name }}</h3>
                    <p class="text-xs text-zinc-600">{{ $foundItem->location->name }} • Ditemukan {{ \Carbon\Carbon::parse($foundItem->found_date)->translatedFormat('d M Y') }}</p>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-2xl border border-[#E7E2DA] shadow-paper p-6 sm:p-8">
            <form action="{{ route('claims.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Found Item Select -->
                <div>
                    <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Pilih Barang Ditemukan <span class="text-red-500">*</span></label>
                    <select name="found_item_id" required class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                        <option value="">-- Pilih Barang Ditemukan --</option>
                        @foreach ($foundItems as $item)
                            <option value="{{ $item->id }}" {{ (old('found_item_id') == $item->id || (isset($foundItem) && $foundItem->id == $item->id)) ? 'selected' : '' }}>
                                {{ $item->item_name }} (Ditemukan di {{ $item->location->name }})
                            </option>
                        @endforeach
                    </select>
                    @error('found_item_id') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Linked Lost Item (Optional) -->
                <div>
                    <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Hubungkan dengan Laporan Barang Hilang Anda (Opsional)</label>
                    <select name="lost_item_id" class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                        <option value="">-- Tidak ada / Buat klaim baru saja --</option>
                        @foreach ($lostItems as $lItem)
                            <option value="{{ $lItem->id }}" {{ old('lost_item_id') == $lItem->id ? 'selected' : '' }}>
                                {{ $lItem->item_name }} (Pelapor: {{ $lItem->contact_name }})
                            </option>
                        @endforeach
                    </select>
                    <span class="text-[11px] text-zinc-500 mt-1 block">Jika Anda pernah membuat laporan kehilangan sebelumnya, pilih untuk mempercepat verifikasi.</span>
                    @error('lost_item_id') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Claimant Name & Phone -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Nama Pengklaim <span class="text-red-500">*</span></label>
                        <input type="text" name="claimant_name" value="{{ old('claimant_name') }}" required placeholder="Nama lengkap Anda" class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                        @error('claimant_name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Nomor WhatsApp <span class="text-red-500">*</span></label>
                        <input type="tel" name="claimant_phone" value="{{ old('claimant_phone') }}" required placeholder="08123456789" class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">
                        @error('claimant_phone') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Proof Description -->
                <div>
                    <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Rincian Bukti Kepemilikan <span class="text-red-500">*</span></label>
                    <textarea name="proof_description" rows="5" required placeholder="Sebutkan bukti khusus yang membuktikan barang ini milik Anda (misal: isi dompet, ganti nomor seri, goresan di sudut kiri, foto bukti pembelian/kepemilikan...)" class="w-full px-4 py-2.5 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">{{ old('proof_description') }}</textarea>
                    <span class="text-[11px] text-zinc-500 mt-1 block">Minimal 10 karakter. Semakin rinci bukti yang Anda berikan, semakin cepat verifikasi admin.</span>
                    @error('proof_description') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="w-full py-3.5 bg-zinc-900 hover:bg-zinc-800 text-white font-bold text-xs sm:text-sm rounded-xl shadow-sm transition-colors">
                        Kirim Pengajuan Klaim
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layout.guest>
