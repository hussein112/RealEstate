<x-admin-layout>
    <x-slot name="main">
        <main class="admin-edit-profile container">

            <x-page-title title="profile" subtitle="edit profile"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>

            <div class="data">
                @isset($admin)
                    @vite('resources/js/admin/passwords.js')
                    <form action="{{ route("a-editAdmin", ['id' => $admin->id]) }}" method="post" class="d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                        @method("PATCH")
                        @csrf
                        <div class="image w-20 m-2">
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $admin->avatar->image) }}" alt="Admin Profile" loading="lazy">
                                <input class="form-control" type="file" id="newavatar" name="avatar">
                                @if($errors->has('avatar'))
                                    <div class="error text-danger">* {{$errors->first('avatar')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="other w-75 m-2">
                            <div class="mb-3 row">
                                <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" id="fname" name="fname" class="form-control" type="text" placeholder="First Name" value="{{ $admin->f_name }}">
                                </div>
                                @if($errors->has('fname'))
                                    <div class="error text-danger">* {{$errors->first('fname')}}</div>
                                @endif
                            </div>
                            <div class="mb-3 row">
                                <label for="mname" class="col-sm-2 col-form-label">Middle Name</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" id="mname" name="mname" type="text" class="form-control" placeholder="Middle Name" value="{{ $admin->m_name }}">
                                </div>
                                @if($errors->has('mname'))
                                    <div class="error text-danger">* {{$errors->first('mname')}}</div>
                                @endif
                            </div>
                            <div class="mb-3 row">
                                <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" id="lname" name="lname" class="form-control my-2" type="text" placeholder="Last Name" value="{{ $admin->l_name }}">
                                </div>
                                @if($errors->has('lname'))
                                    <div class="error text-danger">* {{$errors->first('lname')}}</div>
                                @endif
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" id="email" name="email" class="form-control my-2" type="email" placeholder="Email" value="{{ $admin->email }}">
                                </div>
                                @if($errors->has('email'))
                                    <div class="error text-danger">* {{$errors->first('email')}}</div>
                                @endif
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" id="phone" name="phone" class="form-control my-2" type="tel" placeholder="Phone Number" value="{{ $admin->phone }}">
                                </div>
                                @if($errors->has('phone'))
                                    <div class="error text-danger">* {{$errors->first('phone')}}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                @endisset
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changePassword">
                Change Password
            </button>
            <div class="modal" id="changePassword" tabindex="-1" aria-labelledby="#changePassword" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route("a-editAdminPassword", ['id' => $admin->id]) }}">
                                @csrf
                                @method('patch')
                                <input type="password" name="old" class="form-control" placeholder="Old Password" required>
                                <input type="password" name="new" class="form-control" placeholder="New Password" required>
                                <button class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </x-slot>
</x-admin-layout>
