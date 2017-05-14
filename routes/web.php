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

// Client side route
Route::get('/', 'homeIndexController@index');
Route::get('/{id}', 'homeIndexController@view');
Route::get('/{id}', 'homeIndexController@like');
Route::post('/', 'homeIndexController@view');
Route::post('/', 'homeIndexController@like');
Route::get('/{id}', 'homeIndexController@show');


// Admin Route
Route::group(array('namespace'=>'Admin'), function()
{
	Route::get('/admin', array('as' => 'admin', 'uses' => 'viewImageController@index'));

});

