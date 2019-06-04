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
Route::apiResource('inventorie', 'API\inventorie_Controller');
Route::apiResource('children', 'API\ChildrenController');
Route::get('findChildren', 'API\ChildrenController@search');
Route::get('findChildrenNon', 'API\ChildrenController@searchNon');
Route::apiResource('children_education', 'API\Education_Controller');
Route::apiResource('children_document', 'API\Document_Controller');
Route::apiResource('children_family', 'API\Other_Family__Controller');
Route::get('/edit-anak/{id}', 'API\ChildrenController@edit_anak');


//api for dashboard admin
Route::get('banyak_users', 'API\DashboardController@banyak_User');
Route::get('banyak_karyawan', 'API\DashboardController@banyak_karyawan');
Route::get('banyak_anak', 'API\DashboardController@banyak_anak');
Route::get('banyak_inventaris', 'API\DashboardController@banyak_inventaris');
Route::get('tampil_umur', 'API\DashboardController@tampil_umur');
Route::get('tampil_anak', 'API\DashboardController@tampil_anak');
Route::get('tampil_inventaris', 'API\DashboardController@tampil_inventaris');


//api for user profile
Route::get('profile', 'API\UserController@profile');
Route::put('profile', 'API\UserController@UpdateProfile');

//api for profile LKSA
Route::apiResource('profile_lksa', 'API\ProfileController');
Route::apiResource('galeri', 'API\Galeri_Controller');
Route::apiResource('detail_galeri', 'API\Detail_Gallery');
Route::get('/detail-galery/{id}', 'API\Detail_Gallery@detail_galery');
