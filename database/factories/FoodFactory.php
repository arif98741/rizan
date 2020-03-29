<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->text(50)),
        'price' => $faker->numberBetween(100, 299),
        'restaurant_id' => \App\Models\Restaurant::all()->random(),
        'description' => $faker->text(100),
        'feature_photo' => $faker->text(50).$faker->randomElement(['.jpg','.png','.jpeg','.gif'])
    ];
});

/**
 *
 * $table->bigIncrements('id');
 * $table->string('name');
 * $table->double('price',8,2);
 * $table->unsignedBigInteger('restaurant_id');
 * $table->text('description');
 * $table->text('feature_photo')->nullable();
 */
