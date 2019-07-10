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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('breeds', 'BreedController@getIndex');
Route::get('breeds/index', 'BreedController@getIndex');
Route::get('breeds/edit/{id?}', 'BreedController@getEdit');
Route::get('breeds/delete/{id?}', 'BreedController@postDelete');

Route::get('cats', 'CatController@getIndex');
Route::get('cats/index', 'CatController@getIndex');

Route::get('packs', 'PackController@getIndex');
Route::get('cats/index', 'PackController@getIndex');

Route::get('users', 'UserController@getIndex');
Route::get('users/index', 'UserController@getIndex');

Route::get('rarities', 'RarityController@getIndex');
Route::get('rarities/index', 'RarityController@getIndex');

Route::get('quests', 'QuestController@getIndex');
Route::get('quests/index', 'QuestController@getIndex');

Auth::routes();


