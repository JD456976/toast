<?php


use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BountyCommentController;
use App\Http\Controllers\BountyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DealCommentController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TagController;
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
Route::resource('page', PageController::class)->only(['index', 'show']);

/*
 * Blog Comment Routes
 */
Route::resource('blog-comment', BlogCommentController::class)->only(['store', 'destroy']);

/*
 * Blog Routes
 */
Route::resource('blog', BlogController::class)->only(['index', 'show']);

Route::get('blog/category/{id}', [
    'as' => 'blog.category',
    'uses' => 'BlogCategoryController',
]);

Route::post('report/blog/comment/{id}', [
    'as' => 'report.blog.comment',
    'uses' => 'ReportBlogCommentController',
])->middleware(['throttle:report']);

/*
 * Tag Routes
 */
Route::resource('tag', TagController::class);

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
    Route::resource('user', UserController::class)->only(['show', 'destroy']);


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
    Route::resource('deal', DealController::class);

    /*
    * Deal Comment Related Routes
    */
    Route::resource('deal-comment', DealCommentController::class)->only(['store', 'destroy'])
        ->middleware(['throttle:comment-store']);

    Route::post('report/deal/{id}', [
        'as' => 'report.deal',
        'uses' => 'ReportDealController',
    ])->middleware(['throttle:report']);

    Route::post('report/deal/comment/{id}', [
        'as' => 'report.deal.comment',
        'uses' => 'ReportDealCommentController',
    ])->middleware(['throttle:report']);

    Route::post('deal/rate/{id}', [
        'as' => 'deal.rate',
        'uses' => 'DealRateController',
    ]);

    /*
     * Bounty Related Routes
     */
    Route::post('report/bounty/{id}', [
        'as' => 'report.bounty',
        'uses' => 'ReportBountyController',
    ]);

    Route::post('bounty/rate/{id}', [
        'as' => 'bounty.rate',
        'uses' => 'BountyRateController',
    ]);

    Route::post('report/bounty/comment/{id}', [
        'as' => 'report.bounty.comment',
        'uses' => 'ReportBountyCommentController',
    ])->middleware(['throttle:report']);


    /*
     * Bounty CommentRelated Routes
     */
    Route::resource('bounty-comment', BountyCommentController::class)->only(['store', 'destroy']);

    Route::resource('bounty', BountyController::class);


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

    Route::get('auth/discord', [SocialController::class, 'discordRedirect']);
    Route::get('auth/discord/callback', [
        SocialController::class,
        'loginWithDiscord',
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
