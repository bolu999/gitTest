<?php

use Illuminate\Database\Seeder;

class SitesettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $settings = [
            [
                'about' => '2k supermart is a family oriented discount store that sells everything for N2,000 and below. It’s the first of its kind in Nigeria to sell Beverages, Health and Beauty Products, Cleaning Products, Toys, Stationery, Footwear and Clothing all N2,000 and below under one roof. The flagship 2k plaza is located at 69 Alex Ekwueme Way, Kado Estate, Abuja. It comprises of a Phone Shop, Shawarma & Party Jollof Rice Stand, Smoothie & Sugar Cane Juice Stand, Ice Cream Shop, Farmer’s Market, Luggage Masters Shop, Pharmacy and Orange Discount Corner.',
                'footer_about' => '2k supermart is a family oriented discount store that sells everything for N2,000 and below. It’s the first of its kind in Nigeria to sell Beverages, Health and Beauty Products, Cleaning Products, Toys, Stationery, Footwear and Clothing all N2,000 and below under one roof.',
                'title' => '2K Supermart',
                'address' => '69 Alex Ekwueme Way, Kado, Abuja',
                'email' => 'info@mydomain.com',
                'phone_number' => '(+234) 815 237 2923',
                'work_hour' => '7 Days a week from 9 am to 10 pm',
                'facebook' => 'www.facebook.com',
                'twitter' => 'www.twitter.com',
                'instagram' => 'www.instagram.com',
                'logo' => 'images/custom/logo.png',
                'news_letter_title' => 'NEWSLETTER SIGNUP',
                'news_letter_msg' => 'Sign up for our e-mail and be the first who know our special offers! Furthermore, we will give a 15% discount on the next order after you sign up.',
            ],          
        ];

        foreach($settings as $setting) {
            DB::table('sitesettings')->insert($setting);
        }
    }
}
