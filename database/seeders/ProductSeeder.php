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
        Product::create(['name' => 'God of War', 'type' => 'game', 'describe' => 'God of War é uma série de jogos eletrônicos de ação-aventura criada por David Jaffe da Santa Monica Studio', 'price' => 100, 'image' => 'storage/images/products/god-of-war.png']);
        Product::create(['name' => 'Minecraft', 'type' => 'game', 'describe' => 'Minecraft é um jogo eletrônico escrito em Java originalmente criado por Markus Persson. É mantido pela Mojang Studios', 'price' => 50, 'image' => 'storage/images/products/minecraft.png']);
        Product::create(['name' => 'Player Unknows Battlegrounds', 'type' => 'game', 'describe' => "PlayerUnknown's Battlegrounds (PUBG) é um jogo eletrônico multiplayer desenvolvido pela PUBG Corporation (atual PUBG Studios)", 'price' => 50, 'image' => 'storage/images/products/pubg.png']);
        Product::create(['name' => 'Mass Effect', 'type' => 'game', 'describe' => 'Mass Effect é uma série de jogos eletrônicos de RPG e ficção científica desenvolvida pela BioWare', 'price' => 50, 'image' => 'storage/images/products/mass-effect.png']);
    }
}
