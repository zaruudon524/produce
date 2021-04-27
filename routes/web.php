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

Route::get('/', 'ReviewController@index');
Route::get('/reviews/create', 'ReviewController@create');
Route::get('/reviews/{review}/edit', 'ReviewController@edit');
Route::put('/reviews/{review}', 'ReviewController@update');
Route::delete('/reviews/{review}', 'ReviewController@delete');
Route::get('/reviews/{review}', 'ReviewController@show');
Route::post('/reviews', 'ReviewController@store');

Route::get('/', 'MuseumController@index');
Route::get('/museums/create', 'MuseumController@create');
Route::get('/museums/{museum}/edit', 'MuseumController@edit');
Route::put('/museums/{museum}/', 'MuseumController@update');
Route::delete('/museums/{museum}', 'MuseumController@delete');
Route::get('/museums/{museum}/', 'MuseumController@show');
Route::post('/museums', 'MuseumController@store');