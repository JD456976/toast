<?php

Route::middleware(['role:admin', 'auth'])->group(function() {
    Route::get('dashboard', [
        'as'=> 'dashboard',
        'uses' => 'App\Http\Controllers\Admin\AdminController@index',
    ]);
});
