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




// Admin Route
Route::group(array('namespace'=>'Admin'), function()
{
	Route::get('/admin', array('as' => 'admin', 'uses' => 'adminController@index'));
	Route::resource('listTable','viewImageController');
	//Route::get('/listTable', array('as' => 'listTable', 'uses' => 'adminController@tableListOfImages'));
	//Route::get('/{id}', array('as' => 'show', 'uses' => 'adminController@show'));
	//Route::get('/edit/{id}', array('as' => 'admin', 'uses' => 'adminController@edit'));
});


Auth::routes();


