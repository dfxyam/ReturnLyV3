<x-layouts.guest title="Ajukan Klaim Barang - ReturnLy">

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="text-center mb-8 space-y-2">
            <span class="px-3.5 py-1 rounded-full bg-emerald-500/10 text-emerald-300 text-xs font-semibold border border-emerald-500/20 backdrop-blur-md">
                Verifikasi Kepemilikan
            </span>
            <h1 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">Form Pengajuan Klaim Barang</h1>
            <p class="text-xs sm:text-sm text-slate-400">Jelaskan alasan dan bukti rinci bahwa barang yang ditemukan adalah milik Anda.</p>
        </div>

        @if($selectedItem)
            <!-- Selected Found Item Summary -->
            <div class="glass-card p-6 rounded-[24px] border border-cyan-500/30 bg-gradient-to-r from-cyan-500/10 via-slate-900/60 to-emerald-500/10 backdrop-blur-xl mb-6">
                <div class="flex items-start space-x-4">
                    @if($selectedItem->photo)
                        <img src="{{ asset('storage/' . $selectedItem->photo) }}" alt="{{ $selectedItem->item_name }}" class="w-16 h-16 rounded-[16px] object-cover border border-white/10 flex-shrink-0">
                    @else
                        <div class="w-16 h-16 rounded-[16px] bg-slate-950/80 border border-white/10 flex items-center justify-center text-slate-500 flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <span class="text-[10px] uppercase font-bold text-cyan-400">Barang Yang Diklaim</span>
                        <h3 class="text-base font-bold text-white truncate">{{ $selectedItem->item_name }}</h3>
                        <p class="text-xs text-slate-300 mt-1">Ditemukan di {{ $selectedItem->location->name }} • {{ \Carbon\Carbon::parse($selectedItem->found_date)->translatedFormat('d M Y') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="glass-card p-6 sm:p-8 rounded-[28px] border border-white/10 bg-slate-900/40 backdrop-blur-xl shadow-2xl">
            <form action="{{ route('claims.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Select Found Item -->
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Pilih Barang Ditemukan <span class="text-emerald-400">*</span></label>
                    <select name="found_item_id" required class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white focus:outline-none focus:border-emerald-500 transition-all">
                        <option value="" class="bg-slate-900 text-slate-400">Pilih Barang yang Ditemukan</option>
                        @foreach ($availableItems as $item)
                            <option value="{{ $item->id }}" class="bg-slate-900 text-white" {{ (old('found_item_id', optional($selectedItem)->id) == $item->id) ? 'selected' : '' }}>
                                {{ $item->item_name }} (Ditemukan di: {{ $item->location->name }} - {{ $item->found_date->format('d M Y') }})
                            </option>
                        @endforeach
                    </select>
                    @error('found_item_id') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Claimer Details -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Nama Pengklaim <span class="text-emerald-400">*</span></label>
                        <input type="text" name="claimer_name" value="{{ old('claimer_name') }}" required placeholder="Nama lengkap Anda" class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 transition-all">
                        @error('claimer_name') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Kelas (Opsional)</label>
                        <input type="text" name="class_name" value="{{ old('class_name') }}" placeholder="Contoh: XI RPL 1" class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 transition-all">
                        @error('class_name') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Nomor WhatsApp <span class="text-emerald-400">*</span></label>
                    <input type="tel" name="phone_number" value="{{ old('phone_number') }}" required placeholder="08123456789" class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 transition-all">
                    <span class="text-[11px] text-slate-500 mt-1 block">Nomor ini digunakan Admin untuk memverifikasi klaim Anda.</span>
                    @error('phone_number') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Reason / Proof -->
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Alasan & Bukti Kepemilikan <span class="text-emerald-400">*</span></label>
                    <textarea name="reason" rows="5" required placeholder="Sebutkan ciri rahasia barang, stiker khusus, goresan, isi dalam barang, atau tanda yang hanya Anda ketahui (minimal 10 karakter)..." class="w-full px-4 py-3 text-xs sm:text-sm bg-slate-950/60 border border-white/10 rounded-[18px] text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 transition-all">{{ old('reason') }}</textarea>
                    @error('reason') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-bold text-xs sm:text-sm rounded-[16px] hover:brightness-110 shadow-lg shadow-emerald-500/20 transition-all">
                        Kirim Pengajuan Klaim
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.guest>
