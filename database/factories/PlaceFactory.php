<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Place;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Place::class, function (Faker $faker) {
    return [
        'place_name' => $faker->country,
        'location' => $faker->city,
        'slug' => Str::slug($faker->text(20)),
        'initial_details' => $faker->text(100),
        'tourist_attractions' => $faker->text(100),
        'how_to_go' => $faker->text(100),
        'feature_photo' => $faker->text(100),
        'full_photo' => $faker->text(100),
    ];
});

/**
 * $table->string('place_name');
 * $table->string('location');
 * $table->string('slug', 100);
 * $table->text('initial_details');
 * $table->text('tourist_attractions');
 * $table->text('how_to_go');
 * $table->string('feature_photo')->nullable();
 * $table->string('full_photo')->nullable();
 */
