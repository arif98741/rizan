<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->text(10)),
        'price' => $faker->numberBetween(100, 299),
        'slug' => \Illuminate\Support\Str::slug($faker->text(80)),
        'restaurant_id' => \App\Models\Restaurant::all()->random(),
        'description' => $faker->text(100),
        'feature_photo' => $faker->text(50).$faker->randomElement(['.jpg','.png','.jpeg','.gif'])
    ];
});
