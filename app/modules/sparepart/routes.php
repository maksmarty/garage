<?php 
/*
 * Route Module : Login
 * Descripttion : Route configuation for login module.
 */

    ####### Module Level Rounting ########
Route::group(array( 'before' => 'auth'), function() {


    # GET : LOGIN PAGE
    Route::get('sparepart/add', array('as' => 'sparepart.add','uses' => '\App\Modules\Sparepart\Controllers\SparepartController@showAdd'));

    # GET : LOGIN PAGE
    Route::post('sparepart/add', array('as' => 'sparepart.post.add','uses' => '\App\Modules\Sparepart\Controllers\SparepartController@postAdd'));


    # GET : LOGIN PAGE
    Route::get('sparepart', array('as' => 'sparepart','uses' => '\App\Modules\Sparepart\Controllers\SparepartController@index'));



    # GET : LOGIN PAGE
    Route::post('sparepart/build', array('as' => 'sparepart.list','uses' => '\App\Modules\Sparepart\Controllers\SparepartController@postBuild'));


    # GET : LOGIN PAGE
//    Route::get('sparepart/import/{category}', array('as' => 'sparepart.import','uses' => '\App\Modules\Sparepart\Controllers\SparepartController@getImport'));


    # GET : LOGIN PAGE
    Route::get('sparepart/{id}/edit', array('as' => 'sparepart.update','uses' => '\App\Modules\Sparepart\Controllers\SparepartController@update'));

    # GET : LOGIN PAGE
    Route::post('sparepart/{id}/edit', array('as' => 'sparepart.post.update','uses' => '\App\Modules\Sparepart\Controllers\SparepartController@postUpdate'));



    # GET : LOGIN PAGE
    Route::get('sparepart/models/{makeid}', array('as' => 'sparepart.parentmodels','uses' => '\App\Modules\Sparepart\Controllers\SparepartController@getParentModel'));


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