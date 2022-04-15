<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BountyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
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
    'uses' => 'App\Http\Controllers\HomeController@index',
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
    'uses' => 'App\Http\Controllers\PageShowController',
]);


/*
 * Blog Routes
 */
Route::resource('blog', BlogController::class);

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

/*
 * Contact Form Routes
 */
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact/', 'show')->name('contact.show');
    Route::post('/contact/send', 'store')->name('contact.store')->middleware(['throttle:contact-store']);
});

Route::middleware(['auth'])->group(function () {

    /*
     * User Routes
     */
    Route::resource('user', UserController::class)->except(['index', 'create', 'store']);

    Route::get('user/{id}/points', [
        'as' => 'user.points',
        'uses' => 'UserPointsController',
    ]);

    /*
     * User Follow Routes
     */
    Route::get('follow/store/{id}', [
        'as' => 'follow.store',
        'uses' => 'App\Http\Controllers\FollowController@store',
    ]);
    Route::get('follow/update/{id}', [
        'as' => 'follow.update',
        'uses' => 'App\Http\Controllers\FollowController@update',
    ]);
    Route::delete('follow/destroy/{id}', [
        'as' => 'follow.destroy',
        'uses' => 'App\Http\Controllers\FollowController@destroy',
    ]);
    Route::get('follow/{id}', [
        'as' => 'follow.user',
        'uses' => 'App\Http\Controllers\FollowUserController',
    ]);
    Route::get('unfollow/{id}', [
        'as' => 'unfollow.user',
        'uses' => 'App\Http\Controllers\UnfollowUserController',
    ]);

    /*
     * Watchlist Routes
     */
    Route::get('watchlist/activate/{id}', [
        'as' => 'watchlist.activate',
        'uses' => 'App\Http\Controllers\WatchlistActivateController',
    ]);
    Route::get('watchlist/deactivate/{id}', [
        'as' => 'watchlist.deactivate',
        'uses' => 'App\Http\Controllers\WatchlistDeactivateController',
    ]);
    Route::get('watchlist/store/{id}', [
        'as' => 'watchlist.store',
        'uses' => 'App\Http\Controllers\WatchlistController@store',
    ]);
    Route::get('watchlist/show/{id}', [
        'as' => 'watchlist.show',
        'uses' => 'App\Http\Controllers\WatchlistController@show',
    ]);
    Route::delete('watchlist/destroy/{id}', [
        'as' => 'watchlist.destroy',
        'uses' => 'App\Http\Controllers\WatchlistController@destroy',
    ]);

    /*
    * Deal Related Routes
    */
    Route::get('deal/approve/{slug}', [
        'as' => 'deal.approve',
        'uses' => 'App\Http\Controllers\ApproveDealController',
    ]);

    Route::get('deal/unapprove/{slug}', [
        'as' => 'deal.unapprove',
        'uses' => 'App\Http\Controllers\UnapproveDealController',
    ]);

    Route::get('deal/feature/{slug}', [
        'as' => 'deal.feature',
        'uses' => 'App\Http\Controllers\FeatureDealController',
    ]);

    Route::get('deal/unfeature/{slug}', [
        'as' => 'deal.unfeature',
        'uses' => 'App\Http\Controllers\UnfeatureDealController',
    ]);

    Route::get('deal/frontpage/{slug}', [
        'as' => 'deal.frontpage',
        'uses' => 'App\Http\Controllers\ShowFrontDealController',
    ]);

    Route::get('deal/unfrontpage/{slug}', [
        'as' => 'deal.unfrontpage',
        'uses' => 'App\Http\Controllers\RemoveFrontDealController',
    ]);

    Route::resource('deal', DealController::class);

    Route::post('deal/comment/store/{id}', [
        'as' => 'deal.comment.store',
        'uses' => 'DealCommentController@store',
    ]);

    Route::post('report/deal/{id}', [
        'as' => 'report.deal',
        'uses' => 'ReportDealController',
    ]);

    Route::post('report/comment/{id}', [
        'as' => 'report.comment',
        'uses' => 'ReportCommentController',
    ]);

    /*
     * Bounty Related Routes
     */
    Route::resource('bounty', BountyController::class);

    Route::post('report/bounty/{id}', [
        'as' => 'report.bounty',
        'uses' => 'ReportBountyController',
    ]);

    Route::get('bounty/feature/{slug}', [
        'as' => 'bounty.feature',
        'uses' => 'FeatureBountyController',
    ]);

    Route::get('bounty/unfeature/{slug}', [
        'as' => 'bounty.unfeature',
        'uses' => 'UnfeatureBountyController',
    ]);

    Route::get('bounty/verify/{slug}', [
        'as' => 'bounty.verify',
        'uses' => 'VerifyBountyController',
    ]);

    Route::get('bounty/unverify/{slug}', [
        'as' => 'bounty.unverify',
        'uses' => 'UnverifyBountyController',
    ]);

    Route::post('bounty/comment/store/{id}', [
        'as' => 'bounty.comment.store',
        'uses' => 'BountyCommentController@store',
    ]);

    Route::get('bounty/approve/{slug}', [
        'as' => 'bounty.approve',
        'uses' => 'ApproveBountyController',
    ]);

    Route::get('bounty/unapprove/{slug}', [
        'as' => 'bounty.unapprove',
        'uses' => 'UnapproveBountyController',
    ]);

    /*
     * Deal Voting Routes
     */
    Route::get('deal/voteup/{id}', [
        'as' => 'deal.voteup',
        'uses' => 'App\Http\Controllers\DealRateUpController',
    ]);

    Route::get('deal/votedown/{id}', [
        'as' => 'deal.votedown',
        'uses' => 'App\Http\Controllers\DealRateDownController',
    ]);

    /*
    * Bounty Voting Routes
    */
    Route::get('bounty/voteup/{id}', [
        'as' => 'bounty.voteup',
        'uses' => 'App\Http\Controllers\BountyRateUpController',
    ]);

    Route::get('bounty/votedown/{id}', [
        'as' => 'bounty.votedown',
        'uses' => 'App\Http\Controllers\BountyRateDownController',
    ]);

    /*
     * Notification Routes
     */
    Route::delete('notification/delete/{id}', [
        'as' => 'notification.delete',
        'uses' => 'App\Http\Controllers\NotificationController@destroy',
    ]);
    Route::patch('notification/update/{id}', [
        'as' => 'notification.update',
        'uses' => 'App\Http\Controllers\NotificationController@update',
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
