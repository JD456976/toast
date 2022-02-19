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
        @auth
            @role('administrator')
            <li class="menu-item">
                <a href="{{ route('admin.dashboard') }}" class="menu-link">Admin</a>
            </li>
            @endrole
        @endauth
    </ul>
</nav>
<!-- #primary-menu end -->
