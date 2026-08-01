<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            'Ruang Kelas',
            'Perpustakaan',
            'Laboratorium',
            'Lapangan',
            'Masjid',
            'Kantin',
            'Parkiran',
            'Aula',
            'Koridor',
            'Lainnya',
        ];

        foreach ($locations as $location) {
            Location::updateOrCreate(['name' => $location]);
        }
    }
}
