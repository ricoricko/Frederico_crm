<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Home Basic 30 Mbps',
            'description' => 'Internet untuk rumah dengan kecepatan up to 30 Mbps',
            'price' => 250000,
        ]);
        Product::create([
            'name' => 'Home Pro 100 Mbps',
            'description' => 'Internet untuk rumah dengan kebutuhan tinggi, kecepatan up to 100 Mbps',
            'price' => 450000,
        ]);
    }
}