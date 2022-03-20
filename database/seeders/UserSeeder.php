<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name'=>'User 1','email'=>'user1@u.com','password'=>bcrypt('123456')]);
        User::create(['name'=>'User 2','email'=>'user2@u.com','password'=>bcrypt('123456')]);
    }
}
