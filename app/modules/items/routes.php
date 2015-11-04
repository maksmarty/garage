<?php 
/*
 * Route Module : Login
 * Descripttion : Route configuation for login module.
 */

    ####### Module Level Rounting ########
Route::group(array( 'before' => 'auth'), function() {


    # GET : LOGIN PAGE
    Route::get('item/add', array('as' => 'item.add','uses' => '\App\Modules\Items\Controllers\ItemsController@showAdd'));

    # GET : LOGIN PAGE
    Route::post('item/add', array('as' => 'item.post.add','uses' => '\App\Modules\Items\Controllers\ItemsController@postAdd'));


    # GET : LOGIN PAGE
    Route::get('item', array('as' => 'item','uses' => '\App\Modules\Items\Controllers\ItemsController@index'));



    # GET : LOGIN PAGE
    Route::post('item/build', array('as' => 'item.list','uses' => '\App\Modules\Items\Controllers\ItemsController@postBuild'));


    # GET : LOGIN PAGE
    Route::get('item/import/{category}', array('as' => 'item.import','uses' => '\App\Modules\Items\Controllers\ItemsController@getImport'));


    # GET : LOGIN PAGE
    Route::get('item/{id}/edit', array('as' => 'item.update','uses' => '\App\Modules\Items\Controllers\ItemsController@update'));

    # GET : LOGIN PAGE
    Route::post('item/{id}/edit', array('as' => 'item.post.update','uses' => '\App\Modules\Items\Controllers\ItemsController@postUpdate'));



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