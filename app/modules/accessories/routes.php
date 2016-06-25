<?php 
/*
 * Route Module : Login
 * Descripttion : Route configuation for login module.
 */

    ####### Module Level Rounting ########
Route::api ( ['version' => 'v1' , 'prefix' => 'api' , 'protected' => false ] , function() //'before' => 'checktoken' ,
{
    Route::resource('accessories', '\App\Modules\Accessories\Controllers\AccessoriesController', array('only' => array('index', 'store', /*'show', 'update', 'destroy'*/)));

    Route::post('accessories/delete' , array('uses' => '\App\Modules\Accessories\Controllers\AccessoriesController@destroy'));

    Route::post('accessories/update' , array('uses' => '\App\Modules\Accessories\Controllers\AccessoriesController@update'));
});