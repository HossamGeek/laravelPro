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

/*Route::group(['middleware' => 'auth:api'], function() {
    Route::get('api/{id}', 'HomeController@getdata');
});*/

//Route::resource('articles', 'HomeController@getdata');
Route::get('employee', 'Emp@getAll');
Route::post('employee', 'Emp@Add');
Route::get('emp/{id}', 'Emp@index');
Route::get('empname', 'Emp@search');
//Route::resource('user','HomeController',['only'=>['@getdata']]);
//Route::middleware('/api/{id}')->get('/api/{id}', 'HomeController@getdata');