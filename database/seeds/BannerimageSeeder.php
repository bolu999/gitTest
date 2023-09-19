<?php

use Illuminate\Database\Seeder;

class BannerimageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bannerDetails = [
            [
                'title' => '2K SUPERMART',
                'content_1'=> 'Everything',
                'content_2' => '₦2K and below',
                'image' => 'images/slides/08/slide-0.jpg',
            ],

            [
                'title' => 'GREAT OFFERS',
                'content_1'=> 'Starting at',
                'content_2' => '₦2K and below',
                'image' => 'images/slides/08/slide-02.jpg',
            ],
        ];

        foreach($bannerDetails as $bannerDetail) {
            DB::table('bannerimages')->insert($bannerDetail);
        }
    }
}
