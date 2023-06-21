<x-admin-layout>
    <x-slot name="main">
        <main class="container">
            <x-page-title title="admin" subtitle="add new admin"></x-page-title>
            <x-messages msg="success_msg" type="success"></x-messages>
            <x-messages msg="error_msg" type="error"></x-messages>
            <hr>
            <form action="{{ route('a-newAdmin') }}" method="post" enctype="multipart/form-data">
                @csrf
                @vite('resources/js/admin/passwords.js')
                <input class="form-control my-2" type="text" placeholder="First Name" name="fname" required>
                @if($errors->has('fname'))
                    <div class="error text-danger">* {{$errors->first('fname')}}</div>
                @endif
                <input class="form-control my-2" type="text" placeholder="Middle Name" name="mname" required>
                @if($errors->has('mname'))
                    <div class="error text-danger">* {{$errors->first('mname')}}</div>
                @endif
                <input class="form-control my-2" type="text" placeholder="Last Name" name="lname" required>
                @if($errors->has('lname'))
                    <div class="error text-danger">* {{$errors->first('lname')}}</div>
                @endif
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" aria-label="Password" aria-describedby="showpass" required>
                    <span class="input-group-text" id="showpass">
                        <iconify-icon icon="bx:hide" id="passicon"></iconify-icon>
                    </span>
                </div>
                @if($errors->has('password'))
                    <div class="error text-danger">* {{$errors->first('password')}}</div>
                @endif
                <input class="form-control my-2" name="email" type="email" placeholder="Email" required>
                @if($errors->has('email'))
                    <div class="error text-danger">* {{$errors->first('email')}}</div>
                @endif
                <div class="d-flex align-items-center">
                    <iconify-icon class="display-4" icon="twemoji:flag-lebanon"></iconify-icon>
                    <input type="text" name="phone" id="phone" class="form-control w-auto mx-2" placeholder="03 123 456" required>
                </div>
                @if($errors->has('phone'))
                    <div class="error text-danger">* {{$errors->first('phone')}}</div>
                @endif
                <div class="mb-3">
                    <label for="image" class="form-label">Choose a Profile</label>
                    <input class="form-control" type="file" id="image" name="avatar" accept="jpg,png,jpeg">
                    @if($errors->has('avatar'))
                        <div class="error text-danger">* {{$errors->first('avatar')}}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </main>
    </x-slot>
</x-admin-layout>
