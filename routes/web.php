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

Route::get('/', 'HomeController@search')->middleware('auth');
Route::get('/reviews', 'ReviewController@index');
Route::get('/reviews/{user}/history', 'ReviewController@history')->name('history');
Route::put('/reviews/{user}/addhistory, ReviewController@addhistory');
Route::get('/reviews/create/{museum}', 'ReviewController@create')->middleware('auth');
Route::get('/reviews/{review}/edit', 'ReviewController@edit')->middleware('auth');
Route::put('/reviews/{review}', 'ReviewController@update')->middleware('auth');;
Route::delete('/reviews/{review}', 'ReviewController@delete')->middleware('auth');
Route::get('/reviews/{review}/', 'ReviewController@show')->middleware('auth');
Route::post('/reviews/{museum}', 'ReviewController@store')->middleware('auth');

Route::get('/museums', 'MuseumController@index')->middleware('auth');
Route::get('/museums/create', 'MuseumController@create');
Route::get('/museums/{museum}/edit', 'MuseumController@edit');
Route::put('/museums/{museum}/', 'MuseumController@update');
Route::delete('/museums/{museum}', 'MuseumController@delete');
Route::get('/museums/{museum}/', 'MuseumController@show');
Route::post('/museums', 'MuseumController@store')->middleware('auth');

Route::resource('/user', 'UserController@index')->middleware('auth');

Auth::routes();

Route::get('/public', 'HomeController@index')->name('home');
Route::delete('/public/{museum}', 'HomeController@delete');
Route::post('/public/{museum}/deletebookmark', 'HomeController@deletebookmark');
Route::get('/public/{museum}/', 'HomeController@show')->middleware('auth');
Route::post('/public/search', 'HomeController@search')->middleware('auth');
Route::put('/public/{museum}/bookmark', 'HomeController@bookmark');
Route::get('/public/{user}/good', 'HomeController@good')->name('good');

// Route::get('/mail', 'ContactController@index')->name('contact');
// Route::get('/confirm', 'ContactController@confirm')->name('confirm');
// Route::post('/process', 'ContactController@process')->name('process');
// Route::get('/complete', 'ContactController@complete')->name('complete');