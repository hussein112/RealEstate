<x-admin-layout>

    <x-slot name="main">
        <main class="container">
            <x-page-title title="employee" subtitle="add new employee"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <form action="{{ route('a-newEmployee') }}" method="post" enctype="multipart/form-data">
                @csrf
                @vite('resources/js/admin/passwords.js')
                <div class="mb-3 row">
                    <label for="fname" class="col-form-label col-sm-2">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Full Name" name="fullname" autocomplete="off" id="fname">
                    </div>
                    @if($errors->has('fullname'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('fullname')) }}</div>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <label for="password" class="col-form-label col-sm-2">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" aria-label="Password" aria-describedby="showpass">
                    <span class="input-group-text" id="showpass">
                        <iconify-icon icon="bx:hide" id="passicon"></iconify-icon>
                    </span>
                    @if($errors->has('password'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('password')) }}</div>
                    @endif
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input autocomplete="off" id="email" class="form-control" type="email" placeholder="Email" name="email">
                    </div>
                    @if($errors->has('email'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('email')) }}</div>
                    @endif
                </div>

                <div class="mb-3 row">
                    <label for="phone" class="col-form-label col-sm-2">Phone</label>
                    <div class="col-sm-10">
                        <input autocomplete="off" id="phone" class="form-control my-2" type="tel" name="phone" placeholder="Phone Number">
                    </div>
                    @if($errors->has('phone'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('phone')) }}</div>
                    @endif
                </div>
                <div class="mb-3 row">
                    <label for="stmt" class="col-sm-2 col-form-label">Statement</label>
                    <div class="col-sm-10">
                        <textarea name="stmt" id="stmt" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    @if($errors->has('stmt'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('stmt')) }}</div>
                    @endif
                </div>
                <div class="d-flex flex-column flex-lg-row my-2">
                    <div class="new-avatar w-100 my-2">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input class="form-control form-control-lg" id="avatar" type="file" name="avatar">
                    </div>
                    @if($errors->has('avatar'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('avatar')) }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </main>
    </x-slot>

</x-admin-layout>
