<?php

Route::namespace('Admin')->group(function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::resource('restaurant', 'RestaurantController')->except('show');
    Route::get('restaurant/feature', 'RestaurantController@feature')->name('feature');
    Route::get('restaurant/feature/add', 'RestaurantController@featureAdd');
    Route::post('restaurant/feature/store', 'RestaurantController@featureStore');
    Route::delete('restaurant/feature/delete/{id}', 'RestaurantController@featureDelete');
    Route::resource('restaurant_category', 'RestaurantCategoryController')->except('show');
    Route::resource('food', 'FoodController')->except('show');

    Route::get('food/feature', 'FoodController@feature')->name('feature');
    Route::get('food/feature/add', 'FoodController@featureAdd');
    Route::post('food/feature/store', 'FoodController@featureStore');
    Route::delete('food/feature/delete/{id}', 'FoodController@featureDelete');

    //offer
    Route::resource('offer', 'OfferController')->except('show','create');


    Route::resource('place', 'PlaceController')->except('show');
    Route::resource('page', 'PageController')->except('show', 'create');
    Route::resource('team_member', 'TeamMemberController')->except('show');
    Route::resource('restaurant_review', 'RestaurantReviewController')->only('index', 'destroy');
    Route::get('restaurant_review/change-status/{id}/{status}', 'RestaurantReviewController@changeStatus');
    Route::resource('food_review', 'FoodReviewController')->only('index', 'destroy');
    Route::get('food_review/change-status/{id}/{status}', 'FoodReviewController@changeStatus');
    Route::match(['get', 'post'], 'setting', 'AdminController@setting')->name('setting');
    //XML Generate and Show table
    Route::resource('xml', 'XmlController')->except('show', 'update');

    //allroutes code;
    //$allRoutes = Route::getRoutes()->get();

});
