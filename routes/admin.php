<?php


use App\Http\Controllers\Admin\BanController;
use App\Http\Controllers\Admin\UserController;

Route::get('dashboard', [
    'as'=> 'dashboard',
    'uses' => 'App\Http\Controllers\Admin\AdminController@index',
]);

Route::resource('user', UserController::class);

Route::controller(BanController::class)->group(function () {
    Route::post('/ban/store/{user}', 'store')->name('ban.store');
    Route::patch('/ban/update/{user}', 'update')->name('ban.update');
});
