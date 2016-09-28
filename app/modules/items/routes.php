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


    Route::post('item/delete', array( 'as' => 'item.delete','uses' => '\App\Modules\Items\Controllers\ItemsController@destroy'));


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


    # GET : LOGIN PAGE
    Route::get('american', array('as' => 'american','uses' => '\App\Modules\Items\Controllers\ItemsController@indexCommon'));
    # GET : LOGIN PAGE
 //   Route::post('item/build', array('as' => 'item.list','uses' => '\App\Modules\Items\Controllers\ItemsController@postBuild'));

    # GET : LOGIN PAGE
    Route::get('european', array('as' => 'european','uses' => '\App\Modules\Items\Controllers\ItemsController@indexCommon'));

    # GET : LOGIN PAGE
    Route::get('asian', array('as' => 'asian','uses' => '\App\Modules\Items\Controllers\ItemsController@indexCommon'));

    # GET : LOGIN PAGE
    Route::get('delivery', array('as' => 'delivery','uses' => '\App\Modules\Items\Controllers\ItemsController@indexCommon'));
    # GET : LOGIN PAGE
    Route::get('taxi', array('as' => 'taxi','uses' => '\App\Modules\Items\Controllers\ItemsController@indexCommon'));
    # GET : LOGIN PAGE
    Route::get('movablewash', array('as' => 'movablewash','uses' => '\App\Modules\Items\Controllers\ItemsController@indexCommon'));

    # GET : LOGIN PAGE
    Route::get('technicalinspection', array('as' => 'technicalinspection','uses' => '\App\Modules\Items\Controllers\ItemsController@indexCommon'));
    # GET : LOGIN PAGE
    Route::get('helpinroad', array('as' => 'helpinroad','uses' => '\App\Modules\Items\Controllers\ItemsController@indexCommon'));
    # GET : LOGIN PAGE
    Route::get('talsywahamayatwatajlil', array('as' => 'talsywahamayatwatajlil','uses' => '\App\Modules\Items\Controllers\ItemsController@indexCommon'));
    # GET : LOGIN PAGE
    Route::get('garage', array('as' => 'garage','uses' => '\App\Modules\Items\Controllers\ItemsController@indexCommon'));
    # GET : LOGIN PAGE
    Route::get('generalservices', array('as' => 'generalservices','uses' => '\App\Modules\Items\Controllers\ItemsController@indexCommon'));



    # GET : LOGIN PAGE
    Route::get('american/add', array('as' => 'american.add','uses' => '\App\Modules\Items\Controllers\ItemsController@showCommonAdd'));
    # GET : LOGIN PAGE
    //   Route::post('item/build', array('as' => 'item.list','uses' => '\App\Modules\Items\Controllers\ItemsController@postBuild'));

    # GET : LOGIN PAGE
    Route::get('european/add', array('as' => 'european.add','uses' => '\App\Modules\Items\Controllers\ItemsController@showCommonAdd'));

    # GET : LOGIN PAGE
    Route::get('asian/add', array('as' => 'asian.add','uses' => '\App\Modules\Items\Controllers\ItemsController@showCommonAdd'));

    # GET : LOGIN PAGE
    Route::get('delivery/add', array('as' => 'delivery.add','uses' => '\App\Modules\Items\Controllers\ItemsController@showCommonAdd'));
    # GET : LOGIN PAGE
    Route::get('taxi/add', array('as' => 'taxi.add','uses' => '\App\Modules\Items\Controllers\ItemsController@showCommonAdd'));
    # GET : LOGIN PAGE
    Route::get('movablewash/add', array('as' => 'movablewash.add','uses' => '\App\Modules\Items\Controllers\ItemsController@showCommonAdd'));

    # GET : LOGIN PAGE
    Route::get('technicalinspection/add', array('as' => 'technicalinspection.add','uses' => '\App\Modules\Items\Controllers\ItemsController@showCommonAdd'));
    # GET : LOGIN PAGE
    Route::get('helpinroad/add', array('as' => 'helpinroad.add','uses' => '\App\Modules\Items\Controllers\ItemsController@showCommonAdd'));
    # GET : LOGIN PAGE
    Route::get('talsywahamayatwatajlil/add', array('as' => 'talsywahamayatwatajlil.add','uses' => '\App\Modules\Items\Controllers\ItemsController@showCommonAdd'));
    # GET : LOGIN PAGE
    Route::get('garage/add', array('as' => 'garage.add','uses' => '\App\Modules\Items\Controllers\ItemsController@showCommonAdd'));
    # GET : LOGIN PAGE
    Route::get('generalservices/add', array('as' => 'generalservices.add','uses' => '\App\Modules\Items\Controllers\ItemsController@showCommonAdd'));





    # GET : LOGIN PAGE
    Route::post('american/add', array('as' => 'american.post.add','uses' => '\App\Modules\Items\Controllers\ItemsController@postCommonAdd'));
    # GET : LOGIN PAGE
    //   Route::post('item/build', array('as' => 'item.list','uses' => '\App\Modules\Items\Controllers\ItemsController@postBuild'));

    # GET : LOGIN PAGE
    Route::post('european/add', array('as' => 'european.post.add','uses' => '\App\Modules\Items\Controllers\ItemsController@postCommonAdd'));

    # GET : LOGIN PAGE
    Route::post('asian/add', array('as' => 'asian.post.add','uses' => '\App\Modules\Items\Controllers\ItemsController@postCommonAdd'));

    # GET : LOGIN PAGE
    Route::post('delivery/add', array('as' => 'delivery.post.add','uses' => '\App\Modules\Items\Controllers\ItemsController@postCommonAdd'));
    # GET : LOGIN PAGE
    Route::post('taxi/add', array('as' => 'taxi.post.add','uses' => '\App\Modules\Items\Controllers\ItemsController@postCommonAdd'));
    # GET : LOGIN PAGE
    Route::post('movablewash/add', array('as' => 'movablewash.post.add','uses' => '\App\Modules\Items\Controllers\ItemsController@postCommonAdd'));

    # GET : LOGIN PAGE
    Route::post('technicalinspection/add', array('as' => 'technicalinspection.post.add','uses' => '\App\Modules\Items\Controllers\ItemsController@postCommonAdd'));
    # GET : LOGIN PAGE
    Route::post('helpinroad/add', array('as' => 'helpinroad.post.add','uses' => '\App\Modules\Items\Controllers\ItemsController@postCommonAdd'));
    # GET : LOGIN PAGE
    Route::post('talsywahamayatwatajlil/add', array('as' => 'talsywahamayatwatajlil.post.add','uses' => '\App\Modules\Items\Controllers\ItemsController@postCommonAdd'));
    # GET : LOGIN PAGE
    Route::post('garage/add', array('as' => 'garage.post.add','uses' => '\App\Modules\Items\Controllers\ItemsController@postCommonAdd'));
    # GET : LOGIN PAGE
    Route::post('generalservices/add', array('as' => 'generalservices.post.add','uses' => '\App\Modules\Items\Controllers\ItemsController@postCommonAdd'));




});