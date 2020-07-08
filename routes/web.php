<?php

use Illuminate\Support\Facades\Route;

//TODO:: redirect to admin login
Route::get('/admin', function () {
    return redirect('admin/login');
});


//TODO:: redirect to restaurant login
Route::get('/restaurant', function () {
    return redirect('restaurant/login');
});
/**
 * restaurant routes
 */
Route::group(['prefix' => 'restaurant'], function () {
    Route::get('/login', 'Restaurant\Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Restaurant\Auth\LoginController@login');
    Route::post('/logout', 'Restaurant\Auth\LoginController@logout')->name('logout');

    Route::get('/register', 'Restaurant\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Restaurant\Auth\RegisterController@register');

    Route::post('/password/email', 'Restaurant\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password . request');
    Route::post('/password/reset', 'Restaurant\Auth\ResetPasswordController@reset')->name('password . email');
    Route::get('/password/reset', 'Restaurant\Auth\ForgotPasswordController@showLinkRequestForm')->name('password . reset');
    Route::get('/password/reset/{token}', 'Restaurant\Auth\ResetPasswordController@showResetForm');
});

/**
 * admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Admin\Auth\LoginController@login');
    Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('logout');

    Route::get('/register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Admin\Auth\RegisterController@register');

    Route::post('/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password . request');
    Route::post('/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('password . email');
    Route::get('/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password . reset');
    Route::get('/password/reset /{
        token}', 'Admin\Auth\ResetPasswordController@showResetForm');
});


//Front Routes
Route::namespace('Front')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/restaurants', 'RestaurantController@index');
    Route::get('/restaurant/view/{slug}', 'RestaurantController@viewBySlug');
    Route::get('/places/', 'PlaceController@index');
    Route::get('/place/{slug}', 'PlaceController@viewBySlug');
    Route::get('/foods', 'FoodController@index');
    Route::get('/food/{restaurant}/{slug}', 'FoodController@viewBySlug');
    Route::get('/page/{slug}', 'PageController@viewBySlug');
    Route::get('/team-members', 'PageController@teamMembers');
    Route::get('/offers', 'OfferController@index');


});





