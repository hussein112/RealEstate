<x-user-layout>
    <x-slot name="header">
        <x-half-header></x-half-header>
    </x-slot>

    <x-slot name="main">
        <div class="container">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 flex-center">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div>
                        <button type="submit" class="btn btn-primary">{{ __('Resend Verification Email') }}</button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="mb-3">
                    @csrf
                    <button type="submit" class="btn btn-info">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

</x-user-layout>
