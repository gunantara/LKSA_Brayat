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


//api resource for retrieving data
Route::apiResource('user', 'API\UserController');
Route::apiResource('employee', 'API\EmployeeController');
Route::apiResource('children', 'API\ChildrenController');

//api for user profile
Route::get('profile', 'API\UserController@profile');
Route::put('profile', 'API\UserController@UpdateProfile');
