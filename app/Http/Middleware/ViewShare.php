<?php

namespace App\Http\Middleware;

use App\Models\Announcement;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ViewShare
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $announcements = Announcement::active();
        View::share('announcements', $announcements);

        //Share Logged In User
        $user = Auth::check() ? Auth::user() : false;
        view()->share('currentUser', $user);

        return $next($request);
    }
}
