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
Route::get('/detail/{circle_id}', 'DetailController@detail');
Route::get('/search', 'SearchController@search');
Route::post('/search', 'SearchController@search_post');
Route::get('/create1', 'CreateController@create1');
Route::post('/create1', 'CreateController@create1_post');
Route::get('/create2', 'CreateController@create2');
Route::post('/create2', 'CreateController@create2_post');
Route::get('/edit/edit', 'EditController@edit');
Route::get('/update/{circle_id}', 'EditController@update');
Route::post('/update/{circle_id}', 'EditController@update_post');
Route::delete('/delete/{circle_id}', 'EditController@delete');
Route::get('/lists', 'ListsController@lists');
Route::get('/home', 'HomeController@login')->name('home');
Route::get('/login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('/login/google/callback', 'Auth\LoginController@handleGoogleCallback');
Route::get('/login/facebook', 'Auth\LoginController@redirectToFacebook' );
Route::get('/login/facebook/callback', 'Auth\LoginController@handleFacebookCallback' );
Auth::routes();