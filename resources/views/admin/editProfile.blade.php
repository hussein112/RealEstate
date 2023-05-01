<x-admin-layout>
    <x-slot name="main">
        <main class="admin-property container">
            <x-page-title title="profile" subtitle="edit profile"></x-page-title>
            <div class="container my-5">
                <x-messages msg="error_msg" type="danger"></x-messages>
                <x-messages msg="success_msg" type="success"></x-messages>
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
