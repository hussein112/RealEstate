<x-user-layout>
    <x-slot name="header">
        <x-half-header></x-half-header>
    </x-slot>
    <x-slot name="main">
        <div class="container">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
{{--                <div>--}}
{{--                    <label for="email">Email</label>--}}
{{--                    <input type="email" placeholder="email" class="form-control" name="email">--}}
{{--                                <x-input-label for="email" :value="__('Email')" />--}}
{{--                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />--}}
{{--                                <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--                </div>--}}

                <!-- Password -->
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="name@example.com">
                    <label for="password">Password</label>
                </div>
{{--                <div class="mt-4">--}}
{{--                    <label for="password">Password</label>--}}
{{--                    <input type="password" class="form-control" name="password">--}}
{{--                                <x-input-label for="password" :value="__('Password')" />--}}
{{--                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />--}}
{{--                                <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--                </div>--}}

                <!-- Confirm Password -->
                <div class="form-floating mb-3">
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirm" placeholder="name@example.com">
                    <label for="password_confirm">Confirm Password</label>
                </div>
{{--                <div class="mt-4">--}}
{{--                    <label for="confirmation">Confirm Password</label>--}}
{{--                    <input type="password" class="form-control" name="password_confirmation">--}}
{{--                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--                                <x-text-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                                                    type="password"--}}
{{--                                                    name="password_confirmation" required />--}}

{{--                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />--}}
{{--                </div>--}}

                <div class="mb-4 flex-center">
                    <button type="submit" class="btn btn-primary">Reset</button>
                    {{--            <x-primary-button>--}}
                    {{--                {{ __('Reset Password') }}--}}
                    {{--            </x-primary-button>--}}
                </div>
            </form>
        </div>
    </x-slot>

</x-user-layout>
