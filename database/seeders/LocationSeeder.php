<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            'Perpustakaan',
            'Kantin',
            'Lapangan',
            'Mushola',
            'Ruang BK',
            'Aula',
            'Parkiran',
            'Koridor',
        ];

        foreach ($locations as $location) {
            Location::updateOrCreate(['name' => $location]);
        }
    }
}
