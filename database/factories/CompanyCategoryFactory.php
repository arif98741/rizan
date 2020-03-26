<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CompanyCategory;
use Faker\Generator as Faker;

$factory->define(CompanyCategory::class, function (Faker $faker) {
    return [
        'category_name' => ucfirst($faker->text(20)),
        'status' => $faker->randomElement([0,1])
    ];
});
