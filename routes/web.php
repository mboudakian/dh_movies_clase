<?php


Route::get('/', 'HomeController@index');


Route::get('/actors', 'ActorController@index');
Route::get('/actors/create', 'ActorController@create');
Route::post('/actors/create', 'ActorController@store');
Route::get('/actors/{id}', 'ActorController@show');


Route::get('/genres','GenreController@index');
Route::get('/genres/{id}','GenreController@show');


Route::get('/movies', 'MovieController@index');
Route::get('/movies/create', 'MovieController@create');
Route::post('/movies/create', 'MovieController@store');
Route::get('/movies/{id}', 'MovieController@show');


Route::get('/backoffice');

