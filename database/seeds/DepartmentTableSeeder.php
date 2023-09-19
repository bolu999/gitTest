<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $departments = [
            [
                'name' => '2k Supermart',      //1
                'description' => 'At the 2k Supermart customers have a delightful guarantee that everything is N2,000 and below. Our customers are constantly wowed by the prices and we ensure that they always leave smiling. We like to call this the “2k effect”. We are proud to say that our prices are cheerful and our products are GREAT! You can get Beverages, Cereals, Biscuits, Household Provisions, Cooking Oils, Canned Foods, Health and Beauty Products, Air Freshners, Cleaning Materials, Toys, Footwear, Clothing for Kids and Adults, Kitchen and Bathroom Products, Party Disposable Goods and Party Supplies – all at N2,000 and below. We always put smiles on our customers’ faces because the value we provide on our products surpasses our price tags.',     
                'image' => 'images/custom/supermart.jpg',     
            ],
            [
                'name' => 'Luggage Masters',      //2
                'description' => 'The Luggage Masters offer an assortment of Travel Bags, Laptop Bags, Belts and Leather Accessories. The travelling luggages can come in different sets and sizes. There are luggage tags. There are incredible selections of luggages and suitcases that are designed as either soft or hard styles. Prices are affordable and can match any prices in the open market. Come and experience the luggage master hospitality and offerings. 10% discount on suitcases are ongoing!!!',     
                'image' => 'images/custom/luggage.jpg',     
            ],
            [
                'name' => 'Orange Discount Corner',      //3
                'description' => 'The Orange Discount Corner is a “Gifts and More” corner in the 2k Supermart Plaza. At the Orange Discount Corner, products that are over N2,000 are displayed and sold to meet the needs of discerning customers looking to stretch the Naira beyond N2,000 but with a guarantee that the pricing is fully discounted.',     
                'image' => 'images/custom/orange.jpg',     
            ],
            [
                'name' => 'Ice Cream',      //4
                'description' => 'We stock both soft and hard ice cream for the whole family’s delight. Our customers trust and love 2k Ice cream for its creamy and exciting toppings and mixes. At the ice cream corner shop, you can also get fresh instantly made popcorn.',     
                'image' => 'images/custom/icecream.jpg',     
            ],
            [
                'name' => 'Shawarma and Part Jollof',      //5
                'description' => '2k offers the best party jollof Rice in the FCT. Come and savour our delicious party jollof rice – real licking good. Our tasty chicken shawarma comes as either a sausage/chicken combo or chicken only wrap. The only regret is that you will ask for another wrap of our shawarma after the first one. It’s seriously that good!!!',     
                'image' => 'images/custom/shawarma.jpg',     
            ],
            [
                'name' => 'Pharmacy',      //6
                'description' => 'Our pharmacy stocks the best authentic drugs, medications, health and wellness products. You can refill your prescriptions at our pharmacy where experienced pharmacists will manage your health information. We are a trusted name in pharmaceutical and chemical pharmacy delivery within our locality and beyond. We Source Right!',     
                'image' => 'images/custom/pharmacy.jpg',     
            ],
            [
                'name' => 'Drinks and Beverages',      //7
                'description' => 'des',     
                'image' => 'image',     
            ],
            [
                'name' => 'Phones',      //8
                'description' => 'des',     
                'image' => 'image',     
            ],
            
        ];
        foreach($departments as $department) {
            DB::table('departments')->insert($department);
        }
    }
}
