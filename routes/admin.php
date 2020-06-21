<?php

Route::namespace('Admin')->group(function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::resource('restaurant', 'RestaurantController')->except('show');
    Route::resource('restaurant_category', 'RestaurantCategoryController')->except('show');
    Route::resource('food', 'FoodController')->except('show');
    Route::resource('place', 'PlaceController')->except('show');
    Route::get('setting', 'AdminController@setting')->name('setting');

});
