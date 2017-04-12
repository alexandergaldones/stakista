<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function(){
    return view('layouts.master');
});

Route::get('/met5', function(){
    return view('metronic_v4.5.2');
});

Route::get('/test', 'StockJobsController@getAllStocks');

Route::get('/q/{stockCode}', 'StockController@showInfo');

//top actives
Route::get('/actives', 'DashboardController@topActives');

//top gainers
Route::get('/gainers', 'DashboardController@topGainers');

//top gainers
Route::get('/losers', 'DashboardController@topLosers');

//market sectors
Route::get('/sectors', 'StockJobsController@getMarketSectors');

Route::get('/fuck', 'PhotoController@index');

