<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', 'SeriesController@index')
    ->name('listar_series');
Route::get('/series/create', 'SeriesController@create')
    ->name('form_create_serie');

Route::post('/series/create', 'SeriesController@store');
Route::delete('/series/remove/{id}', 'SeriesController@destroy');
Route::post('/series/{id}/editaNome', 'SeriesController@update');

Route::get('/series/{seriesId}/temporadas', 'TemporadasController@index');
