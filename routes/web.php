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

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/postlist', 'HomeController@postlist')->name('postlist');

Route::prefix('admin')
    ->namespace('Admin')
    ->name('adimn.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
});

