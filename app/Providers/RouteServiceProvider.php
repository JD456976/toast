<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/web.php'));

            Route::middleware(['web', 'role:admin', 'auth'])
                ->namespace('App\Http\Controllers\Admin')
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('contact-store', function (Request $request) {
            return Limit::perHour(1)->by(optional($request->user())->id ?: $request->ip())
                ->response(function () {
                    Alert::toast('Your message was sent, please wait before sending another', 'warning');
                    return redirect()->back();
                });
        });

        RateLimiter::for('comment-store', function (Request $request) {
            return Limit::perMinute(1)->by(optional($request->user())->id ?: $request->ip())
                ->response(function () {
                    return redirect()->back()->with('error', 'Please limit your comments to once per minute');
                });
        });

        RateLimiter::for('report', function (Request $request) {
            return Limit::perMinute(1)->by(optional($request->user())->id ?: $request->ip())
                ->response(function () {
                    return redirect()->back()->with('error', 'Please limit your reports to once per minute');
                });
        });
    }
}
