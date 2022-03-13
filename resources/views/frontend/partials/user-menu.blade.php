<div class="header-action-icon-2">
    <a href="#">
        <img class="svgInject" alt="Nest"
             src="{{ asset('assets/frontend/imgs/theme/icons/icon-user.svg') }}"/>
    </a>
    <a href="#"><span class="lable ml-0">Account</span></a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
        <ul>
            @guest()
                <li><a href="{{ route('login') }}"><i class="fi fi-rs-user mr-10"></i>Login</a></li>
                <li><a href="{{ route('register') }}"><i class="fi fi-rs-location-alt mr-10"></i>Register</a></li>
            @endguest
            @auth
                @role('admin')
                <li><a href="{{ route('admin.dashboard') }}"><i class="fi fi-rs-lock-alt mr-10"></i>Admin Dashboard</a>
                </li>
                @endrole
                <li><a href="{{ route('user.edit', $currentUser->id) }}"><i class="fi fi-rs-user mr-10"></i>My
                        Account</a></li>
                <li><a href="{{ route('deal.create') }}"><i class="fi fi-rs-label mr-10"></i>Post New Deal</a></li>
                <li><a href="{{ route('watchlist.show', $currentUser->id) }}"><i class="fi fi-rs-heart mr-10"></i>My
                        Watchlist</a>
                </li>
                </li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</div>
