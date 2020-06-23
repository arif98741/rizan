<?php

use App\Models\Admin;
use App\Models\Food;
use App\Models\Place;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(Admin::class, 1)->create();
        factory(RestaurantCategory::class, 3)->create();
        factory(Restaurant::class, 5)->create();
        factory(Food::class, 3)->create();
        factory(Place::class, 3)->create();

        DB::table('pages')->insert([
            ['page_title' => 'About Us', 'slug' => 'about-us', 'description' => 'test', 'object_description' => 'test'],
            ['page_title' => 'Terms and Conditions', 'slug' => 'terms-and-conditions', 'description' => 'test']
        ]);
    }
}
