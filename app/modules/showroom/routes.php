<?php 
/*
 * Route Module : Login
 * Descripttion : Route configuation for login module.
 */

    ####### Module Level Rounting ########
Route::group(array( 'before' => 'auth'), function() {


    # GET : LOGIN PAGE
    Route::get('showroom/add', array('as' => 'showroom.add','uses' => '\App\Modules\Showroom\Controllers\ShowroomController@showAdd'));

    # GET : LOGIN PAGE
    Route::post('showroom/add', array('as' => 'showroom.post.add','uses' => '\App\Modules\Showroom\Controllers\ShowroomController@postAdd'));


    # GET : LOGIN PAGE
    Route::get('showroom', array('as' => 'showroom','uses' => '\App\Modules\Showroom\Controllers\ShowroomController@index'));



    # GET : LOGIN PAGE
    Route::post('showroom/build', array('as' => 'showroom.list','uses' => '\App\Modules\Showroom\Controllers\ShowroomController@postBuild'));


    # GET : LOGIN PAGE
//    Route::get('showroom/import/{category}', array('as' => 'showroom.import','uses' => '\App\Modules\Showroom\Controllers\ShowroomController@getImport'));


    # GET : LOGIN PAGE
    Route::get('showroom/{id}/edit', array('as' => 'showroom.update','uses' => '\App\Modules\Showroom\Controllers\ShowroomController@update'));

    # GET : LOGIN PAGE
    Route::post('showroom/{id}/edit', array('as' => 'showroom.post.update','uses' => '\App\Modules\Showroom\Controllers\ShowroomController@postUpdate'));



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