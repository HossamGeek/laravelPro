<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@show');
Route::get('/makeAdmin/{id}', 'HomeController@makeAdmin');

Route::get('/active/{id}', 'HomeController@active');
Route::get('/disactive/{id}', 'HomeController@disactive');


Route::get('/Delete/{iduser}/{idemployee}', 'HomeController@destroy');
Route::get('/update/{idemployee}', 'EmployeeController@update');
Route::post('/update/{iduser}/{idemployee}', 'EmployeeController@edit');

Route::get('/Add', 'EmployeeController@show');
Route::post('/Add', 'EmployeeController@Add');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::get('/api/{id}', 'HomeController@getdata');
