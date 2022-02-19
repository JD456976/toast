<?php


Route::get('dashboard', [
    'as'=> 'dashboard',
    'uses' => 'App\Http\Controllers\Admin\AdminController@index',
]);
