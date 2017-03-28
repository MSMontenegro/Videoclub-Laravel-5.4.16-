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
Route::GET('/logout', 'Auth\LoginController@logout');
Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::GET('/', function(){
		if(Auth::check()){
			 return Redirect::action('CatalogController@getIndex');
		}else {
			return Redirect::action('HomeController@index');
		}
	});
	Route::get('/home', function(){
		if(Auth::check()){
			 return Redirect::action('CatalogController@getIndex');
		}else {
			return Redirect::action('HomeController@index');
		}
	});
	Route::GET('/catalog', 'CatalogController@getIndex');
	Route::GET('/catalog/show/{id}', 'CatalogController@getShow');
	Route::GET('catalog/create', 'CatalogController@getCreate');
	Route::POST('catalog/create', 'CatalogController@postCreate');
	Route::GET('catalog/edit/{id}', 'CatalogController@getEdit');
	Route::PUT('catalog/edit/{id}', 'CatalogController@putEdit');
	Route::PUT('/catalog/rent/{id}', 'CatalogController@putRent');
	Route::PUT('/catalog/return/{id}', 'CatalogController@putReturn');
	Route::DELETE('/catalog/delete/{id}', 'CatalogController@deleteMovie');
});
