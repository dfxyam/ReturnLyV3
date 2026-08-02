<x-layouts.admin title="Activity Logs - ReturnLy">
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-bold text-white tracking-tight">Riwayat Aktivitas Admin</h2>
            <p class="text-xs text-slate-400 mt-1">Audit log seluruh perubahan data dan aktivitas penting yang dilakukan Administrator.</p>
        </div>

        <div class="glass-card rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl overflow-hidden">
            @if($activities->isEmpty())
                <div class="p-12 text-center text-slate-400 text-xs">
                    Belum ada riwayat aktivitas.
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-slate-300">
                        <thead class="bg-slate-950/80 text-slate-400 uppercase font-semibold text-[10px] tracking-wider border-b border-white/10">
                            <tr>
                                <th class="px-6 py-4">Waktu</th>
                                <th class="px-6 py-4">Nama Aktivitas</th>
                                <th class="px-6 py-4">Deskripsi / Detail</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @foreach($activities as $activity)
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-slate-400">
                                        {{ $activity->created_at->format('d M Y H:i:s') }}
                                    </td>
                                    <td class="px-6 py-4 font-bold text-emerald-400 whitespace-nowrap">
                                        {{ $activity->activity }}
                                    </td>
                                    <td class="px-6 py-4 text-slate-300">
                                        {{ $activity->description ?: '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-white/10">
                    {{ $activities->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.admin>
