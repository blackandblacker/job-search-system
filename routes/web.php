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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('jobs','JobsController');
Route::resource('images','ImageController');
Route::resource('companies','CompanyController');
Route::resource('cities','CityController');
Auth::routes();

Route::get('/admin','AdminController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search','JobsController@search');
Route::get('/search2','CityController@search2');
Route::get('/search3','CompanyController@search3');


