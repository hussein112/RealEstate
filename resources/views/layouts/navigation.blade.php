<nav class="navbar navbar-expand-xl">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse links flex flex-column flex-lg-row" id="navbar">
            <div class="navigation navbar-nav">
                <!-- Logo -->
                <div class="nav-link">
                    <a href="{{ route('a-dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <a href="{{ route("home") . '#featured-properties' }}" class="nav-link">Feauterd Properties</a>
                <a href="{{ route("home") . '#latest-properties' }}" class="nav-link">Latest Properties</a>
                <a href="{{ route("home") . '#latest-news' }}" class="nav-link">Latest News</a>
            </div>

            <div class="cta navbar-nav">
                <a href="{{ route("propertiesForBuy") }}" class="nav-link">Buy</a>
                <a href="{{ route("propertiesForRent") }}" class="nav-link">Rent</a>
                <a href="{{ route("sell") }}" class="nav-link">Sell</a>
                <a href="{{ route("contact") }}" class="nav-link">Contact Us</a>
                @guest
                    <a href="{{ route("u-login") }}" class="nav-link">Sign-in</a>
                    <a href="{{ route("register") }}" class="nav-link">Register</a>
                @endguest
                @auth
                    <a href="{{ route("logout") }}" class="nav-link">Log Out</a>
                @endauth
                <a href="{{ route("newValuation") }}" class="nav-link">Get a Valuation</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        EN
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">AR</a></li>
                    </ul>
                </li>
                <li class="nav-item colors mx-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="theme">
                        <label class="form-check-label" for="theme">Theme</label>
                    </div>
                </li>
            </div>
        </div>
    </div>
</nav>
