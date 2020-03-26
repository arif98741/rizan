<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->text(50)),
        'price'=> $faker->numberBetween(100,299),
        'company_id' => \App\Models\Company::all()->random(),
        'description' => $faker->text(100)
    ];
});


/**
 *
 * $table->string('name');
$table->double('price',8,2);
$table->unsignedBigInteger('company_id');

 */
