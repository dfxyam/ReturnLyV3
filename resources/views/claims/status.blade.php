<x-layout.guest title="Tracking Status Klaim - ReturnLy">

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="text-center mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold text-zinc-900">Cek Status Klaim</h1>
            <p class="text-xs sm:text-sm text-zinc-600 mt-1">Masukkan Kode Klaim unik Anda (Contoh: CLM-XXXXXXXX) untuk melihat status verifikasi admin.</p>
        </div>

        <!-- Search Box -->
        <div class="bg-white p-4 rounded-2xl border border-[#E7E2DA] shadow-paper mb-8">
            <form action="{{ route('claims.status') }}" method="GET" class="flex flex-col sm:flex-row gap-2">
                <input type="text" name="claim_number" value="{{ request('claim_number') }}" required placeholder="Masukkan Kode Klaim (misal: CLM-A1B2C3D4)" class="flex-1 px-4 py-3 text-xs sm:text-sm bg-[#FAF8F4] border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900 font-mono">
                <button type="submit" class="px-6 py-3 bg-zinc-900 text-white font-bold text-xs sm:text-sm rounded-xl hover:bg-zinc-800 transition-colors">
                    Cek Status
                </button>
            </form>
        </div>

        @if (request()->filled('claim_number'))
            @if ($claim)
                <!-- Claim Result Card -->
                <div class="bg-white rounded-2xl border border-[#E7E2DA] shadow-paper p-6 sm:p-8 space-y-6">
                    <div class="flex items-center justify-between border-b border-zinc-100 pb-4">
                        <div>
                            <span class="text-[11px] font-bold text-zinc-400 uppercase tracking-wider block">Kode Klaim</span>
                            <span class="text-lg font-bold font-mono text-zinc-900">{{ $claim->claim_number }}</span>
                        </div>
                        <x-business.status-badge :status="$claim->status" />
                    </div>

                    <div class="space-y-3 text-xs text-zinc-600">
                        <div class="flex justify-between">
                            <span class="text-zinc-400">Barang Yang Diklaim:</span>
                            <span class="font-bold text-zinc-900">{{ $claim->foundItem->item_name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-zinc-400">Nama Pengklaim:</span>
                            <span class="font-semibold text-zinc-900">{{ $claim->claimant_name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-zinc-400">Tanggal Pengajuan:</span>
                            <span class="font-semibold text-zinc-900">{{ $claim->created_at->translatedFormat('d F Y, H:i') }}</span>
                        </div>
                    </div>

                    <div class="bg-[#FAF8F4] p-4 rounded-xl border border-[#E7E2DA]">
                        <h4 class="text-xs font-bold text-zinc-900 uppercase tracking-wider mb-1">Bukti Kepemilikan Yang Diajukan</h4>
                        <p class="text-xs text-zinc-600 leading-relaxed">{{ $claim->proof_description }}</p>
                    </div>

                    @if ($claim->admin_notes)
                        <div class="bg-amber-50 p-4 rounded-xl border border-amber-200 text-amber-900">
                            <h4 class="text-xs font-bold uppercase tracking-wider mb-1">Catatan Verifikasi Admin</h4>
                            <p class="text-xs leading-relaxed">{{ $claim->admin_notes }}</p>
                        </div>
                    @endif

                    <!-- Instructions Based on Status -->
                    <div class="pt-4 border-t border-zinc-100 text-center">
                        @if ($claim->status === 'pending')
                            <p class="text-xs text-amber-700 bg-amber-50 p-3 rounded-xl">
                                ⏳ Pengajuan klaim Anda sedang diproses oleh tim administrasi sekolah. Mohon pantau halaman ini secara berkala.
                            </p>
                        @elseif ($claim->status === 'approved')
                            <div class="p-4 bg-emerald-50 rounded-xl border border-emerald-200 text-emerald-800 space-y-2">
                                <p class="text-xs font-bold">🎉 Selamat! Klaim Anda telah DISETUJUI oleh Admin Sekolah.</p>
                                <p class="text-xs">Silakan datang ke Ruang Administrasi/Piket Sekolah dengan membawa Kode Klaim ini & kartu identitas siswa untuk mengambil barang Anda.</p>
                            </div>
                        @elseif ($claim->status === 'rejected')
                            <p class="text-xs text-rose-700 bg-rose-50 p-3 rounded-xl">
                                ❌ Pengajuan klaim Anda belum dapat disetujui karena bukti kurang mencukupi. Hubungi pihak sekolah jika ada pertanyaan.
                            </p>
                        @endif
                    </div>
                </div>
            @else
                <!-- Claim Not Found -->
                <div class="bg-white rounded-2xl border border-[#E7E2DA] shadow-paper p-8 text-center">
                    <svg class="w-12 h-12 text-zinc-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <h3 class="text-base font-bold text-zinc-900 mb-1">Kode Klaim Tidak Ditemukan</h3>
                    <p class="text-xs text-zinc-500">Pastikan Anda memasukkan Kode Klaim dengan benar (misal: CLM-XXXXXXXX).</p>
                </div>
            @endif
        @endif
    </div>

</x-layout.guest>
