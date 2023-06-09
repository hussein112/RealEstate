<x-employee.layout>
    <x-slot name="main">
        <main class="admin-property container">
            <x-page-title title="user" subtitle="add new user"></x-page-title>

            <div class="container my-5">
                <hr>
                <x-messages msg="success_msg" type="success"></x-messages>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <x-error error="{{$error}}"></x-error>
                    @endforeach
                @endif
                <form action="{{ route('e-newUser') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control my-2" type="text" placeholder="First Name" name="fname">
                    <input class="form-control my-2" type="text" placeholder="Middle Name" name="mname">
                    <input class="form-control my-2" type="text" placeholder="Last Name" name="lname">
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" aria-label="Password" aria-describedby="showpass">
                        <span class="input-group-text" id="showpass">
                        <iconify-icon icon="bx:hide" id="passicon"></iconify-icon>
                    </span>
                    </div>
                    <input class="form-control my-2" type="email" placeholder="Email" name="email">
                    <input class="form-control my-2" type="tel" placeholder="Phone Number" name="phone">
                    <div class="d-flex flex-column flex-lg-row my-2">
                        <div class="new-avatar w-100 my-2">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input class="form-control form-control-lg" id="avatar" type="file" name="avatar">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </main>
    </x-slot>
</x-employee.layout>
