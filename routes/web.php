<?php

//Route::get('/', function () {
//    return view('welcome');
//});

//	Route::get('/', 'Quotes@getQuotes');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Quotes@getQuotes');

Route::get('/setQuotes', 'Quotes@setQuotes');

Route::get('/quotes/quotd/{quote}', [
	'uses' => 'Quotes@quotd',
]);

Route::get('/quotes/random', [
	'uses' => 'Quotes@random',
]);

Route::get('/quotes/search/{quote}', [
	'uses' => 'Quotes@search',
]);