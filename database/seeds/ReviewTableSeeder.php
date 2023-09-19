<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $reviews = [
            [
                'name' => 'John Adekunle',
                'message' => 'A good product.',
                'rating' => 4,
                'product_id' => 1,
            ],

            [
                'name' => 'Ugo Alex',
                'message' => 'What I expected!',
                'rating' => 3,
                'product_id' => 2,
            ],
            
            [
                'message' => 'Coooooool!',
                'rating' => 5,
                'product_id' => 2,
            ],
        ];

        foreach($reviews as $review) {
            DB::table('reviews')->insert($review);
        }
    }
}
