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

Route::get('/', 'Dashboard@index');
Route::get('/delete/{id}', 'Dashboard@deleteItem');
Route::get('/add/{name}/today', 'Dashboard@addTodayItem');
Route::get('/add/{name}/someday', 'Dashboard@addSomedayItem');
Route::get('/update/{id}/{name}', 'Dashboard@updateItem');
Route::get('/defer/{id}', 'Dashboard@deferItem');
Route::get('/incridx/{id}', 'Dashboard@incrIdx');
Route::get('/decridx/{id}', 'Dashboard@decrIdx');
