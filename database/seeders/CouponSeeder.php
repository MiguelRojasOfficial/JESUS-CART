<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::create([
            'code' => 'DESCUENTO',
            'type' => 'percent',
            'value' => 10,
            'expires_at' => now()->addDays(20),
        ]);

        Coupon::create([
            'code' => 'ENVIOGRATIS',
            'type' => 'fixed',
            'value' => 15,
            'expires_at' => now()->addDays(15),
        ]);
    }
}
