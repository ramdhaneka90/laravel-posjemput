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
Route::resource('base', 'API\BaseController');
Route::resource('order', 'ApiOrderController');

// Auth API Route
Route::post('login', 'AuthController@loginAPI');
Route::post('register', 'AuthController@registerAPI');

// User API Route
Route::get('user', 'ApiUserController@getUserAPI');
Route::get('user/show', 'ApiUserController@getUserProfileAPI')->middleware('auth:api');
Route::get('user/{id}', 'ApiUserController@getUserProfileByIdAPI')->middleware('auth:api');
Route::put('user/update', 'ApiUserController@updateUserProfileAPI')->middleware('auth:api');
Route::delete('user/destroy', 'ApiUserController@destroyUserProfileAPI')->middleware('auth:api');

Route::resource('log', 'LogOrderController');

	

