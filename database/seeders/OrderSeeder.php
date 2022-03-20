<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Product::all() as $product) {
            Order::create(['reg' => (string)rand(1, 100000), 'product_id' => $product->id, 'total' => $product->price, 'subtotal' => $product->price, 'user_id' => 1]);
        }
    }
}
