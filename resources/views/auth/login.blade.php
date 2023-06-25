<x-auth-layout>
    <x-slot name="form">
        <form action="{{ route('u-login') }}" method="post" class="container flex flex-column flex-wrap">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="mb-3">
                <a href="{{ route("password.request") }}">Forgot Password?</a>
            </div>
            <div class="form-check mb-3">
                <input name="remember" class="form-check-input" type="checkbox" id="remember">
                <label class="form-check-label" for="remember">
                    Remember Me
                </label>
            </div>
            @if($errors->any)
                @foreach($errors->all() as $error)
                    <strong class="text-danger">* {{ $error }}</strong>
                @endforeach
            @endif
            <button type="submit" class="btn btn-primary m-2">Login</button>
        </form>
    </x-slot>
</x-auth-layout>
