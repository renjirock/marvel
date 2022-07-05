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

Route::get('/', 'App\Http\Controllers\index@index')
    ->name('index');

Route::get('comic/{id}', 'App\Http\Controllers\comic@get_comic')
    ->name('comic');

Route::post('favorite', 'App\Http\Controllers\favorite@add_favorite')
    ->name('favorite');

Route::post('favorite/delete', 'App\Http\Controllers\favorite@delte_favorite')
    ->name('favorite.delete');

Route::get('favorites', 'App\Http\Controllers\favorite@get_favorites')
    ->name('favorites');
