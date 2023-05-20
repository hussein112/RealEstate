<x-user-layout>
    <x-slot name="header">
        <x-half-header></x-half-header>
    </x-slot>
    <x-slot name="main">
        <form class="container d-flex flex-column flex-wrap" action="{{ route("register") }}" method="post" enctype="multipart/form-data">
            @csrf
            @vite('resources/js/admin/passwords.js')
            <div class="form-floating mb-3">
                <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required>
                <label for="fname">First Name</label>
                @if($errors->has('fname'))
                    <div class="error text-danger">* {{$errors->first('fname')}}</div>
                @endif
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="mname" id="mname" class="form-control" placeholder="Middle Name" required>
                <label for="mname">Middle Name</label>
                @if($errors->has('mname'))
                    <div class="error text-danger">* {{$errors->first('mname')}}</div>
                @endif
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required>
                <label for="lname">Last Name</label>
                @if($errors->has('lname'))
                    <div class="error text-danger">* {{$errors->first('lname')}}</div>
                @endif
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                <label for="email">Email address</label>
                @if($errors->has('email'))
                    <div class="error text-danger">* {{$errors->first('email')}}</div>
                @endif
            </div>
            <div class="mb-3 d-flex flex-column align-items-start">
                <div class="d-flex align-items-center">
                    <iconify-icon class="display-4" icon="twemoji:flag-lebanon"></iconify-icon>
                    <input type="text" name="phone" id="phone" class="form-control w-auto mx-2" placeholder="03 123 456" required>
                </div>
                @if($errors->has('phone'))
                    <div class="error text-danger">* {{$errors->first('phone')}}</div>
                @endif
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <span class="input-group-text" id="showpass">
                    <iconify-icon icon="bx:hide" id="passicon"></iconify-icon>
                </span>
                @if($errors->has('password'))
                    <div class="error text-danger">* {{$errors->first('password')}}</div>
                @endif
            </div>
            <div class="d-flex flex-column flex-lg-row my-2">
                <div class="new-avatar w-100 my-2">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input class="form-control form-control-lg" id="avatar" type="file" name="avatar" accept="image/png, image/jpeg, image/jpg">
                    @if($errors->has('avatar'))
                        <div class="error text-danger">* {{$errors->first('avatar')}}</div>
                    @endif
                </div>

            </div>
            <div class="d-flex flex-column align-items-center my-2">
                <small class="form-text text-muted law-notice">By Clicking Sign Up You Agree to our <a href="{{ route("terms") }}">Terms of Service</a></small>
                <button type="submit" class="btn btn-primary m-2">Sign Up</button>
            </div>
        </form>
    </x-slot>

</x-user-layout>
