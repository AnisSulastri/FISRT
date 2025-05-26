<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::create([
            'image' => 'nasi_goreng.jpg',
            'title' => 'Nasi Goreng Spesial',
            'description' => 'Nasi goreng dengan topping ayam, telur, dan kerupuk.',
            'price' => 25000,
            'stock' => 20,
            'category' => 'Makanan',
        ]);

        // Tambahkan data lain kalau perlu
    }
}
