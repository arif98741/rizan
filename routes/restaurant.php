<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('restaurant')->user();

    //dd($users);

    return view('restaurant.home');
})->name('home');

