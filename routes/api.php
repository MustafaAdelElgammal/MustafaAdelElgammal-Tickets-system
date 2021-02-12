<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/api_auth', function (Illuminate\Http\Request $request) {
    return responseJson(0, __('login first'));
});

Route::post('/login', 'AuthController@login');

Route::group(['middleware' => 'api'], function () {
    Route::get('users', 'UserController@index');
    Route::get('users/{id}', 'UserController@show');
    Route::post('users', 'UserController@store');
    Route::delete('users/{id}', 'UserController@destroy');
    Route::put('users/{id}', 'UserController@update');


    Route::get('roles', 'RoleController@index');
    Route::get('roles/{id}', 'RoleController@show');
    Route::post('usrolesers', 'RoleController@store');
    Route::delete('roles/{id}', 'RoleController@destroy');
    Route::put('roles/{id}', 'RoleController@update');

});