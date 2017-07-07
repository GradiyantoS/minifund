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
/*guess auth*/
Route::get('/' , function (){
    return view('welcome');
});



Route::group(['namespace'=>'Auth'] ,function (){
    Route::get('login', 'LoginController@showLoginForm');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout');
});

Route::middleware(['guest', 'web'])->group(function () {
    Route::get('/dashboard', 'Dashboard\DashboardController@index');
    Route::get('/dashboard/{id}', 'Dashboard\DashboardController@show');
});
// PROJECT ROUTES

route::get('project/search','Projects\ProjectController@search');
Route::get('project', 'Projects\ProjectController@index');
Route::get('project/create', 'Projects\ProjectController@create');
Route::get('project/{id}/edit', 'Projects\ProjectController@edit');

Route::post('project', 'Projects\ProjectController@store');
Route::patch('project/{id}', 'Projects\ProjectController@update');
Route::delete('project/{id}', 'Projects\ProjectController@destroy');


// CULTIVATION ROUTES
route::get('cultivation/search','Cultivations\CultivationController@search');
route::resource('cultivation','Cultivations\CultivationController');

/*
Route::get('cultivation', 'Cultivations\CultivationController@index');
Route::get('cultivation/create', 'Cultivations\CultivationController@create');
Route::get('cultivation/{id}/edit', 'Cultivations\CultivationController@edit');

Route::post('cultivation', 'Cultivations\CultivationController@store');
Route::patch('cultivation/{id}', 'Cultivations\CultivationController@update');
Route::delete('cultivation/{id}', 'Cultivations\CultivationController@destroy');
*/


