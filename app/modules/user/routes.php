<?php 
/*
 * Route Module : Login
 * Descripttion : Route configuation for login module.
 */

    ####### Module Level Rounting ########
  
    # GET : LOGIN PAGE
    Route::get('login', array('as'=>'home','uses' => '\App\Modules\User\Controllers\UserController@showLogin'));

    # POST : LOGIN PAGE
    Route::post('login', array('uses' => '\App\Modules\User\Controllers\UserController@postLogin'));
    
    # GET : REGISTER PAGE
    Route::get('register', array('uses' => '\App\Modules\User\Controllers\UserController@showRegister'));

    # GET : REGISTER PAGE
    Route::post('register', array('uses' => '\App\Modules\User\Controllers\UserController@doRegister'));
    
    # GET : LOGOUT FUNCTION
    Route::get('logout', array('uses' => '\App\Modules\User\Controllers\UserController@logout'));
    
    # GET : Change Password
    Route::get('change-password', array('uses' => '\App\Modules\User\Controllers\UserController@changePassword'));
    Route::post('user-change-password', array('uses' => '\App\Modules\User\Controllers\UserController@postUserChangePassword'));
    
    # GET : EDIT PROFILE
    Route::get('edit-profile', array('uses' => '\App\Modules\User\Controllers\UserController@editProfile'));
    


