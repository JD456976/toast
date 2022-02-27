<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\BanController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DealController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StoreCategoryController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WarnController;

Route::get('dashboard', [
    'as'=> 'dashboard',
    'uses' => 'App\Http\Controllers\Admin\AdminController@index',
]);

Route::get('admin/user/roles', [
    'as'=> 'user.roles',
    'uses' => 'App\Http\Controllers\Admin\UserRoleController@index',
]);

Route::resource('user', UserController::class)->except(['create','store']);

Route::resource('store', StoreController::class);

Route::resource('store-category', StoreCategoryController::class);

Route::resource('brand', BrandController::class)->except(['show']);

Route::resource('product', ProductController::class);

Route::resource('product-category', ProductCategoryController::class);

Route::resource('report', ReportController::class);

Route::resource('deal', DealController::class);

Route::resource('announcement', AnnouncementController::class)->except(['show']);

Route::resource('page', PageController::class);

Route::resource('warn', WarnController::class);

Route::resource('role', RoleController::class);


Route::controller(BanController::class)->group(function () {
    Route::post('/ban/store/{user}', 'store')->name('ban.store');
    Route::patch('/ban/update/{user}', 'update')->name('ban.update');
});

Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('/reset-password', 'show')->name('reset-password');
    Route::post('/reset-password', 'create')->name('send-password');
});
