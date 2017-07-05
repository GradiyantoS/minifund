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


Route::get('project', 'Projects\ProjectController@index');
Route::group(['namespace'=>'Core'] ,function (){

    Route::group(['namespace'=>'Auth'] ,function (){
        Route::get('login', 'LoginController@showLoginForm');
    });
    Route::group(['namespace'=>'Controllers'] ,function (){
        Route::get('project', 'Projects\ProjectController@index');

        Route::get('cultivation', 'Cultivations\CultivationController@index');
        Route::get('project', 'Projects\ProjectController@index');

        Route::get('cultivation', 'Cultivations\CultivationController@index');
    });
});



