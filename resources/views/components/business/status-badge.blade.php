@props(['status'])

@php
    $badgeClasses = match($status) {
        'Belum Ditemukan', 'lost' => 'bg-amber-500/15 text-amber-300 border-amber-500/30',
        'Menunggu Pemilik', 'found' => 'bg-cyan-500/15 text-cyan-300 border-cyan-500/30',
        'Ditemukan', 'Diklaim', 'claimed' => 'bg-sky-500/15 text-sky-300 border-sky-500/30',
        'Selesai', 'Dikembalikan', 'Disetujui', 'approved', 'returned' => 'bg-emerald-500/15 text-emerald-300 border-emerald-500/30',
        'Pending', 'pending' => 'bg-amber-500/15 text-amber-300 border-amber-500/30',
        'Ditolak', 'rejected' => 'bg-rose-500/15 text-rose-300 border-rose-500/30',
        default => 'bg-slate-500/15 text-slate-300 border-slate-500/30'
    };

    $label = match($status) {
        'lost' => 'Belum Ditemukan',
        'found' => 'Menunggu Pemilik',
        'pending' => 'Pending',
        'claimed' => 'Diklaim',
        'approved' => 'Disetujui',
        'returned' => 'Dikembalikan',
        'rejected' => 'Ditolak',
        default => $status
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center px-3 py-1 rounded-full text-xs font-medium border backdrop-blur-md {$badgeClasses}"]) }}>
    <span class="w-1.5 h-1.5 rounded-full mr-1.5 bg-current animate-pulse"></span>
    {{ $label }}
</span>
