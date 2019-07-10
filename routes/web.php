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

Route::get('init/roles', 'InitController@createRoles');
Route::get('init/admin', 'InitController@makeMeAdmin');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function() {

    // Default Admin Route
    Route::get('/', 'UserController@getIndex');
    
    //Rarity
    Route::get('rarities', 'RarityController@getIndex');
    Route::get('rarities/index', 'RarityController@getIndex');

    Route::get('rarities/new', 'RarityController@getNew');
    Route::post('rarities/new', 'RarityController@postNew');

    Route::get('rarities/edit/{id?}', 'RarityController@getEdit');
    Route::post('rarities/edit/{id?}', 'RarityController@postEdit');

    Route::get('rarities/delete/{id?}', 'RarityController@postDelete');



    //Breeds
    Route::get('breeds', 'BreedController@getIndex');
    Route::get('breeds/index', 'BreedController@getIndex');

    Route::get('breeds/new', 'BreedController@getNew');
    Route::post('breeds/new', 'BreedController@postNew');

    Route::get('breeds/edit/{id?}', 'BreedController@getEdit');
    Route::post('breeds/edit/{id?}', 'BreedController@postEdit');

    Route::get('breeds/delete/{id?}', 'BreedController@postDelete');


    //Cats
    Route::get('cats', 'CatController@getIndex');
    Route::get('cats/index', 'CatController@getIndex');

    Route::get('cats/new', 'CatController@getNew');
    Route::post('cats/new', 'CatController@postNew');

    Route::get('cats/edit/{id?}', 'CatController@getEdit');
    Route::post('cats/edit/{id?}', 'CatController@postEdit');

    Route::get('cats/delete/{id?}', 'CatController@postDelete');


    //Packs
    Route::get('packs', 'PackController@getIndex');
    Route::get('packs/index', 'PackController@getIndex');

    Route::get('packs/new', 'PackController@getNew');
    Route::post('packs/new', 'PackController@postNew');

    Route::get('packs/edit/{id?}', 'PackController@getEdit');
    Route::post('packs/edit/{id?}', 'PackController@postEdit');

    Route::get('packs/delete/{id?}', 'PackController@postDelete');


    //Quests
    Route::get('users', 'QuestController@getIndex');
    Route::get('users/index', 'QuestController@getIndex');

    Route::get('users/new', 'QuestController@getNew');
    Route::post('users/new', 'QuestController@postNew');

    Route::get('users/edit/{id?}', 'QuestController@getEdit');
    Route::post('users/edit/{id?}', 'QuestController@postEdit');

    Route::get('users/delete/{id?}', 'QuestController@postDelete');


    //Users
    Route::get('users', 'UserController@getIndex');
    Route::get('users/index', 'UserController@getIndex');


    Route::get('quests', 'QuestController@getIndex');
    Route::get('quests/index', 'QuestController@getIndex');

    Route::get('quests/new', 'UserController@getNew');
    Route::post('quests/new', 'UserController@postNew');

    Route::get('quests/edit/{id?}', 'UserController@getEdit');
    Route::post('quests/edit/{id?}', 'UserController@postEdit');

    Route::get('quests/delete/{id?}', 'UserController@postDelete');
});






Auth::routes();


