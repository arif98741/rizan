<?php

use App\Models\Admin;
use App\Models\Food;
use App\Models\Place;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(Admin::class, 1)->create();
        factory(RestaurantCategory::class, 3)->create();
        factory(Restaurant::class, 5)->create();
        factory(Food::class, 3)->create();
        factory(Place::class, 3)->create();
    }
}
