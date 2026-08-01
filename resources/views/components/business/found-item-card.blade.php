@props(['item'])

<div class="bg-white rounded-2xl border border-[#E7E2DA] shadow-paper hover:shadow-paper-lg transition-all duration-200 overflow-hidden flex flex-col group">
    <!-- Image Header -->
    <div class="relative h-48 bg-zinc-100 overflow-hidden">
        @if ($item->image)
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->item_name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        @else
            <div class="w-full h-full flex flex-col items-center justify-center bg-zinc-100 text-zinc-400">
                <svg class="w-12 h-12 mb-1 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                <span class="text-xs font-medium">Tanpa Foto</span>
            </div>
        @endif
        <div class="absolute top-3 left-3">
            <x-business.status-badge :status="$item->status" />
        </div>
        <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm text-zinc-900 text-[11px] font-semibold px-2.5 py-1 rounded-lg border border-zinc-200">
            {{ $item->category->name }}
        </div>
    </div>

    <!-- Content Body -->
    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
        <div>
            <h3 class="text-base font-bold text-zinc-900 line-clamp-1 group-hover:text-blue-600 transition-colors">
                {{ $item->item_name }}
            </h3>
            <p class="text-xs text-zinc-600 line-clamp-2 mt-1 leading-relaxed">
                {{ $item->description ?: 'Tidak ada deskripsi rinci.' }}
            </p>
        </div>

        <div class="pt-3 border-t border-zinc-100 space-y-1.5 text-xs text-zinc-500">
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-1.5 text-zinc-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                <span class="truncate">{{ $item->location->name }}</span>
            </div>
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-1.5 text-zinc-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span>Ditemukan: {{ \Carbon\Carbon::parse($item->found_date)->translatedFormat('d M Y') }}</span>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-2">
            <a href="{{ route('found-items.show', $item->id) }}" class="w-full text-center py-2 px-3 rounded-xl bg-zinc-100 text-zinc-800 text-xs font-semibold hover:bg-zinc-200 transition-colors block">
                Detail
            </a>
            @if ($item->status === 'found')
                <a href="{{ route('claims.create', ['found_item_id' => $item->id]) }}" class="w-full text-center py-2 px-3 rounded-xl bg-blue-600 text-white text-xs font-semibold hover:bg-blue-700 transition-colors block">
                    Klaim
                </a>
            @else
                <button disabled class="w-full text-center py-2 px-3 rounded-xl bg-zinc-100 text-zinc-400 text-xs font-semibold cursor-not-allowed">
                    Selesai
                </button>
            @endif
        </div>
    </div>
</div>
