<?php

/** @var Factory $factory */

use App\Models\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;



$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'slug' => Str::slug($faker->text(30),'-'),
        'location' => $faker->city,
        'restaurant_category_id' => \App\Models\RestaurantCategory::all()->random(),
        'email'=> $faker->unique()->safeEmail,
        'password' => \Illuminate\Support\Facades\Hash::make('123'),
        'feature_photo' => $faker->text(50).$faker->randomElement(['.jpg','.jpeg']),
        'cover_photo' => $faker->text(50).$faker->randomElement(['.jpg','.jpeg']),
    ];
});
