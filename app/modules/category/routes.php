<?php 
/*
 * Route Module : Login
 * Descripttion : Route configuation for login module.
 */

    ####### Module Level Rounting ########
Route::group(array( 'before' => 'auth'), function() {


    # GET : LOGIN PAGE
    Route::get('category', array('as' => 'category','uses' => '\App\Modules\Category\Controllers\CategoryController@index'));


    # GET : LOGIN PAGE
    Route::post('category/build', array('as' => 'category.list','uses' => '\App\Modules\Category\Controllers\CategoryController@postBuild'));

    # GET : LOGIN PAGE
    Route::get('category/add', array('as' => 'category.add','uses' => '\App\Modules\Category\Controllers\CategoryController@showAdd'));

    # GET : LOGIN PAGE
    Route::post('category/add', array('as' => 'category.post.add','uses' => '\App\Modules\Category\Controllers\CategoryController@postAdd'));


    # GET : LOGIN PAGE
    Route::get('category/{id}/edit', array('as' => 'category.update','uses' => '\App\Modules\Category\Controllers\CategoryController@update'));

    # GET : LOGIN PAGE
    Route::post('category/{id}/edit', array('as' => 'category.post.update','uses' => '\App\Modules\Category\Controllers\CategoryController@postUpdate'));

    Route::get('category/parentupdate', array('as' => 'category.parent.update','uses' => '\App\Modules\Category\Controllers\CategoryController@setParentToCategory'));


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