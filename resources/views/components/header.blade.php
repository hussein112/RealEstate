<header class="{{ $page }}-header">
    @include('layouts.navigation')
    <x-advanced-search :types="$types" :fors="$fors" :wheres="$wheres"></x-advanced-search>
    @if(Auth::guard("web") !== null)
        <div class="cta container center">
            <a href="{{ route("createAccount") }}" class="btn btn-primary my-1">
                Sign Up
            </a>
        </div>
    @endisset
    <div class="header-bg"></div>
</header>
