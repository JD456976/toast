<?php


use App\Http\Controllers\Admin\UserController;

Route::get('dashboard', [
    'as'=> 'dashboard',
    'uses' => 'App\Http\Controllers\Admin\AdminController@index',
]);

Route::resource('user', UserController::class);
