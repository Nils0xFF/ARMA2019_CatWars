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

Route::get('/', 'PackController@getIndex');

Route::get('breeds', 'BreedController@getIndex');
Route::get('breeds/index', 'BreedController@getIndex');

Route::get('cats', 'CatController@getIndex');
Route::get('cats/index', 'CatController@getIndex');

Route::get('packs', 'PackController@getIndex');
Route::get('cats/index', 'PackController@getIndex');