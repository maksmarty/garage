<?php 
/*
 * Route Module : Login
 * Descripttion : Route configuation for login module.
 */

    ####### Module Level Rounting ########
Route::api ( ['version' => 'v1' , 'prefix' => 'api' , 'protected' => false ] , function() //'before' => 'checktoken' ,
{
    Route::resource('marine', '\App\Modules\Marine\Controllers\MarineController', array('only' => array('index', 'store', /*'show', 'update', 'destroy'*/)));

    Route::post('marine/delete' , array('uses' => '\App\Modules\Marine\Controllers\MarineController@destroy'));

    Route::post('marine/update' , array('uses' => '\App\Modules\Marine\Controllers\MarineController@update'));

});