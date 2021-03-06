<?php

namespace App\Http\Middleware;

use App\Models\Announcement;
use App\Models\Page;
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
    public function handle($request, Closure $next): mixed
    {
        $announcements = Announcement::active();
        View::share('announcements', $announcements);

        //Share Logged In User
        $user = Auth::check() ? Auth::user() : false;
        View::share('currentUser', $user);

        //Menu Items
        $header = Page::headerMenu();
        $footer = Page::footerMenu();
        View::share(['header' => $header, 'footer' => $footer]);


        return $next($request);
    }
}
