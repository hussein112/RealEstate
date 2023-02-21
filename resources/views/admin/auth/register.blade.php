<x-auth-layout>
    <!-- Session Status -->
    {{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}
    <x-slot name="form">
        <form action="" method="post" class="container flex flex-column flex-wrap">
            <div class="form-floating mb-3">
                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" required>
                <label for="fullname">Full Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                <label for="username">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <small class="form-text text-muted law-notice">By Clicking Sign Up You Agree to our <a href="/terms.html">Terms of Service</a></small>
            <button type="submit" class="btn btn-primary m-2">Sign Up</button>
        </form>
    </x-slot>
</x-auth-layout>
