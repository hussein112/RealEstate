<x-employee.layout>
    <x-slot name="main">
        @vite('resources/js/employee/passwords.js')
        <main class="container">
            <x-page-title title="Profile" subtitle="Edit profile info"></x-page-title>
            <hr>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <form id="update-user-profile" action="{{ route('e-editEmployee', ['id' => $employee->id]) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="mb-3 row">
                    <label for="fname" class="col-form-label col-sm-2">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Full Name" name="fullname" value="{{ $employee->full_name }}" autocomplete="off" id="fname">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label for="password" class="col-form-label col-sm-2">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" aria-label="Password" aria-describedby="showpass">
                    <span class="input-group-text" id="showpass">
                <iconify-icon icon="bx:hide" id="passicon"></iconify-icon>
            </span>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input autocomplete="off" id="email" class="form-control" type="email" placeholder="Email" name="email" value="{{ $employee->email }}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="phone" class="col-form-label col-sm-2">Phone</label>
                    <div class="col-sm-10">
                        <input autocomplete="off" id="phone" class="form-control my-2" type="tel" name="phone" placeholder="Phone Number" value="{{ $employee->phone }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="stmt" class="col-sm-2 col-form-label">Statement</label>
                    <div class="col-sm-10">
                        <textarea name="stmt" id="stmt" cols="30" rows="10" class="form-control">{{ $employee->statement }}</textarea>
                    </div>
                </div>
                <div class="d-flex flex-column flex-lg-row my-2">
                    <div class="previous-avatar w-100 my-2">
                        <img src="{{ asset("storage/" . $employee->avatar->image) }}" alt="Avatar" class="change-user-image">
                    </div>
                    <div class="new-avatar w-100 my-2">
                        <label for="avatar" class="form-label">New Avatar</label>
                        <input class="form-control form-control-lg" id="avatar" type="file">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="update-profile">Update</button>
            </form>
        </main>
    </x-slot>
</x-employee.layout>
<x-confirmation-dialog title="Update Profile" body="Are you sure you want to update your profile?"></x-confirmation-dialog>
