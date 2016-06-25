<?php 
/*
 * Route Module : Login
 * Descripttion : Route configuation for login module.
 */

    ####### Module Level Rounting ########
Route::group(array( 'before' => 'auth'), function() {


    # GET : LOGIN PAGE
    Route::get('boatfishing/add', array('as' => 'boatfishing.add','uses' => '\App\Modules\Boatfishing\Controllers\BoatfishingController@showAdd'));

    # GET : LOGIN PAGE
    Route::post('boatfishing/add', array('as' => 'boatfishing.post.add','uses' => '\App\Modules\Boatfishing\Controllers\BoatfishingController@postAdd'));


    # GET : LOGIN PAGE
    Route::get('boatfishing', array('as' => 'boatfishing','uses' => '\App\Modules\Boatfishing\Controllers\BoatfishingController@index'));



    # GET : LOGIN PAGE
    Route::post('boatfishing/build', array('as' => 'boatfishing.list','uses' => '\App\Modules\Boatfishing\Controllers\BoatfishingController@postBuild'));


    # GET : LOGIN PAGE
//    Route::get('boatfishing/import/{category}', array('as' => 'boatfishing.import','uses' => '\App\Modules\Boatfishing\Controllers\BoatfishingController@getImport'));


    # GET : LOGIN PAGE
    Route::get('boatfishing/{id}/edit', array('as' => 'boatfishing.update','uses' => '\App\Modules\Boatfishing\Controllers\BoatfishingController@update'));

    # GET : LOGIN PAGE
    Route::post('boatfishing/{id}/edit', array('as' => 'boatfishing.post.update','uses' => '\App\Modules\Boatfishing\Controllers\BoatfishingController@postUpdate'));



    # GET : LOGIN PAGE
    Route::get('boatfishing/models/{makeid}', array('as' => 'boatfishing.parentmodels','uses' => '\App\Modules\Boatfishing\Controllers\BoatfishingController@getParentModel'));


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


    Route::get('boatfishing/phone', array('as' => 'boatfishing.phone','uses' => '\App\Modules\Boatfishing\Controllers\BoatfishingController@getPhone'));

});