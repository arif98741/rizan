<?php

use App\Models\Admin;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\Food;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(RestaurantCategory::class, 3)->create();
        factory(Restaurant::class, 5)->create();
        factory(Food::class, 10)->create();
    }
}
