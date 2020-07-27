<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', 'SeriesController@index');
Route::get('/series/create', 'SeriesController@create')
->name('form_create_serie');

Route::post('/series/create', 'SeriesController@store');
Route::delete('/series/remove/{id}', 'SeriesController@destroy');
