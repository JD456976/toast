<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
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

Route::get('page/{slug}', [
    'as'=> 'page.show',
    'uses' => 'App\Http\Controllers\PageShowController',
]);

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact/', 'show')->name('contact.show');
    Route::post('/contact/send', 'store')->name('contact.store')->middleware(['throttle:contact-store']);
});

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
    Route::get('watchlist/store/{id}', [
        'as'=> 'watchlist.store',
        'uses' => 'App\Http\Controllers\WatchlistController@store',
    ]);
    Route::get('watchlist/show/{id}', [
        'as'=> 'watchlist.show',
        'uses' => 'App\Http\Controllers\WatchlistController@show',
    ]);
    Route::delete('watchlist/destroy/{id}', [
        'as'=> 'watchlist.destroy',
        'uses' => 'App\Http\Controllers\WatchlistController@destroy',
    ]);

    Route::resource('deal', DealController::class);

    Route::post('comment/store/{id}', [
        'as' => 'comment.store',
        'uses' => 'CommentController@store',
    ]);
});
