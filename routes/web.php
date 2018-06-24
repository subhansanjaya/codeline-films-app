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


// redirect / tp films
Route::get('/', function(){
    return redirect('/films/');
});

// films routes
Route::get('/films', 'FilmController@index');

Route::resource('films', 'FilmController');

// Auth routes
Auth::routes();

// film create routes
Route::get('/create', 'FilmController@create')->name('film.create');
Route::post('/create', 'FilmController@store')->name('film.store');

// comments resource
Route::resource('/comment', 'CommentController');
