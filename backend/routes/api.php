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



Route::get('/users', 'UsersController@index');
Route::get('/users/{id}', 'UsersController@show');
Route::post('/users', 'UsersController@store');
Route::delete('/users/{id}', 'UsersController@delete');
Route::post('login','LoginController@login');

Route::get('/events', 'EventsController@index');
Route::get('/events/{id}', 'EventsController@show');
Route::post('/events', 'EventsController@store');
Route::delete('/events/{id}', 'EventsController@delete');

Route::post('/events/{id}/persons', 'EventsController@Addpersons');
Route::delete('/events/{id}/persons', 'EventsController@DeletePersons');


