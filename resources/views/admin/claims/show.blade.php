<x-layout.admin header="Verifikasi & Validasi Klaim">

    <div class="max-w-4xl mx-auto space-y-6">
        <a href="{{ route('admin.claims.index') }}" class="inline-flex items-center text-xs font-semibold text-zinc-600 hover:text-zinc-900">
            &larr; Kembali ke Daftar Klaim
        </a>

        <!-- Claim Header Card -->
        <div class="bg-white rounded-2xl border border-[#E7E2DA] shadow-paper p-6 sm:p-8 space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-zinc-100 pb-4 gap-4">
                <div>
                    <span class="text-xs font-bold text-zinc-400 uppercase tracking-wider block">Kode Klaim</span>
                    <h2 class="text-2xl font-bold font-mono text-zinc-900">{{ $claim->claim_number }}</h2>
                </div>
                <x-business.status-badge :status="$claim->status" />
            </div>

            <!-- Grid Comparison / Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Found Item Info -->
                <div class="bg-blue-50/70 p-5 rounded-2xl border border-blue-200 space-y-3">
                    <span class="text-[11px] font-bold text-blue-700 uppercase tracking-wider block">Detail Barang Ditemukan</span>
                    <h3 class="text-base font-bold text-zinc-900">{{ $claim->foundItem->item_name ?? 'N/A' }}</h3>
                    
                    <div class="space-y-1 text-xs text-zinc-600">
                        <p><span class="font-medium text-zinc-400">Kategori:</span> {{ $claim->foundItem->category->name ?? 'N/A' }}</p>
                        <p><span class="font-medium text-zinc-400">Lokasi:</span> {{ $claim->foundItem->location->name ?? 'N/A' }}</p>
                        <p><span class="font-medium text-zinc-400">Tanggal Penemuan:</span> {{ \Carbon\Carbon::parse($claim->foundItem->found_date)->translatedFormat('d F Y') }}</p>
                        <p><span class="font-medium text-zinc-400">Penemu:</span> {{ $claim->foundItem->contact_name ?? 'N/A' }} ({{ $claim->foundItem->contact_phone ?? 'N/A' }})</p>
                    </div>

                    @if ($claim->foundItem->image)
                        <div class="mt-3 h-32 rounded-xl overflow-hidden border border-blue-200">
                            <img src="{{ asset('storage/' . $claim->foundItem->image) }}" class="w-full h-full object-cover">
                        </div>
                    @endif
                </div>

                <!-- Claimant Info & Proof -->
                <div class="bg-white p-5 rounded-2xl border border-zinc-200 space-y-3 shadow-sm">
                    <span class="text-[11px] font-bold text-zinc-700 uppercase tracking-wider block">Data Pengklaim & Bukti Kepemilikan</span>
                    
                    <div class="space-y-1 text-xs text-zinc-600">
                        <p><span class="font-medium text-zinc-400">Nama Pengklaim:</span> <strong class="text-zinc-900">{{ $claim->claimant_name }}</strong></p>
                        <p><span class="font-medium text-zinc-400">No. WhatsApp:</span> <strong class="text-zinc-900">{{ $claim->claimant_phone }}</strong></p>
                        <p><span class="font-medium text-zinc-400">Tanggal Pengajuan:</span> {{ $claim->created_at->translatedFormat('d F Y, H:i') }}</p>
                    </div>

                    <div class="pt-3 border-t border-zinc-100">
                        <span class="text-xs font-bold text-zinc-900 uppercase tracking-wider block mb-1">Bukti Kepemilikan Diajukan:</span>
                        <div class="p-3 bg-[#FAF8F4] rounded-xl border border-[#E7E2DA] text-xs text-zinc-800 leading-relaxed font-serif">
                            "{{ $claim->proof_description }}"
                        </div>
                    </div>
                </div>
            </div>

            <!-- Verification Action Form -->
            <div class="border-t border-zinc-100 pt-6">
                <h3 class="text-base font-bold text-zinc-900 mb-4">Keputusan Verifikasi Admin</h3>
                
                <form action="{{ route('admin.claims.update-status', $claim->id) }}" method="POST" class="space-y-4 bg-[#FAF8F4] p-5 rounded-2xl border border-[#E7E2DA]">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Status Verifikasi <span class="text-red-500">*</span></label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center space-x-2 text-xs font-bold text-amber-700">
                                <input type="radio" name="status" value="pending" {{ $claim->status === 'pending' ? 'checked' : '' }} class="text-amber-600 focus:ring-amber-500">
                                <span>Pending (Menunggu Review)</span>
                            </label>
                            <label class="inline-flex items-center space-x-2 text-xs font-bold text-emerald-700">
                                <input type="radio" name="status" value="approved" {{ $claim->status === 'approved' ? 'checked' : '' }} class="text-emerald-600 focus:ring-emerald-500">
                                <span>Setujui Klaim (Approved)</span>
                            </label>
                            <label class="inline-flex items-center space-x-2 text-xs font-bold text-rose-700">
                                <input type="radio" name="status" value="rejected" {{ $claim->status === 'rejected' ? 'checked' : '' }} class="text-rose-600 focus:ring-rose-500">
                                <span>Tolak Klaim (Rejected)</span>
                            </label>
                        </div>
                    </div>

                    <div class="pt-2">
                        <label class="inline-flex items-center space-x-2 text-xs font-semibold text-zinc-800">
                            <input type="checkbox" name="mark_returned" value="1" class="rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900">
                            <span>Tandai Barang sebagai "Dikembalikan" (Status Barang otomatis berubah menjadi Returned)</span>
                        </label>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider mb-2">Catatan Admin (Akan terlihat oleh Pengklaim)</label>
                        <textarea name="admin_notes" rows="3" placeholder="Tambahkan instruksi pengambilan barang atau alasan penolakan klaim..." class="w-full px-4 py-2.5 text-xs sm:text-sm bg-white border border-[#E7E2DA] rounded-xl focus:outline-none focus:border-zinc-900">{{ old('admin_notes', $claim->admin_notes) }}</textarea>
                    </div>

                    <div class="pt-2 flex justify-end">
                        <button type="submit" class="px-6 py-3 bg-zinc-900 hover:bg-zinc-800 text-white font-bold text-xs sm:text-sm rounded-xl shadow-sm transition-colors">
                            Simpan Hasil Verifikasi
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</x-layout.admin>
