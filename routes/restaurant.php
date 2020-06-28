<?php

Route::namespace('Restaurant')->group(function () {
    Route::get('dashboard', 'RestaurantController@dashboard')->name('dashboard');
    Route::resource('food', 'FoodController')->except('show');
});
