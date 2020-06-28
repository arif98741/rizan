<?php

Route::namespace('Admin')->group(function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::resource('restaurant', 'RestaurantController')->except('show');
    Route::get('restaurant/feature', 'RestaurantController@feature')->name('feature');
    Route::get('restaurant/feature/add', 'RestaurantController@featureAdd');
    Route::resource('restaurant_category', 'RestaurantCategoryController')->except('show');
    Route::resource('food', 'FoodController')->except('show');
    Route::resource('place', 'PlaceController')->except('show');
    Route::resource('page', 'PageController')->except('show');
    Route::resource('team_member', 'TeamMemberController')->except('show');
    Route::get('setting', 'AdminController@setting')->name('setting');

});
