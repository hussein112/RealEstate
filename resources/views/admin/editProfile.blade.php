<x-admin-layout>
    @vite('resources/js/admin/passwords.js');

    <x-slot name="main">
        <main class="admin-property container">
            @isset($error_message)
                {{--        Nothing to Update--}}
                <div class="bg-errors">
                    <strong>{{ $error_message }}</strong>
                </div>
            @endisset

            @isset($sucess_message)
                {{--        Nothing to Update--}}
                <div class="bg-success">
                    <strong>{{ $sucess_message }}</strong>
                </div>
            @endisset


            <h4 class="title my-2 center">Edit Admin <strong>{{ $admin->f_name . ' ' . $admin->l_name }}</strong></h4>
            <div class="container my-5">
                <hr>
                <form action="{{ route("a-editAdmin", ['id' => $admin->id]) }}" method="post">
                    @method("PATCH")
                    @csrf
                    <input class="form-control my-2" type="text" placeholder="First Name" name="fname" value="{{ $admin->f_name }}">
                    <input class="form-control my-2" type="text" placeholder="Middle Name" name="mname" value="{{ $admin->m_name }}">
                    <input class="form-control my-2" type="text" placeholder="Last Name" name="lname" value="{{ $admin->l_name }}">
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password" aria-label="Password" aria-describedby="showpass">
                        <span class="input-group-text" id="showpass">
                        <iconify-icon icon="bx:hide" id="passicon"></iconify-icon>
                    </span>
                    </div>
                    <input class="form-control my-2" type="email" placeholder="Email" name="email" value="{{ $admin->email }}">
                    <input class="form-control my-2" type="tel" placeholder="Phone Number" name="phone" value="{{ $admin->phone }}">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </main>
    </x-slot>

</x-admin-layout>
