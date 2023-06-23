<x-admin-layout>
    <x-slot name="main">
        <main class="admin-property container">
            <x-page-title title="user" subtitle="add new user"></x-page-title>

            <div class="container my-5">
                <hr>
                <x-messages msg="success_msg" type="success"></x-messages>
                <form action="{{ route('a-newUser') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control my-2" type="text" placeholder="First Name" name="fname" maxlength="40" required>
                    @if($errors->has('fname'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('fname')) }}</div>
                    @endif
                    <input class="form-control my-2" type="text" placeholder="Middle Name" name="mname" maxlength="40" required>
                    @if($errors->has('mname'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('mname')) }}</div>
                    @endif
                    <input class="form-control my-2" type="text" placeholder="Last Name" name="lname" maxlength="40" required>
                    @if($errors->has('lname'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('lname')) }}</div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" aria-label="Password" aria-describedby="showpass" required>
                        <span class="input-group-text" id="showpass">
                            <iconify-icon icon="bx:hide" id="passicon"></iconify-icon>
                        </span>
                        @if($errors->has('password'))
                            <div class="error text-danger">* {{ ucfirst($errors->first('password')) }}</div>
                        @endif
                    </div>
                    <input class="form-control my-2" type="email" placeholder="Email" name="email" maxlength="70" required>
                    @if($errors->has('email'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('email')) }}</div>
                    @endif
                    <input class="form-control my-2" type="tel" placeholder="Phone Number" name="phone" pattern="^[0-9]+ [0-9]* [0-9]{3,}$" required>
                    @if($errors->has('phone'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('phone')) }}</div>
                    @endif
                    <div class="d-flex flex-column flex-lg-row my-2">
                        <div class="new-avatar w-100 my-2">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input class="form-control form-control-lg" id="avatar" type="file" name="avatar">
                        </div>
                        @if($errors->has('avatar'))
                            <div class="error text-danger">* {{ ucfirst($errors->first('avatar')) }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </main>
    </x-slot>
</x-admin-layout>
