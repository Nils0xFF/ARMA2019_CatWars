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

Route::get('init/roles', 'Backend\InitController@createRoles');
Route::get('init/admin', 'Backend\InitController@makeMeAdmin');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function() {

    // Default Admin Route
    Route::get('/', 'Backend\UserController@getIndex');
    
    //Rarity
    Route::get('rarities', 'Backend\RarityController@getIndex');
    Route::get('rarities/index', 'Backend\RarityController@getIndex');

    Route::get('rarities/detail/{id?}', 'Backend\RarityController@getDetail');

    Route::get('rarities/new', 'Backend\RarityController@getNew');
    Route::post('rarities/new', 'Backend\RarityController@postNew');

    Route::get('rarities/edit/{id?}', 'Backend\RarityController@getEdit');
    Route::post('rarities/edit/{id?}', 'Backend\RarityController@postEdit');

    Route::get('rarities/delete/{id?}', 'Backend\RarityController@postDelete');



    //Breeds
    Route::get('breeds', 'Backend\BreedController@getIndex');
    Route::get('breeds/index', 'Backend\BreedController@getIndex');

    Route::get('breeds/detail/{id?}', 'Backend\BreedController@getDetail');

    Route::get('breeds/new', 'Backend\BreedController@getNew');
    Route::post('breeds/new', 'Backend\BreedController@postNew');

    Route::get('breeds/edit/{id?}', 'Backend\BreedController@getEdit');
    Route::post('breeds/edit/{id?}', 'Backend\BreedController@postEdit');

    Route::get('breeds/delete/{id?}', 'Backend\BreedController@postDelete');


    //Cats
    Route::get('cats', 'Backend\CatController@getIndex');
    Route::get('cats/index', 'Backend\CatController@getIndex');

    Route::get('cats/detail/{id?}', 'Backend\CatController@getDetail');

    Route::get('cats/new', 'Backend\CatController@getNew');
    Route::post('cats/new', 'Backend\CatController@postNew');

    Route::get('cats/edit/{id?}', 'Backend\CatController@getEdit');
    Route::post('cats/edit/{id?}', 'Backend\CatController@postEdit');

    Route::get('cats/delete/{id?}', 'Backend\CatController@postDelete');


    //Packs
    Route::get('packs', 'Backend\PackController@getIndex');
    Route::get('packs/index', 'Backend\PackController@getIndex');

    Route::get('packs/detail/{id?}', 'Backend\PackController@getDetail');

    Route::get('packs/new', 'Backend\PackController@getNew');
    Route::post('packs/new', 'Backend\PackController@postNew');

    Route::get('packs/edit/{id?}', 'Backend\PackController@getEdit');
    Route::post('packs/edit/{id?}', 'Backend\PackController@postEdit');

    Route::get('packs/delete/{id?}', 'Backend\PackController@postDelete');

    Route::post('packs/addBreed/{id?}', 'Backend\PackController@postAddBreed');
    Route::get('packs/removeBreed/{pack_id}/{breed_id?}', 'Backend\PackController@getRemoveBreed');


    //Users
    Route::get('users', 'Backend\UserController@getIndex');
    Route::get('users/index', 'Backend\UserController@getIndex');

    Route::get('users/detail/{id?}', 'Backend\UserController@getDetail');

    Route::get('users/edit/{id?}', 'Backend\UserController@getEdit');
    Route::post('users/edit/{id?}', 'Backend\UserController@postEdit');


    //Quests

    Route::get('quests', 'Backend\QuestController@getIndex');
    Route::get('quests/index', 'Backend\QuestController@getIndex');

    Route::get('quests/detail/{id?}', 'Backend\QuestController@getDetail');

    Route::get('quests/new', 'Backend\QuestController@getNew');
    Route::post('quests/new', 'Backend\QuestController@postNew');

    Route::get('quests/edit/{id?}', 'Backend\QuestController@getEdit');
    Route::post('quests/edit/{id?}', 'Backend\QuestController@postEdit');

    Route::get('quests/delete/{id?}', 'Backend\QuestController@postDelete');
});






Auth::routes();


