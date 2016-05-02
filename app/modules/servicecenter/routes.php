<?php 
/*
 * Route Module : Login
 * Descripttion : Route configuation for login module.
 */

    ####### Module Level Rounting ########
Route::group(array( 'before' => 'auth'), function() {


    # GET : LOGIN PAGE
    Route::get('servicecenter/add', array('as' => 'servicecenter.add','uses' => '\App\Modules\Servicecenter\Controllers\ServicecenterController@showAdd'));

    # GET : LOGIN PAGE
    Route::post('servicecenter/add', array('as' => 'servicecenter.post.add','uses' => '\App\Modules\Servicecenter\Controllers\ServicecenterController@postAdd'));


    # GET : LOGIN PAGE
    Route::get('servicecenter', array('as' => 'servicecenter','uses' => '\App\Modules\Servicecenter\Controllers\ServicecenterController@index'));



    # GET : LOGIN PAGE
    Route::post('servicecenter/build', array('as' => 'servicecenter.list','uses' => '\App\Modules\Servicecenter\Controllers\ServicecenterController@postBuild'));


    # GET : LOGIN PAGE
//    Route::get('servicecenter/import/{category}', array('as' => 'servicecenter.import','uses' => '\App\Modules\Servicecenter\Controllers\ServicecenterController@getImport'));


    # GET : LOGIN PAGE
    Route::get('servicecenter/{id}/edit', array('as' => 'servicecenter.update','uses' => '\App\Modules\Servicecenter\Controllers\ServicecenterController@update'));

    # GET : LOGIN PAGE
    Route::post('servicecenter/{id}/edit', array('as' => 'servicecenter.post.update','uses' => '\App\Modules\Servicecenter\Controllers\ServicecenterController@postUpdate'));



    # GET : LOGIN PAGE
    Route::get('servicecenter/models/{makeid}', array('as' => 'servicecenter.parentmodels','uses' => '\App\Modules\Servicecenter\Controllers\ServicecenterController@getParentModel'));


    # POST : LOGIN PAGE
//    Route::post('login', array('uses' => '\App\Modules\User\Controllers\UserController@postLogin'));
//
//    # GET : REGISTER PAGE
//    Route::get('register', array('uses' => '\App\Modules\User\Controllers\UserController@showRegister'));
//
//    # GET : REGISTER PAGE
//    Route::post('register', array('uses' => '\App\Modules\User\Controllers\UserController@doRegister'));
//
//    # GET : LOGOUT FUNCTION
//    Route::get('logout', array('uses' => '\App\Modules\User\Controllers\UserController@logout'));
//
//    # GET : Change Password
//    Route::get('change-password', array('uses' => '\App\Modules\User\Controllers\UserController@changePassword'));
//    Route::post('user-change-password', array('uses' => '\App\Modules\User\Controllers\UserController@postUserChangePassword'));
//
//    # GET : EDIT PROFILE
//    Route::get('edit-profile', array('uses' => '\App\Modules\User\Controllers\UserController@editProfile'));


});