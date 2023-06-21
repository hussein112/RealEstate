<x-admin-layout>
    <x-slot name="main">
        @vite('resources/js/admin/passwords.js')
        <main class="container">
            <x-page-title title="employee" subtitle="edit employee #{{ $employee->full_name }}"></x-page-title>
            <div class="container my-5">
                <hr>
                <x-messages msg="error_msg" type="danger"></x-messages>
                <x-messages msg="success_msg" type="success"></x-messages>
                <form action="{{ route('a-editEmployee', ['id' => $employee->id]) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3 row">
                        <label for="fname" class="col-form-label col-sm-2">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Full Name" name="fullname" value="{{ $employee->full_name }}" autocomplete="off" id="fname">
                        </div>
                        @if($errors->has('fullname'))
                            <div class="error text-danger">* {{ ucfirst($errors->first('fullname')) }}</div>
                        @endif
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input autocomplete="off" id="email" class="form-control" type="email" placeholder="Email" name="email" value="{{ $employee->email }}">
                        </div>
                        @if($errors->has('email'))
                            <div class="error text-danger">* {{ ucfirst($errors->first('email')) }}</div>
                        @endif
                    </div>

                    <div class="mb-3 row">
                        <label for="phone" class="col-form-label col-sm-2">Phone</label>
                        <div class="col-sm-10">
                            <input autocomplete="off" id="phone" class="form-control my-2" type="tel" name="phone" placeholder="Phone Number" value="{{ $employee->phone }}">
                        </div>
                        @if($errors->has('phone'))
                            <div class="error text-danger">* {{ ucfirst($errors->first('phone')) }}</div>
                        @endif
                    </div>
                    <div class="mb-3 row">
                        <label for="stmt" class="col-sm-2 col-form-label">Statement</label>
                        <div class="col-sm-10">
                            <textarea name="stmt" id="stmt" cols="30" rows="10" class="form-control">{{ $employee->statement }}</textarea>
                        </div>
                        @if($errors->has('stmt'))
                            <div class="error text-danger">* {{ ucfirst($errors->first('stmt')) }}</div>
                        @endif
                    </div>
                    <div class="d-flex flex-column flex-lg-row my-2">
                        <div class="previous-avatar w-100 my-2">
                            <img src="{{ asset("storage/" . $employee->avatar->image) }}" alt="Avatar" class="change-user-image">
                        </div>
                        <div class="new-avatar w-100 my-2">
                            <label for="avatar" class="form-label">New Avatar</label>
                            <input class="form-control form-control-lg" id="avatar" type="file">
                        </div>
                        @if($errors->has('avatar'))
                            <div class="error text-danger">* {{ ucfirst($errors->first('avatar')) }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </main>
    </x-slot>
</x-admin-layout>
