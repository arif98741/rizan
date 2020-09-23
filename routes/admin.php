<?php

Route::namespace('Admin')->group(function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');

    Route::resource('product', 'ProductController')->except('show');
    Route::resource('page', 'PageController')->except('show', 'create');
    Route::resource('team_member', 'TeamMemberController')->except('show');
    Route::resource('restaurant_review', 'RestaurantReviewController')->only('index', 'destroy');
    Route::get('restaurant_review/change-status/{id}/{status}', 'RestaurantReviewController@changeStatus');
    Route::resource('food_review', 'FoodReviewController')->only('index', 'destroy');
    Route::get('food_review/change-status/{id}/{status}', 'FoodReviewController@changeStatus');
    Route::match(['get', 'post'], 'setting', 'AdminController@setting')->name('setting');
    //XML Generate and Show table
    Route::resource('xml', 'XmlController')->except('show', 'update');
//    $allRoutes = Route::getRoutes()->get();
//    dd($allRoutes);

});
