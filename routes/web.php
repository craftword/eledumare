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
Route::get('/view/{id}', 'homeIndexController@view');
Route::put('/updateLikes/{id}', 'homeIndexController@updateLikes');
Route::put('/updateViews/{id}', 'homeIndexController@updateViews');




// Admin Route
Route::group(array('namespace'=>'Admin'), function()
{
	Route::get('/admin', array('as' => 'admin', 'uses' => 'adminController@index'));
	Route::get('/morrisView', 'adminController@morrisViews');
	Route::resource('listTable','viewImageController');
	
});


Auth::routes();


