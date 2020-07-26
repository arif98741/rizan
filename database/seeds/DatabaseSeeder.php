<?php

use App\Models\Admin;
use App\Models\Food;
use App\Models\Place;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(Admin::class, 1)->create();

        /**
         * Restaurant Categories
         */
        DB::table('restaurant_categories')->insert([
            ['category_name' => 'Buffet'],
            ['category_name' => 'Casual dining'],
            ['category_name' => 'Chinese Restaurant'],
            ['category_name' => 'Fast food.'],
            ['category_name' => 'Fine dining'],
            ['category_name' => 'Indian Restaurant'],
        ]);

        /**
         * Restaurant
         */
        DB::table('restaurants')->insert([
            [
                'name' => 'Sonargaon Restaurant',
                'location' => 'Dhaka',
                'restaurant_category_id' => 1,
                'slug' => \Illuminate\Support\Str::slug('Sonargaon Restaurant'),
                'email' => 'user1@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123'),
                'contact' => '09-867-78575',
                'feature_photo' => 'lsd.jpg',
                'cover_photo' => 'abc.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Sanja Restaurant',
                'location' => 'Dhaka',
                'restaurant_category_id' => 2,
                'slug' => \Illuminate\Support\Str::slug('Sanja Restaurant'),
                'email' => 'user2@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123'),
                'contact' => '09-867-58',
                'feature_photo' => 'lsd.jpg',
                'cover_photo' => 'abc.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Creme de la Creme Coffee',
                'location' => 'South City Dhaka',
                'restaurant_category_id' => 3,
                'slug' => \Illuminate\Support\Str::slug('Abc Restaurant'),
                'email' => 'user3@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123'),
                'contact' => '09-867-58',
                'feature_photo' => 'lsd.jpg',
                'cover_photo' => 'abc.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],


        ]);

        factory(Food::class, 3)->create();
        factory(Place::class, 3)->create();

        /**
         * Page Insertion
         */
        DB::table('pages')->insert([
            [
                'page_title' => 'About Us',
                'slug' => 'about-us',
                'description' => 'test',
                'object_description' => 'test'
            ],
            [
                'page_title' => 'Terms and Conditions',
                'slug' => 'terms-and-conditions',
                'description' => 'test',
                'object_description' => 'test'
            ]
        ]);

        //Settings Table
        DB::table('settings')->insert([
            [
                'contact' => '017XXXXXX',
                'email' => 'admin@gmail.com',
                'slogan' => 'test',
                'address' => 'Dhaka, bangladesh',
                'facebook' => 'test',
                'twitter' => 'twitter.com/',
                'pinterest' => 'test',
                'instagram' => 'instagram.com/food',
                'analytics' => 'a-7a97987test',
            ]

        ]);

    }
}
