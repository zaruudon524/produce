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

Route::get('/reviews', 'ReviewController@index');
Route::get('/reviews/{user}/history', 'ReviewController@history')->name('history');
Route::get('/reviews/create/{museum}', 'ReviewController@create')->middleware('auth');
Route::get('/reviews/{review}/edit', 'ReviewController@edit')->middleware('auth');
Route::put('/reviews/{review}', 'ReviewController@update')->middleware('auth');;
Route::delete('/reviews/{review}', 'ReviewController@delete')->middleware('auth');
Route::get('/reviews/{review}/', 'ReviewController@show')->middleware('auth');
Route::post('/reviews/{museum}', 'ReviewController@store')->middleware('auth');

// Route::get('/museums', 'MuseumController@index')->middleware('auth');
Route::get('/museums/create', 'MuseumController@create');
Route::get('/museums/{museum}/edit', 'MuseumController@edit');
Route::put('/museums/{museum}/', 'MuseumController@update');
Route::delete('/museums/{museum}', 'MuseumController@delete');
Route::get('/museums/{museum}/', 'MuseumController@show');
Route::post('/museums', 'MuseumController@store')->middleware('auth');

Route::resource('/user', 'UserController@index')->middleware('auth');

Auth::routes();

Route::get('/', 'HomeController@search')->middleware('auth');//検索と一覧とトップページ
// Route::get('/public', 'HomeController@index');
Route::delete('/public/{museum}', 'HomeController@delete');
Route::post('/public/{museum}/deletebookmark', 'HomeController@deletebookmark');
Route::get('/public/{museum}/', 'HomeController@show')->middleware('auth');
Route::put('/public/{museum}/bookmark', 'HomeController@bookmark');
Route::get('/public/{user}/good', 'HomeController@good')->name('good');
Route::get('/public/{museum}/edit', 'HomeController@edit');
Route::put('/public/{museum}/', 'HomeController@update');

Route::get('/question', 'QuestionController@form');
Route::get('/question/confirm', 'QuestionController@confirm');
Route::post('/question/complete', 'QuestionController@complete');

// Route::get('/question/{museum}', 'QuestionController@form');
// Route::post('/question/{museum}/confirm', 'QuestionController@confirm');
// Route::post('/question/{museum}/complete', 'QuestionController@complete');


// Route::get('/mail', 'ContactController@index')->name('contact');
// Route::get('/confirm', 'ContactController@confirm')->name('confirm');
// Route::post('/process', 'ContactController@process')->name('process');
// Route::get('/complete', 'ContactController@complete')->name('complete');