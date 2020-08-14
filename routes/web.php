<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', 'SeriesController@index')
    ->name('listar_series');
Route::get('/series/create', 'SeriesController@create')
    ->name('form_create_serie')
    ->middleware('autenticador');

Route::post('/series/create', 'SeriesController@store');
Route::delete('/series/remove/{id}', 'SeriesController@destroy')
    ->middleware('autenticador');

Route::post('/series/{id}/editaNome', 'SeriesController@update')
    ->middleware('autenticador');

Route::get('/series/{seriesId}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')
    ->middleware('autenticador');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});
