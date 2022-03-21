<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['name' => 'God of War', 'type' => 'game', 'describe' => 'aaaa', 'price' => 100]);
        Product::create(['name' => 'Minecraft', 'type' => 'game', 'describe' => 'bbbbb', 'price' => 50]);
    }
}
