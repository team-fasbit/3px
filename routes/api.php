<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1'], function () {
    Route::post('login', 'API\UserController@login');
    Route::post('register', 'API\UserController@register');
    Route::post('settings', 'API\UserController@settings');
    Route::get('notifications', 'API\UserController@notifications');
});
Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    Route::post('updatePassword', 'API\UserController@updatePassword');
    Route::post('createTransaction', 'API\UserController@createTransaction');
    Route::post('updateTransaction', 'API\UserController@updateTransaction');
    Route::post('updateKYCDetails', 'API\UserController@updateKYCDetails');
    Route::get('getTransactions', 'API\UserController@getTransactions');
    Route::post('updateAccount', 'API\UserController@updateAccount');
    Route::post('details', 'API\UserController@details');
    Route::get('getProgressBar', 'API\UserController@getProgressBar');
});
