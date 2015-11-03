<?php 
/*
 * Descripttion : Dashboard Routes configuation .
 * @Author      : Akbar
 * @Date        : Oct 30, 2014
 */
/*
|--------------------------------------------------------------------------
| Dashboard's Routes
|--------------------------------------------------------------------------

*/

# dashboard controller
Route::get('dashboard', array('as'=>'dashboard', 'before' => 'auth', 'uses' => '\App\Modules\Dashboard\Controllers\DashboardController@getIndex'));
