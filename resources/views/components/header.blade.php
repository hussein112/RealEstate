<header class="{{ $page }}-header">
    @include('layouts.navigation');
    @include('layouts.advanced_search');

    @guest
    <div class="cta container center">
        <a href="signup.html" class="btn btn-primary my-1">
            Sign Up
        </a>
    </div>
    @endguest
    <div class="header-bg"></div>
</header>
