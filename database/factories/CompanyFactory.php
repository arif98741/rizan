<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'location' => $faker->address,
        'company_category_id' => \App\Models\CompanyCategory::all()->random(),
        'email'=> $faker->unique()->safeEmail,
        'password' => \Illuminate\Support\Facades\Hash::make('123'),
        'feature_photo' => $faker->text(50).$faker->randomElement(['.jpg','.jpeg']),
        'cover_photo' => $faker->text(50).$faker->randomElement(['.jpg','.jpeg']),
    ];
});
/**
 *
 * $table->string('name',200);
$table->string('location');
$table->unsignedBigInteger('company_category_id')->nullable();
$table->string('email')->unique();
$table->string('password');
$table->string('feature_photo')->nullable();
$table->string('cover_photo');
$table->foreign('company_category_id')->
 */
