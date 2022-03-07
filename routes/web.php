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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/imoveis', 'PropertyController@index')->name('property.index');

Route::get('/imoveis/new','PropertyController@create')->name('property.create');
Route::post('/imoveis/store','PropertyController@store')->name('property.store');

Route::get('/imoveis/editar/{name}','PropertyController@edit')->name('property.edit');
Route::put('/imoveis/update/{name}','PropertyController@update')->name('property.update');

Route::delete('/imoveis/remover/{name}','PropertyController@destroy')->name('property.destroy');
