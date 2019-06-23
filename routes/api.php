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
Route::get('get', 'TodoController@get');
Route::post('task', 'TodoController@add');
Route::put('task/{id}', 'TodoController@update');
Route::delete('task/{id}', 'TodoController@delete');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
