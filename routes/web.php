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

Route::get('/', 'TopController@index');
Route::post('/', 'TopController@index_post');
Route::get('/detail/{circle_id}','DetailController@detail');
Route::post('/detail', 'DetailController@detail_post');
Route::get('/search', 'SearchController@search');
Route::post('/search', 'SearchController@search_post');
Route::get('/create1', 'CreateController@create1');
Route::post('/create1', 'CreateController@ses_put');
Route::get('/create2', 'CreateController@create2');
Route::post('/create2', 'CreateController@create2_post');
Route::get('/edit/edit', 'EditController@edit');
Route::get('/update/{circle_id}', 'EditController@update');
Route::post('/update/{circle_id}', 'EditController@update_post');
// Route::get('/update2/{circle_id}', 'EditController@update2');
// Route::post('/update2/{circle_id}', 'EditController@update2_post');
Route::post('delete/{{circle_id}}','EditController@delete');
Route::get('/lists', 'ListsController@lists');
Route::post('/lists', 'ListsController@lists_post');
Route::resource('/upload', 'UploadController');
Auth::routes();

Route::get('/home', 'HomeController@login')->name('home');
