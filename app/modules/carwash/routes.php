<?php 
/*
 * Route Module : Login
 * Descripttion : Route configuation for login module.
 */

    ####### Module Level Rounting ########
Route::group(array( 'before' => 'auth'), function() {


    # GET : LOGIN PAGE
    Route::get('carwash/add', array('as' => 'carwash.add','uses' => '\App\Modules\Carwash\Controllers\CarwashController@showAdd'));

    # GET : LOGIN PAGE
    Route::post('carwash/add', array('as' => 'carwash.post.add','uses' => '\App\Modules\Carwash\Controllers\CarwashController@postAdd'));


    # GET : LOGIN PAGE
    Route::get('carwash', array('as' => 'carwash','uses' => '\App\Modules\Carwash\Controllers\CarwashController@index'));



    # GET : LOGIN PAGE
    Route::post('carwash/build', array('as' => 'carwash.list','uses' => '\App\Modules\Carwash\Controllers\CarwashController@postBuild'));


    # GET : LOGIN PAGE
//    Route::get('carwash/import/{category}', array('as' => 'carwash.import','uses' => '\App\Modules\Carwash\Controllers\CarwashController@getImport'));


    # GET : LOGIN PAGE
    Route::get('carwash/{id}/edit', array('as' => 'carwash.update','uses' => '\App\Modules\Carwash\Controllers\CarwashController@update'));

    # GET : LOGIN PAGE
    Route::post('carwash/{id}/edit', array('as' => 'carwash.post.update','uses' => '\App\Modules\Carwash\Controllers\CarwashController@postUpdate'));



    # GET : LOGIN PAGE
    Route::get('carwash/models/{makeid}', array('as' => 'carwash.parentmodels','uses' => '\App\Modules\Carwash\Controllers\CarwashController@getParentModel'));


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


    Route::get('carwash/phone', array('as' => 'carwash.phone','uses' => '\App\Modules\Carwash\Controllers\CarwashController@getPhone'));

});