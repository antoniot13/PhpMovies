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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::post('/', 'HomeController@indexSorted');
Auth::routes();
Route::get('/search','HomeController@search');
Route::get('{id}', 'HomeController@show');
Route::get('/user/movies', 'HomeController@usermovies');
Route::post('{id}','HomeController@storeComment');
Route::post('/user/{id}/uploadpicture','HomeController@storePicture');
Route::post('/watched/{id}','HomeController@storeWatched');
Route::post('/rate/{id}','HomeController@storeRating');
//Route::post('/watched','HomeController@watched');
Route::get('user/{id}','HomeController@profile')->where('id', '[0-9]+');