<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Elektronik',
            'Dompet',
            'Tas',
            'Alat Tulis',
            'Botol Minum',
            'Aksesoris',
            'Pakaian',
            'Lainnya',
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category]);
        }
    }
}
