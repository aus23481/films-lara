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

Route::get('/', 'FilmController@index');



//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/films', 'FilmController@index');
Auth::routes();
Route::get('/get-films', 'FilmController@getFilms')->name('films');
Route::get('/get-comments', 'FilmController@getComments');
Route::post('/create-film', 'FilmController@createFilm');
Route::post('/add-comment', 'FilmController@addComment');
