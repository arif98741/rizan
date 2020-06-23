<?php

Route::namespace('Restaurant')->group(function () {
    Route::get('dashboard', 'RestaurantController@dashboard')->name('dashboard');
//    Route::resource('restaurant', 'RestaurantController')->except('show');
//    Route::resource('restaurant_category', 'RestaurantCategoryController')->except('show');
//    Route::resource('food', 'FoodController')->except('show');
//    Route::resource('place', 'PlaceController')->except('show');
//    Route::resource('page', 'PageController')->except('show');
//    Route::resource('team_member', 'TeamMemberController')->except('show');
//    Route::get('setting', 'AdminController@setting')->name('setting');

});
