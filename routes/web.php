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

Route::get('/', 'PagesController@home');
Route::post('/', 'PagesController@findArticles');

Route::get('/simulation', 'PagesController@playSimulation');
Route::post('/simulation', 'PagesController@playSimulation');


Route::get('/results', 'PagesController@results');
Route::post('/results', 'PagesController@results');

