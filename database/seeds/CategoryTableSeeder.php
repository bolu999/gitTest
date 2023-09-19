<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Shirt',      //1
                'description' => 'Description for this category',
                'image_path' => 'images/category/shirts.jpeg',
                'department_id' => 1,    
            ],
            [
                'name' => 'Luggage',    //2
                'description' => 'Description for this category',
                'image_path' => 'images/category/luggage.jpg',
                'department_id' => 2,    
            ],
            [
                'name' => 'Shoes',       //3
                'description' => 'Description for this category',
                'image_path' => 'images/category/null.jpg',
                'department_id' => 1,    
            ],
            [
                'name' => 'Accessories', //4
                'description' => 'Description for this category',
                'image_path' => 'images/category/null.jpg',
                'department_id' => 1,    
            ],
            [
                'name' => 'Toys',        //5
                'description' => 'Description for this category',
                'image_path' => 'images/category/toy.jpg',
                'department_id' => 1,    
            ],
            [
                'name' => 'Drinks',      //6
                'description' => 'Description for this category',
                'image_path' => 'images/category/drinks.jpg',
                'department_id' => 7,    
            ],
            [
                'name' => 'Beverage',    //7
                'description' => 'Description for this category',
                'image_path' => 'images/category/null.jpg',
                'department_id' => 7,    
            ],
            [
                'name' => 'Sport Equipments', //8
                'description' => 'Description for this category',
                'image_path' => 'images/category/null.jpg',
                'department_id' => 1,    
            ],
            [
                'name' => 'kitchen',     //9
                'description' => 'Description for this category',
                'image_path' => 'images/category/null.jpg',
                'department_id' => 1,    
            ],
            
            [
                'name' => 'Samsung',     //10
                'description' => 'Description for this category',
                'image_path' => 'images/category/phones.jpg',
                'department_id' => 8,    
            ],
            [
                'name' => 'IPhone',     //11
                'description' => 'Description for this category',
                'image_path' => 'images/category/phones.jpg',
                'department_id' => 8,    
            ],
            [
                'name' => 'Tecno',     //12
                'description' => 'Description for this category',
                'image_path' => 'images/category/phones.jpg',
                'department_id' => 8,    
            ],
           
           
        ];
        foreach($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
