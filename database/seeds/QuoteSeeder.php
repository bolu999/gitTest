<?php

use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $quotes = [
            [
                'name' => 'John Adekunle',
                'designation' => 'Student',
                'content' => 'Easy to shop on this platform, I only visit the store once in a while.',
            ],

            [
                'name' => 'Ugo Alex',
                'designation' => 'Business Man',
                'content' => 'A reliable store, I shop on this platform with assurance that i\'m getting good quality products.',
            ],
        ];

        foreach($quotes as $quote) {
            DB::table('quotes')->insert($quote);
        }
    }
}
