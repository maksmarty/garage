<?php 
/*
 * Route Module : Login
 * Descripttion : Route configuation for login module.
 */

    ####### Module Level Rounting ########
Route::api ( ['version' => 'v1' , 'prefix' => 'api' , 'protected' => false ] , function() //'before' => 'checktoken' ,
{


    Route::resource('foresale', '\App\Modules\Forsale\Controllers\ForsaleController', array('only' => array('index', 'store', /*'show', 'update', 'destroy'*/)));


});