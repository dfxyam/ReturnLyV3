<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Location;
use App\Models\LostItem;
use App\Models\FoundItem;
use App\Models\Claim;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SampleItemSeeder extends Seeder
{
    public function run(): void
    {
        $elektronik = Category::where('name', 'Elektronik')->first()?->id ?? 1;
        $tas = Category::where('name', 'Tas')->first()?->id ?? 2;
        $dompet = Category::where('name', 'Dompet')->first()?->id ?? 3;
        $aksesoris = Category::where('name', 'Aksesoris')->first()?->id ?? 5;

        $perpustakaan = Location::where('name', 'Perpustakaan')->first()?->id ?? 2;
        $kantin = Location::where('name', 'Kantin')->first()?->id ?? 6;
        $lapangan = Location::where('name', 'Lapangan')->first()?->id ?? 4;
        $lab = Location::where('name', 'Laboratorium')->first()?->id ?? 3;

        // Lost items
        $lost1 = LostItem::create([
            'category_id' => $elektronik,
            'location_id' => $lab,
            'item_name' => 'Calculator Casio FX-991EX',
            'description' => 'Warna hitam, ada stiker nama Budi kelas XII MIPA 1 di bagian belakang.',
            'lost_date' => now()->subDays(2)->format('Y-m-d'),
            'contact_name' => 'Budi Santoso',
            'contact_phone' => '081234567890',
            'status' => 'lost',
        ]);

        $lost2 = LostItem::create([
            'category_id' => $dompet,
            'location_id' => $kantin,
            'item_name' => 'Dompet Kulit Cokelat Eiger',
            'description' => 'Berisi kartu pelajar atas nama Siti Rahma dan uang saku.',
            'lost_date' => now()->subDays(1)->format('Y-m-d'),
            'contact_name' => 'Siti Rahma',
            'contact_phone' => '082198765432',
            'status' => 'lost',
        ]);

        // Found items
        $found1 = FoundItem::create([
            'category_id' => $elektronik,
            'location_id' => $lab,
            'item_name' => 'Kalkulator Casio FX Series',
            'description' => 'Ditemukan di meja lab komputer 2. Warna hitam.',
            'found_date' => now()->subDays(2)->format('Y-m-d'),
            'contact_name' => 'Pak Joko (Petugas Lab)',
            'contact_phone' => '085711223344',
            'status' => 'found',
        ]);

        $found2 = FoundItem::create([
            'category_id' => $tas,
            'location_id' => $perpustakaan,
            'item_name' => 'Tas Ransel Eiger Hitam',
            'description' => 'Ditemukan di meja baca pojok perpustakaan.',
            'found_date' => now()->subDays(3)->format('Y-m-d'),
            'contact_name' => 'Bu Ani (Pustakawan)',
            'contact_phone' => '081388776655',
            'status' => 'found',
        ]);

        // Claim
        Claim::create([
            'claim_number' => 'CLM-' . strtoupper(Str::random(6)),
            'found_item_id' => $found1->id,
            'lost_item_id' => $lost1->id,
            'claimant_name' => 'Budi Santoso',
            'claimant_phone' => '081234567890',
            'proof_description' => 'Ada stiker nama Budi kelas XII MIPA 1 di casing belakang kalkulator.',
            'status' => 'pending',
            'admin_notes' => null,
        ]);
    }
}
