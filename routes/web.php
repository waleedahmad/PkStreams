<?php

Route::get('/', 'AppController@index');

Route::get('/shows', 'AppController@getTvShows');
Route::get('/show/{id}', 'AppController@getShow');
Route::get('/movies', 'AppController@getMovies');
Route::get('/movie/{id}', 'AppController@getMovie');
Route::get('/season/{id}', 'AppController@getSeason');
Route::get('/episode/{id}', 'AppController@getEpisode');


Route::group(['middleware'  =>  ['auth']], function(){
    Route::get('/admin', 'AdminController@index');

    Route::get('/admin/movies', 'AdminController@getMovies');
    Route::get('/admin/shows', 'AdminController@getShows');

    Route::get('/admin/shows/add', 'AdminController@getAddShow');
    Route::post('/admin/shows', 'AdminController@addShow');
    Route::delete('/admin/shows', 'AdminController@removeShow');
    Route::get('/admin/shows/update/{id}', 'AdminController@getUpdateShow');
    Route::post('/admin/shows/update', 'AdminController@updateShow');

    Route::get('/admin/shows/{id}/seasons', 'AdminController@getShowSeasons');
    Route::get('/admin/shows/{id}/seasons/add', 'AdminController@getAddSeason');
    Route::post('/admin/shows/seasons', 'AdminController@addSeason');
    Route::delete('/admin/shows/seasons', 'AdminController@removeSeason');
    Route::get('/admin/shows/seasons/{id}/update', 'AdminController@getUpdateSeason');
    Route::post('/admin/shows/seasons/update', 'AdminController@updateSeason');

    Route::get('/admin/seasons/{id}/episodes', 'AdminController@getSeasonEpisodes');
    Route::get('/admin/seasons/{id}/episodes/add', 'AdminController@getAddSeasonEpisodes');
    Route::post('/admin/seasons/episodes', 'AdminController@addEpisode');
    Route::delete('/admin/seasons/episodes', 'AdminController@removeEpisode');

    Route::get('/admin/episode/{id}/update', 'AdminController@getUpdateSeasonEpisode');
    Route::post('/admin/episode/update', 'AdminController@updateEpisode');


    Route::get('/admin/movies/add', 'AdminController@getAddMovie');
    Route::post('/admin/movies', 'AdminController@addMovie');
    Route::delete('/admin/movies', 'AdminController@removeMovie');
    Route::get('/admin/movies/update/{id}', 'AdminController@getUpdateMovie');
    Route::post('/admin/movies/update', 'AdminController@updateMovie');

    Route::get('/admin/sync', 'AdminController@syncContent');
});

Route::group(['middleware'  =>  ['guest']], function(){
    Route::get('/register', 'AuthController@getRegister');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@getLogin');
    Route::post('/login', 'AuthController@authenticate');
});

Route::group(['middleware'  =>  ['auth']], function(){
    Route::get('/logout', 'AuthController@logout');
});
