<?php

namespace App\Http\Middleware;

use App\Models\ChMessage;
use App\Models\Page;
use App\Models\User;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    //protected $rootView = 'app';

    public function rootView(Request $request)
    {
        if ($request->is(['admin/*'])) {
            return 'admin';
        }

        return 'app';
    }

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param Request $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param Request $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'points' => User::getPoints(),
            'watchlistCount' => Watchlist::total(),
            'headerMenu' => Page::headerMenu(),
            'footerMenu' => Page::footerMenu(),
            'unseen' => ChMessage::unseenCount(),
            'admin' => fn() => $request->user()
                ? $request->user()->hasRole('admin')
                : null,
            'loggedin' => fn() => (bool)$request->user(),
            'auth.user' => fn() => $request->user()
                ? $request->user()->only('id', 'name', 'email')
                : null,
            'flash' => function () use ($request) {
                return [
                    'success' => $request->session()->get('success'),
                    'error' => $request->session()->get('error'),
                ];
            },
        ]);
    }
}