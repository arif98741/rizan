<?php

use App\Models\Admin;
use Faker\Generator as Faker;

//username = admin@gmail.com
//password = admin


$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => 'Ariful Islam',
        'email' => 'admin@gmail.com',
        'password' => \Illuminate\Support\Facades\Hash::make('admin'), // admin
        'remember_token' => Str::random(10),
    ];
});
