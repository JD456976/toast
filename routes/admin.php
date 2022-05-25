<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\BanController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BountyController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DealController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\StoreCategoryController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WarnController;

/*
 * Admin Dashboard
 */
Route::get('dashboard', [
    'as' => 'dashboard',
    'uses' => 'App\Http\Controllers\Admin\AdminController',
]);

/*
 * User Related Routes
 */
Route::get('admin/user/roles', [
    'as' => 'user.roles',
    'uses' => 'App\Http\Controllers\Admin\UserRoleController',
]);

Route::resource('user', UserController::class)->except(['create', 'store']);

Route::resource('warn', WarnController::class);

/*
 * Store Routes
 */
Route::resource('store', StoreController::class)->except(['show']);

Route::resource('store-category', StoreCategoryController::class)->except(['show']);

/*
 * Brand Routes
 */
Route::resource('brand', BrandController::class)->except(['show']);

/*
 * Product Routes
 */
Route::resource('product', ProductController::class);

Route::resource('product-category', ProductCategoryController::class);

/*
 * Deal Routes
 */
Route::resource('deal', DealController::class)->except(['show', 'store', 'create']);

/*
 * Bounty Routes
 */
Route::resource('bounty', BountyController::class)->except(['show', 'store', 'create']);

/*
 * Report Routes
 */
Route::resource('report', ReportController::class)->except(['show']);

/*
 * Site Announcement Routes
 */
Route::resource('announcement', AnnouncementController::class)->except(['show']);

/*
 * Site Pages Routes
 */
Route::resource('page', PageController::class)->except(['show']);

/*
 * Blog Routes
 */
Route::resource('blog', BlogController::class)->except(['show']);

Route::resource('blog-category', BlogCategoryController::class)->except(['show']);

/*
 * Ban Routes
 */
Route::controller(BanController::class)->group(function () {
    Route::post('/ban/store/{user}', 'store')->name('ban.store');
    Route::patch('/ban/update/{user}', 'update')->name('ban.update');
});

/*
 * Reset User Password Routes
 */
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('/reset-password', 'show')->name('reset-password');
    Route::post('/reset-password', 'create')->name('send-password');
});

/*
 * Site Settings Routes
 */
Route::controller(SettingsController::class)->group(function () {
    Route::get('/settings', 'index')->name('settings.index');
    Route::put('/settings', 'update')->name('settings.update');
});
