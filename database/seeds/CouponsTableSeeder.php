<?php

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $coupons = [
            [
                'code' => '2k-1234567890',
                'type' => 'percentage',
                'value' => 20,
                'status' => 'unused'
            ],
            [
                'code' => '2k-abcdefghij',
                'type' => 'value',
                'value' => 100,
                'status' => 'unused'
            ],
        ];

        foreach($coupons as $coupon) {
            DB::table('coupons')->insert($coupon);
        }
    }
}
