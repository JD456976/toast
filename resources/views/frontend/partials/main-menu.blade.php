<!-- Primary Navigation
                ============================================= -->
<nav class="primary-menu">

    <ul class="menu-container">
        <li class="menu-item">
            <a class="menu-link" href="/">
                <div>Home</div>
            </a>
        </li>
        @guest
            <li class="menu-item">
                <a href="{{ route('login') }}" class="menu-link">Login</a>
            </li>
            <li class="menu-item">
                <a href="{{ route('register') }}" class="menu-link">Register</a>
            </li>
        @endguest
            @role('admin')
            <li class="menu-item">
                <a dusk="admin-link" href="{{ route('admin.dashboard') }}" class="menu-link">Admin</a>
            </li>
            @endrole
        @auth
        <li class="menu-item">
            <a dusk="user-dropdown" class="menu-link" href="#"><div>{{ Auth::user()->name }}</div></a>
            <ul class="sub-menu-container">
                <li class="menu-item">
                    <a class="menu-link" href="intro.html#section-niche"><div>Niche Demos</div></a>
                </li>
                <li class="menu-item justify-content-center">
                    {!! Form::open(['route' => 'logout', 'method' => 'post']) !!}
                    {!! Form::submit('Logout', ['class' => 'button button-3d button-mini button-rounded button-black']) !!}
                    {!! Form::close() !!}
                </li>
            </ul>
        </li>
            @endauth
    </ul>
</nav>
<!-- #primary-menu end -->
