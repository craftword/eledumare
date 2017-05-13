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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});


Route::get('viewTable', 'viewImageController@index');
Route::post('viewTable', 'viewImageController@edit');
Route::post('viewTable', 'viewImageController@show');
Route::delete('viewTable/{id}', 'viewImageController@destroy');


Route::get('/addImage','addImageController@index');
Route::post('/addImage','addImageController@storeImage');