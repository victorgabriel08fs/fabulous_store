<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create(['code' => '10conto', 'max_usage_times' => 10, 'discount' => 10]);
        Coupon::create(['code' => '10cont', 'max_usage_times' => 10, 'discount' => 10]);
        Coupon::create(['code' => '10con', 'max_usage_times' => 10, 'discount' => 10]);
        Coupon::create(['code' => '1conto', 'max_usage_times' => 10, 'discount' => 1]);
        Coupon::create(['code' => '1cont', 'max_usage_times' => 1, 'discount' => 1]);
    }
}
