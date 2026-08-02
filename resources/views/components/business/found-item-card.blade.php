@props(['item'])

<div class="glass-card rounded-[24px] overflow-hidden flex flex-col group transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-500/10 border border-white/10 bg-slate-900/40 backdrop-blur-xl">
    <!-- Image Header -->
    <div class="relative h-48 bg-slate-950/60 overflow-hidden">
        @if ($item->photo)
            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->item_name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        @else
            <div class="w-full h-full flex flex-col items-center justify-center text-slate-500">
                <svg class="w-12 h-12 mb-1 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                <span class="text-xs font-medium">Tanpa Foto</span>
            </div>
        @endif

        <div class="absolute top-3 left-3">
            <x-business.status-badge :status="$item->status" />
        </div>

        <div class="absolute top-3 right-3 bg-slate-900/80 backdrop-blur-md text-cyan-400 text-xs font-semibold px-3 py-1 rounded-full border border-cyan-500/30">
            {{ $item->category->name }}
        </div>
    </div>

    <!-- Content Body -->
    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
        <div>
            <h3 class="text-base font-bold text-white line-clamp-1 group-hover:text-cyan-400 transition-colors">
                {{ $item->item_name }}
            </h3>
            <p class="text-xs text-slate-300 line-clamp-2 mt-1 leading-relaxed">
                {{ $item->description ?: 'Tidak ada deskripsi rinci.' }}
            </p>
        </div>

        <div class="pt-3 border-t border-white/10 space-y-1.5 text-xs text-slate-400">
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-1.5 text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                <span class="truncate">{{ $item->location->name }}</span>
            </div>
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-1.5 text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span>Ditemukan: {{ \Carbon\Carbon::parse($item->found_date)->translatedFormat('d M Y') }}</span>
            </div>
            @if($item->storage_location)
                <div class="flex items-center text-slate-400">
                    <svg class="w-4 h-4 mr-1.5 text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span class="truncate">Simpan di: {{ $item->storage_location }}</span>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-2 gap-2">
            <a href="{{ route('found-items.show', $item->id) }}" class="text-center py-2.5 px-3 rounded-[16px] bg-slate-800/80 border border-white/10 text-white font-medium text-xs hover:bg-slate-700 transition-all block">
                Detail
            </a>
            @if($item->status === 'Menunggu Pemilik')
                <a href="{{ route('claims.create', $item->id) }}" class="text-center py-2.5 px-3 rounded-[16px] bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 font-semibold text-xs hover:brightness-110 shadow-lg shadow-emerald-500/20 transition-all block">
                    Klaim
                </a>
            @else
                <span class="text-center py-2.5 px-3 rounded-[16px] bg-slate-800/40 text-slate-500 font-medium text-xs border border-white/5 block cursor-not-allowed">
                    Sudah Diklaim
                </span>
            @endif
        </div>
    </div>
</div>
