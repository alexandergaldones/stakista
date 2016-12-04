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

Route::get('/test', 'StockJobsController@getAllStocks');

Route::get('/q/{stockCode}', 'StockJobsController@getStock');

//top actives
Route::get('/actives', 'StockJobsController@getTopActives');

//top gainers
Route::get('/gainers', 'StockJobsController@getTopGainers');

//top gainers
Route::get('/losers', 'StockJobsController@getTopLosers');

//market sectors
Route::get('/sectors', 'StockJobsController@getMarketSectors');

Route::get('/fuck', 'PhotoController@index');

