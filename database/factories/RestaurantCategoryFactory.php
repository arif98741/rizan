<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RestaurantCategory;
use Faker\Generator as Faker;

$factory->define(RestaurantCategory::class, function (Faker $faker) {
    return [
        'category_name' => ucfirst($faker->text(20)),
        'status' => $faker->randomElement([0,1])
    ];
});
