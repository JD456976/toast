<?php

use App\Http\Controllers\DealController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchlistController;
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

Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class)->except(['index','create','store']);

    Route::get('watchlist/activate/{id}', [
        'as'=> 'watchlist.activate',
        'uses' => 'App\Http\Controllers\WatchlistActivateController',
    ]);
    Route::get('watchlist/deactivate/{id}', [
        'as'=> 'watchlist.deactivate',
        'uses' => 'App\Http\Controllers\WatchlistDeactivateController',
    ]);

    Route::resource('watchlist', WatchlistController::class)->only(['show', 'store', 'destroy']);

    Route::resource('deal', DealController::class);
});
