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

Route::get('ping', 'ApiController@status');

Route::post('vote', 'ApiController@vote');

Route::get('products', 'ApiController@products');
Route::get('categories', 'ApiController@categories');
