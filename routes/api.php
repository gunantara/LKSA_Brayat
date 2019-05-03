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
Route::apiResource('children_education', 'API\Education_Controller');
Route::apiResource('children_document', 'API\Document_Controller');
Route::apiResource('children_family', 'API\Other_Family__Controller');
Route::get('/edit-anak/{id}', 'API\ChildrenController@edit_anak');


//api for dashboard admin
Route::get('banyak_users', 'API\Dashboardcontroller@banyak_User');
Route::get('banyak_karyawan', 'API\Dashboardcontroller@banyak_karyawan');
Route::get('banyak_anak', 'API\Dashboardcontroller@banyak_anak');

//api for user profile
Route::get('profile', 'API\UserController@profile');
Route::put('profile', 'API\UserController@UpdateProfile');

//api for profile LKSA
Route::apiResource('profile_lksa', 'API\ProfileController');
Route::apiResource('galeri', 'API\Galeri_Controller');
