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

Route::get(
    '/', 
    function () {
        return view('welcome');
    }
);

route::resource('employees', 'EmployeeController');

route::resource('series', 'SerieController');

route::resource(
    'series/{serieId}/games',
    'GameController'
);

route::get(
    'series/{id}/ranking',
    'RankingController@index'
);