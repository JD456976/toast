<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BountyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PageShowController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UnapproveDealController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\User\WarnController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchlistActivateController;
use App\Http\Controllers\WatchlistDeactivateController;
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

/*
 * Home Route
 */
Route::get('/', [
    'uses' => 'App\Http\Controllers\DealController@index',
]);

/*
 * Search Route
 */
Route::post('search', [
    'as' => 'search',
    'uses' => 'App\Http\Controllers\SearchController@index',
]);

/*
 * Page Display Route
 */
Route::get('page/{slug}', [
    'as' => 'page.show',
    'uses' => PageShowController::class,
]);


/*
 * Blog Routes
 */
Route::resource('blog', BlogController::class)->only(['index', 'show']);

Route::post('blog/comment/store/{id}', [
    'as' => 'blog.comment.store',
    'uses' => 'BlogCommentController@store',
]);

Route::delete('blog/comment/destroy/{id}', [
    'as' => 'blog.comment.destroy',
    'uses' => 'BlogCommentController@destroy'
]);

Route::get('blog/category/{id}', [
    'as' => 'blog.category',
    'uses' => 'BlogCategoryController',
]);

Route::get('blog/tag/{id}', [
    'as' => 'blog.tag',
    'uses' => 'TagController',
]);

Route::post('report/comment/{id}', [
    'as' => 'report.blog.comment',
    'uses' => 'ReportBlogCommentController',
])->middleware(['throttle:report']);


/*
 * Contact Form Routes
 */
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact/', 'show')->name('contact.show');
    Route::post('/contact/store', 'store')->name('contact.store')->middleware(['throttle:contact-store']);
});

Route::middleware(['auth'])->group(function () {

    /*
     * User Routes
     */
    Route::resource('user', UserController::class)->except(['index', 'create', 'store']);


    Route::get('user/{id}/deals', [
        'as' => 'user.deals',
        'uses' => 'User\DealController@show',
    ]);

    Route::get('user/{id}/bounties', [
        'as' => 'user.bounties',
        'uses' => 'User\BountyController@show',
    ]);

    Route::get('user/{id}/info', [
        'as' => 'user.info',
        'uses' => 'User\AccountController@show',
    ]);

    /*
     * WatchlistActions Routes
     */


    Route::post('watchlist/store/{id}', [
        'as' => 'watchlist.store',
        'uses' => 'App\Http\Controllers\WatchlistController@store',
    ]);

    Route::delete('watchlist/delete/{id}', [
        'as' => 'watchlist.delete',
        'uses' => 'App\Http\Controllers\WatchlistController@destroy',
    ]);

    Route::post('watchlist/activate/{id}', [
        'as' => 'watchlist.activate',
        'uses' => WatchlistActivateController::class,
    ]);

    Route::post('watchlist/deactivate/{id}', [
        'as' => 'watchlist.deactivate',
        'uses' => WatchlistDeactivateController::class,
    ]);

    /*
    * Deal Related Routes
    */
    Route::resource('deal', DealController::class)->except(['destroy']);

    Route::post('deal/comment/store/{id}', [
        'as' => 'deal.comment.store',
        'uses' => 'DealCommentController@store',
    ])->middleware(['throttle:comment-store']);

    Route::post('report/deal/{id}', [
        'as' => 'report.deal',
        'uses' => 'ReportDealController',
    ])->middleware(['throttle:report']);

    Route::post('report/deal/comment/{id}', [
        'as' => 'report.deal.comment',
        'uses' => 'ReportDealCommentController',
    ])->middleware(['throttle:report']);

    Route::patch('deal/rate/{id}', [
        'as' => 'deal.rate',
        'uses' => 'DealRateController',
    ]);

    /*
     * Bounty Related Routes
     */
    Route::resource('bounty', BountyController::class)->except(['destroy']);

    Route::patch('report/bounty/{id}', [
        'as' => 'report.bounty',
        'uses' => 'ReportBountyController',
    ]);

    Route::patch('bounty/comment/store/{id}', [
        'as' => 'bounty.comment.store',
        'uses' => 'BountyCommentController@store',
    ]);

    Route::patch('bounty/rate/{id}', [
        'as' => 'bounty.rate',
        'uses' => 'BountyRateController',
    ]);

    Route::patch('report/bounty/comment/{id}', [
        'as' => 'report.bounty.comment',
        'uses' => 'ReportBountyCommentController',
    ])->middleware(['throttle:report']);

    /*
     * Logout Route
     */
    Route::post('logout', [
        'as' => 'logout',
        'uses' => 'HomeController@logout'
    ]);
});

//Socialite Routes
Route::group(['middleware' => ['guest']], function () {
    Route::get('auth/github', [SocialController::class, 'githubRedirect']);
    Route::get('auth/github/callback', [
        SocialController::class,
        'loginWithGithub',
    ]);

    Route::get('auth/twitter', [SocialController::class, 'twitterRedirect']);
    Route::get('auth/twitter/callback', [
        SocialController::class,
        'loginWithTwitter',
    ]);

    Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
    Route::get('auth/facebook/callback', [
        SocialController::class,
        'loginWithFacebook',
    ]);
});

/*
 * User Routes
 */

Route::get('account/dashboard', [DashboardController::class, 'index'])
    ->name('account.dashboard');

Route::get('account/details', [AccountController::class, 'index'])
    ->name('account.details');

Route::get('account/bounties', [\App\Http\Controllers\User\BountyController::class, 'index'])
    ->name('account.bounties');

Route::get('account/deals', [\App\Http\Controllers\User\DealController::class, 'index'])
    ->name('account.deals');


Route::get('account/warnings', [WarnController::class, 'index'])
    ->name('account.warnings');

Route::get('account/warnings/show/{id}', [WarnController::class, 'show'])
    ->name('account.warnings.show');

Route::get('account/points', [
    'as' => 'account.points',
    'uses' => 'UserPointsController',
]);

Route::get('account/watchlist', [
    'as' => 'account.watchlist',
    'uses' => 'App\Http\Controllers\WatchlistController@index',
]);


/**
 * Follow Routes
 */

Route::get('account/following', [FollowController::class, 'index'])
    ->name('account.following');

Route::delete('account/follow/delete/{id}', [
    'as' => 'follow.delete',
    'uses' => '\App\Http\Controllers\FollowController@destroy',
]);

Route::post('follow/store/{id}', [
    'as' => 'follow.store',
    'uses' => '\App\Http\Controllers\FollowController@store',
]);


Route::get('account/notifications', [NotificationController::class, 'index'])
    ->name('account.notifications');

Route::get('account/notifications/show/{id}', [
    'as' => 'notification.show',
    'uses' => '\App\Http\Controllers\User\NotificationController@show',
]);

Route::delete('account/notifications/delete/{id}', [
    'as' => 'notification.delete',
    'uses' => '\App\Http\Controllers\User\NotificationController@destroy',
]);


Route::put('account/update/{id}', [
    'as' => 'account.update',
    'uses' => '\App\Http\Controllers\User\AccountController@update',
]);

Route::delete('filepond/revert', [
    'as' => 'filepond.revert',
    'uses' => '\App\Http\Controllers\DeleteTempFilesController@delete',
]);
