<x-admin-layout>
    <x-slot name="main">
        <main class="admin-edit-profile container">
            <h4 class="title my-2">Profile</h4>

            <div class="remainders">
                <div class="alert alert-danger">
                    <a href="#"><strong>Property #34234</strong></a>, Should be Valuated by Mon, 21/10/2000
                </div>
            </div>

            <h2 class="title">Edit Profile</h2>
            @if(session('success_msg') != null)
                <div class="bg-success m-2 p-5">
                    <strong class="text-dark">{{ session("success_msg") }}</strong>
                </div>
            @elseif(session('error_msg') != null)
                <div class="bg-danger m-2 p-5">
                    <strong class="text-light">{{ session("error_msg") }}</strong>
                </div>
            @endif
            <div class="data">
                @isset($admin)
                    <form action="{{ route("a-profile", ['id' => 1]) }}" method="post" class="d-flex flex-column flex-lg-row">
                        @method("PATCH")
                        @csrf
                        <div class="image w-20 m-2">
                            <!-- <iconify-icon icon="material-symbols:edit-square-outline"></iconify-icon> -->
                            <div class="mb-3">
                                <img src="https://picsum.photos/200/300" alt="" loading="lazy">
                                <label for="newavatar" class="form-label">New Avatar</label>
                                <input class="form-control" type="file" id="newavatar">
                            </div>
                        </div>
                        <div class="other w-75 m-2">
                            <div class="mb-3 row">
                                <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" id="fname" name="fname" class="form-control" type="text" placeholder="First Name" value="{{ $admin->f_name }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="mname" class="col-sm-2 col-form-label">Middle Name</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" id="mname" name="mname" type="text" class="form-control" placeholder="Middle Name" value="{{ $admin->m_name }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" id="lname" name="lname" class="form-control my-2" type="text" placeholder="Last Name" value="{{ $admin->l_name }}">
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <input autocomplete="off" type="password" name="password" class="form-control" id="password" placeholder="Password" aria-label="Password" aria-describedby="showpass">
                                <span class="input-group-text" id="showpass">
                            <iconify-icon icon="bx:hide" id="passicon"></iconify-icon>
                        </span>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" id="email" name="email" class="form-control my-2" type="email" placeholder="Email" value="{{ $admin->email }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" id="phone" name="phone" class="form-control my-2" type="tel" placeholder="Phone Number" value="{{ $admin->phone }}">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                @endisset
            </div>
        </main>
    </x-slot>
</x-admin-layout>
