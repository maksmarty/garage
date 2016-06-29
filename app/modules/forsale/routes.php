<?php 
/*
 * Route Module : Login
 * Descripttion : Route configuation for login module.
 */

    ####### Module Level Rounting ########
Route::api ( ['version' => 'v1' , 'prefix' => 'api' , 'protected' => false ] , function() //'before' => 'checktoken' ,
{

    Route::resource('foresale', '\App\Modules\Forsale\Controllers\ForsaleController', array('only' => array('index', 'store', /*'show', 'update', 'destroy'*/)));
    Route::post('foresale/delete' , array('uses' => '\App\Modules\Forsale\Controllers\ForsaleController@destroy'));
    Route::post('foresale/update' , array('uses' => '\App\Modules\Forsale\Controllers\ForsaleController@update'));


    Route::post('register' , array('uses' => '\App\Modules\Forsale\Controllers\ForsaleController@register'));

    Route::get('register/verify/{confirmationCode}' , array('uses' => '\App\Modules\Forsale\Controllers\ForsaleController@verify'));

    Route::post('login' , array('uses' => '\App\Modules\Forsale\Controllers\ForsaleController@login'));


});