<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(PriceTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(BannerimageSeeder::class);
        $this->call(QuoteSeeder::class);
        $this->call(SitesettingSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
    }
}
