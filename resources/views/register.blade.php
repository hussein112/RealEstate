<x-user-layout>
    <x-slot name="header">
        <x-half-header></x-half-header>
    </x-slot>

    <x-slot name="main">
        <form action="{{ route("createAccount") }}" method="post" enctype="multipart/form-data" class="container flex flex-column flex-wrap">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="f_name" id="fname" class="form-control" placeholder="First Name" required>
                <label for="fname">First Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="m_name" id="mname" class="form-control" placeholder="Middle Name" required>
                <label for="mname">Middle Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="l_name" id="lname" class="form-control" placeholder="Last Name" required>
                <label for="lname">Last Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" required>
                <label for="phone">Phone</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="d-flex flex-column flex-lg-row my-2">
                <div class="new-avatar w-100 my-2">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input class="form-control form-control-lg" id="avatar" type="file" name="avatar">
                </div>
            </div>
            <small class="form-text text-muted law-notice">By Clicking Sign Up You Agree to our <a href="/terms.html">Terms of Service</a></small>
            <button type="submit" class="btn btn-primary m-2">Sign Up</button>
        </form>
    </x-slot>
</x-user-layout>
