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
Route::post('/view/{id}', 'homeIndexController@update');



// Admin Route
Route::group(array('namespace'=>'Admin'), function()
{
	Route::get('/admin', array('as' => 'admin', 'uses' => 'adminController@index'));
	Route::resource('listTable','viewImageController');
	//Route::get('/addImage', array('as' => 'create', 'uses' => 'addImageController@index'));
	//Route::post('/addImage','addImageController@storeImage');
});


Auth::routes();


