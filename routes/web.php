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


Route::get('/', 'GalleryController@index');

Route::get('/gallery/{id}', 'GalleryController@show');

Auth::routes(['register' => false]);

Route::get('/admin', 'HomeController@index');

Route::get('/albums', 'AlbumController@index');

Route::get('/albums/remove/{id}', 'AlbumController@destroy');

Route::get('/albums/edit/{id}', 'AlbumController@edit');

Route::post('/albums/edit/{id}', 'AlbumController@amend');

Route::post('/albums', 'AlbumController@store');


Route::get('/photos', 'PhotoController@index');

Route::get('/photos/remove/{id}', 'PhotoController@destroy');

Route::post('/photos', 'PhotoController@store');


