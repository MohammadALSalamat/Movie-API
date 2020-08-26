<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', "ShowMovies@popular")->name('indexmovie');
Route::get('/Movie/{id}', "ShowMovies@singleMovie")->name('showmovie.show');

// actors routes

Route::get('/Actors', "Actors@index")->name('actors');
Route::get('/Actors/page/{page?}', "Actors@index"); // pagination
Route::get('/actors/{id}', "Actors@show")->name('actors.show');

// Tv Show
Route::get('/TvShow', 'TVController@Tvindex')->name('TV');
Route::get('/TvShow/{id}', 'TVController@TvShow')->name('Show');
