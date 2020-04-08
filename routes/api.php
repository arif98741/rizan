<?php


Route::namespace('API')->group(function () {

    /*
    Route::get('/', function () {
        $object = [
            'api' => 'api list',
            'restaurant' => [
                'controller' => 'RestaurantController',
                'route' => [
                    [
                        'url' => 'check_email',
                        'method' => 'checkEmail',
                        'code' => [200, 405]
                    ],
                    [
                        'url' => 'check_contact',
                        'method' => 'checkContact',
                        'code' => [200, 405]
                    ]
                ]
            ]
        ];
        echo json_encode($object);
    });
    */


    /**
     * Restaurant Related API
     * @Controller RestaurantController
     */
    Route::prefix('restaurant')->group(function () {
        Route::post('/check_email', 'RestaurantController@checkEmail');
        Route::post('/check_contact', 'RestaurantController@checkContact');
    });

});
