<?php

use App\Http\Controllers\UserController;
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

Route::get('/', [
    'uses' => 'App\Http\Controllers\HomeController@index',
]);

Route::post('search', [
    'as'=> 'search',
    'uses' => 'App\Http\Controllers\SearchController@index',
]);

Route::get('deal/{slug}', [
    'as'=> 'deal.show',
    'uses' => 'App\Http\Controllers\DealController@show',
]);

Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class)->except(['index','create','store']);
});
