<header class="{{ $page }}-header">
    @include('layouts.navigation')
    <x-advanced-search :types="$types" :fors="$fors" :wheres="$wheres"></x-advanced-search>
    @guest
        <div class="cta container center">
            <a href="{{ route("register") }}" class="btn btn-primary my-1">
                Sign Up
            </a>
        </div>
    @endguest
    <div class="header-bg"></div>
</header>
