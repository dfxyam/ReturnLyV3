<x-layouts.admin title="Notifikasi Sistem - ReturnLy">
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-bold text-white tracking-tight">Notifikasi Sistem</h2>
            <p class="text-xs text-slate-400 mt-1">Daftar pemberitahuan aktivitas penting dari sistem ReturnLy.</p>
        </div>

        <div class="glass-card rounded-[24px] border border-white/10 bg-slate-900/40 backdrop-blur-xl overflow-hidden">
            @if($notifications->isEmpty())
                <div class="p-12 text-center text-slate-400 text-xs">
                    Belum ada notifikasi sistem.
                </div>
            @else
                <div class="divide-y divide-white/5">
                    @foreach($notifications as $notification)
                        <div class="p-5 flex items-start justify-between space-x-4 {{ $notification->is_read ? 'opacity-60 bg-slate-950/20' : 'bg-emerald-500/5' }}">
                            <div class="space-y-1">
                                <div class="flex items-center space-x-2">
                                    <h4 class="text-sm font-bold text-white">{{ $notification->title }}</h4>
                                    @if(!$notification->is_read)
                                        <span class="text-[10px] bg-emerald-500/20 text-emerald-400 px-2 py-0.5 rounded-full font-semibold border border-emerald-500/30">Baru</span>
                                    @endif
                                </div>
                                <p class="text-xs text-slate-300 leading-relaxed">{{ $notification->message }}</p>
                                <span class="text-[10px] text-slate-500 block pt-1">{{ $notification->created_at->diffForHumans() }} ({{ $notification->created_at->format('d M Y H:i') }})</span>
                            </div>

                            @if(!$notification->is_read)
                                <form action="{{ route('admin.notifications.mark-read', $notification->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-3 py-1.5 rounded-xl bg-slate-800 text-slate-300 hover:text-white hover:bg-slate-700 text-xs font-medium">
                                        Tandai Dibaca
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="p-4 border-t border-white/10">
                    {{ $notifications->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.admin>
