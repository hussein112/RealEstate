<x-user-layout>
    <x-slot name="header">
        <x-half-header></x-half-header>
    </x-slot>
    <x-slot name="main">
        <form class="container flex flex-column flex-wrap" action="{{ route("register") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
                <label for="fname">First Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="mname" id="mname" class="form-control" placeholder="Middle Name">
                <label for="mname">Middle Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
                <label for="lname">Last Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                <label for="phone">Phone</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <div class="d-flex flex-column flex-lg-row my-2">
                <div class="new-avatar w-100 my-2">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input class="form-control form-control-lg" id="avatar" type="file" name="avatar">
                </div>
            </div>
            <small class="form-text text-muted law-notice">By Clicking Sign Up You Agree to our <a href="{{ route("terms") }}">Terms of Service</a></small>
            <button type="submit" class="btn btn-primary m-2">Sign Up</button>
        </form>
    </x-slot>
</x-user-layout>
