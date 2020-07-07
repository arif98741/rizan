<?php


Route::namespace('API')->group(function () {

    /**
     * Restaurant Related API
     * @Controller RestaurantController
     */
    Route::prefix('restaurant')->group(function () {
        Route::post('/check_email', 'RestaurantController@checkEmail');
        Route::post('/check_contact', 'RestaurantController@checkContact');
        Route::post('/single_food', 'RestaurantController@singleFood');
    });

});
