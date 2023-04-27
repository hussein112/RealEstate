<x-user-layout>
    <x-slot name="header">
        <x-half-header></x-half-header>
    </x-slot>
    <x-slot name="main">
        <div class="container flex flex-column mb-4">
            <div class="mb-4">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <!-- Returned Messages From Controller -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form method="POST" action="{{ route('password.email') }}" class="w-50">
                @csrf
                <!-- Email Address -->
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                {{--            <x-input-label for="email" :value="__('Email')" />--}}
                {{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
                {{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="btn btn-primary">Email Password Reset Link</button>
                    {{--            <x-primary-button>--}}
                    {{--                {{ __('Email Password Reset Link') }}--}}
                    {{--            </x-primary-button>--}}
                </div>
            </form>
        </div>
    </x-slot>
</x-user-layout>
