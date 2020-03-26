<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->text(50)),
        'price'=> $faker->numberBetween(100,299),
        'company_id' => \App\Models\Restaurant::all()->random(),
        'description' => $faker->text(100)
    ];
});
