<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Location;
use App\Models\LostItem;
use App\Models\FoundItem;
use App\Models\Claim;
use App\Models\Notification;
use App\Models\ActivityLog;
use Illuminate\Database\Seeder;

class SampleItemSeeder extends Seeder
{
    public function run(): void
    {
        $elektronik = Category::where('name', 'Elektronik')->first()?->id ?? 1;
        $tas = Category::where('name', 'Tas')->first()?->id ?? 3;
        $dompet = Category::where('name', 'Dompet')->first()?->id ?? 2;
        $botol = Category::where('name', 'Botol Minum')->first()?->id ?? 5;

        $perpustakaan = Location::where('name', 'Perpustakaan')->first()?->id ?? 1;
        $kantin = Location::where('name', 'Kantin')->first()?->id ?? 2;
        $lapangan = Location::where('name', 'Lapangan')->first()?->id ?? 3;
        $ruangBk = Location::where('name', 'Ruang BK')->first()?->id ?? 5;

        // Lost items
        $lost1 = LostItem::create([
            'category_id' => $elektronik,
            'location_id' => $perpustakaan,
            'reporter_name' => 'Ahmad',
            'class_name' => 'XI RPL 1',
            'phone_number' => '081234567890',
            'item_name' => 'Kalkulator Casio FX-991EX',
            'description' => 'Warna hitam, ada stiker nama Ahmad di bagian belakang.',
            'lost_date' => now()->subDays(2)->format('Y-m-d'),
            'status' => 'Belum Ditemukan',
        ]);

        $lost2 = LostItem::create([
            'category_id' => $dompet,
            'location_id' => $kantin,
            'reporter_name' => 'Siti Rahma',
            'class_name' => 'XII MIPA 2',
            'phone_number' => '082198765432',
            'item_name' => 'Dompet Kulit Cokelat',
            'description' => 'Berisi kartu pelajar atas nama Siti Rahma.',
            'lost_date' => now()->subDays(1)->format('Y-m-d'),
            'status' => 'Belum Ditemukan',
        ]);

        // Found items
        $found1 = FoundItem::create([
            'category_id' => $botol,
            'location_id' => $perpustakaan,
            'finder_name' => 'Budi',
            'class_name' => 'XI TKJ 2',
            'phone_number' => '081298765432',
            'item_name' => 'Botol Minum Thermos Hitam',
            'description' => 'Botol minuman stainless steel warna hitam ada stiker anime.',
            'found_date' => now()->subDays(2)->format('Y-m-d'),
            'storage_location' => 'Ruang BK',
            'status' => 'Menunggu Pemilik',
        ]);

        $found2 = FoundItem::create([
            'category_id' => $tas,
            'location_id' => $lapangan,
            'finder_name' => 'Pak Joko',
            'class_name' => null,
            'phone_number' => '081388776655',
            'item_name' => 'Tas Ransel Eiger Hitam',
            'description' => 'Ditemukan di bangku pinggir lapangan basket.',
            'found_date' => now()->subDays(3)->format('Y-m-d'),
            'storage_location' => 'Ruang Guru',
            'status' => 'Menunggu Pemilik',
        ]);

        // Claim
        $claim1 = Claim::create([
            'found_item_id' => $found1->id,
            'claimer_name' => 'Hisyam',
            'class_name' => 'XI RPL 1',
            'phone_number' => '081234567890',
            'reason' => 'Botol berwarna hitam dengan stiker Naruto di bagian bawah dan sedikit goresan di tutupnya.',
            'status' => 'Pending',
        ]);

        // Sample notifications
        Notification::create([
            'title' => 'Laporan Kehilangan Baru',
            'message' => 'Ahmad (XI RPL 1) melaporkan kehilangan Kalkulator Casio FX-991EX di Perpustakaan.',
            'is_read' => false,
        ]);

        Notification::create([
            'title' => 'Klaim Baru Perlu Verifikasi',
            'message' => 'Hisyam mengajukan klaim untuk Botol Minum Thermos Hitam.',
            'is_read' => false,
        ]);

        // Sample activity log
        ActivityLog::create([
            'activity' => 'Sistem Diinisialisasi',
            'description' => 'Database awal ReturnLy berhasil di-seed.',
        ]);
    }
}
