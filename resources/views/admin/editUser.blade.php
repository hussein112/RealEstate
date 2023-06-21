<x-admin-layout>
    <x-slot name="main">
        @vite('resources/js/admin/passwords.js')
        <main class="container">
            <x-page-title title="user" subtitle="edit user {{ $user->f_name . ' ' . $user->l_name }}"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <form action="{{ route('a-editUser', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                @method("PATCH")
                @csrf
                <input name="fname" class="form-control my-2" type="text" placeholder="First Name" value="{{ $user->f_name }}">
                @if($errors->has('fname'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('fname')) }}</div>
                @endif
                <input name="mname" class="form-control my-2" type="text" placeholder="Middle Name" value="{{ $user->m_name }}">
                @if($errors->has('mname'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('mname')) }}</div>
                @endif
                <input name="lname" class="form-control my-2" type="text" placeholder="Last Name" value="{{ $user->l_name }}">
                @if($errors->has('lname'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('lname')) }}</div>
                @endif
                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" aria-label="Password" aria-describedby="showpass">
                    <span class="input-group-text" id="showpass">
                        <iconify-icon icon="bx:hide" id="passicon"></iconify-icon>
                    </span>
                </div>
                @if($errors->has('password'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('password')) }}</div>
                @endif
                <input name="email" class="form-control my-2" type="email" placeholder="Email" value="{{ $user->email }}">
                @if($errors->has('email'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('email')) }}</div>
                @endif
                <input name="phone" class="form-control my-2" type="tel" placeholder="Phone Number" value="{{ $user->phone }}">
                @if($errors->has('phone'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('phone')) }}</div>
                @endif
                <div class="d-flex flex-column flex-lg-row my-2">
                    <div class="previous-avatar w-100 my-2">
                        <img src="{{ asset('storage/' . $user->avatar->image) }}" alt="Avatar" class="change-user-image">
                    </div>
                    <div class="new-avatar w-100 my-2">
                        <label for="avatar" class="form-label">New Avatar</label>
                        <input class="form-control form-control-lg" id="avatar" type="file" name="avatar">
                    </div>
                </div>
                @if($errors->has('avatar'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('avatar')) }}</div>
                @endif
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </main>
    </x-slot>
</x-admin-layout>
