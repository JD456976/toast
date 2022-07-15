<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\ApproveBountyController;
use App\Http\Controllers\Admin\BanController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BountyController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DealController;
use App\Http\Controllers\Admin\FeatureBountyController;
use App\Http\Controllers\Admin\FeatureDealController;
use App\Http\Controllers\Admin\FrontpageDealController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\StoreCategoryController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\VerifyBountyController;
use App\Http\Controllers\Admin\WarnController;
use Illuminate\Support\Facades\Route;

/*
 * Admin Dashboard
 */
Route::get('dashboard', [
    'as' => 'dashboard',
    'uses' => AdminController::class,
]);

/*
 * User Related Routes
 */
Route::get('admin/user/roles', [
    'as' => 'user.roles',
    'uses' => UserRoleController::class,
]);

Route::resource('user', UserController::class)->except(['create', 'store']);

Route::resource('warn', WarnController::class)->except(['show']);

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

Route::post('admin/deal/feature/{id}', [
    'as' => 'deal.feature',
    'uses' => FeatureDealController::class,
]);

Route::post('admin/deal/approve/{id}', [
    'as' => 'deal.approve',
    'uses' => ApproveBountyController::class,
]);

Route::post('admin/deal/frontpage/{id}', [
    'as' => 'deal.frontpage',
    'uses' => FrontpageDealController::class,
]);


/*
 * Bounty Routes
 */
Route::resource('bounty', BountyController::class)->except(['show', 'store', 'create']);

Route::post('admin/bounty/feature/{id}', [
    'as' => 'bounty.feature',
    'uses' => FeatureBountyController::class,
]);

Route::post('admin/bounty/approve/{id}', [
    'as' => 'bounty.approve',
    'uses' => ApproveBountyController::class,
]);

Route::post('admin/bounty/verify/{id}', [
    'as' => 'bounty.verify',
    'uses' => VerifyBountyController::class,
]);

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

Route::get('blog/feature/{id}', [
    'as' => 'blog.feature',
    'uses' => 'FeatureBlogController',
]);

Route::get('blog/activate/{id}', [
    'as' => 'blog.activate',
    'uses' => 'ActivateBlogController',
]);

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
    Route::patch('/settings', 'update')->name('settings.update');
});
