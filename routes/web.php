<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'KrakenController@index');
Route::post('create_kraken', 'KrakenController@createKraken')->name("create_kraken");
Route::post('add_tentacle', 'KrakenController@addTentacle')->name("add_tentacle");
Route::post('add_power', 'KrakenController@addPower')->name("add_power");
Route::get('/remove_tentacule/{id}', 'KrakenController@deleteTentacle')->name('remove-tentacle');
Route::get('/change_current_kraken/{id}', 'KrakenController@changeCurrent');
