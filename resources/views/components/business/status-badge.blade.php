@props(['status'])

@php
    $badgeClasses = match($status) {
        'lost' => 'bg-red-50 text-red-700 border-red-200',
        'found' => 'bg-blue-50 text-blue-700 border-blue-200',
        'pending' => 'bg-amber-50 text-amber-700 border-amber-200',
        'claimed' => 'bg-amber-50 text-amber-700 border-amber-200',
        'approved' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
        'returned' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
        'rejected' => 'bg-rose-50 text-rose-700 border-rose-200',
        default => 'bg-zinc-100 text-zinc-700 border-zinc-200'
    };

    $label = match($status) {
        'lost' => 'Hilang',
        'found' => 'Ditemukan',
        'pending' => 'Menunggu Verifikasi',
        'claimed' => 'Diklaim',
        'approved' => 'Klaim Disetujui',
        'returned' => 'Dikembalikan',
        'rejected' => 'Klaim Ditolak',
        default => ucfirst($status)
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold border {$badgeClasses}"]) }}>
    <span class="w-1.5 h-1.5 rounded-full mr-1.5 bg-current opacity-75"></span>
    {{ $label }}
</span>
