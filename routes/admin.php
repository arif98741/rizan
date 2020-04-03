<?php

Route::namespace('Admin')->group(function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::resource('restaurant', 'RestaurantController')->except('show');
    Route::get('setting', 'AdminController@setting')->name('setting');

});
