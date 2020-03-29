<?php

Route::namespace('Admin')->group(function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('setting', 'AdminController@setting')->name('setting');

});
