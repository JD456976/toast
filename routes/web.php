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

    Route::post('bounty/comment/store/{id}', [
        'as' => 'bounty.comment.store',
        'uses' => 'BountyCommentController@store',
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
