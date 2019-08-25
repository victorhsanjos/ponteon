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

use App\State;

Route::get('/', function () {
    return view('form', ['states' => State::all()]);
});

Route::get('/users', 'UserController@index');
Route::post('/users', 'UserController@store');
Route::delete('/users/{user}', 'UserController@destroy');

Route::get('/state/{state}/cities', 'CityController');
