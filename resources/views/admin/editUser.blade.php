<x-admin-layout>
    <x-slot name="main">
        <main class="admin-property container">
            <h4 class="title my-2 center">Edit User <strong>Hassan Khalil</strong></h4>
            <div class="container my-5">
                <hr>
                @if(session('error_msg') != null)
                    <div class="bg-danger p-5">
                        <strong class="text-light">{{ session('error_msg') }}</strong>
                    </div>
                    <hr>
                @endif
                @if(session('success_msg') != null)
                    <div class="bg-success p-5">
                        <strong class="text-dark">{{ session('success_msg') }}</strong>
                    </div>
                    <hr>
                @endif
                @isset($user)
                    <form action="{{ route('a-editUser', ['id' => $user->id]) }}" method="post">
                        @method("PATCH")
                        @csrf
                        <input name="fname" class="form-control my-2" type="text" placeholder="First Name" value="{{ $user->f_name }}">
                        <input name="mname" class="form-control my-2" type="text" placeholder="Middle Name" value="{{ $user->m_name }}">
                        <input name="lname" class="form-control my-2" type="text" placeholder="Last Name" value="{{ $user->l_name }}">
                        <div class="input-group mb-3">
                            <input name="password" type="password" class="form-control" id="password" placeholder="Password" aria-label="Password" aria-describedby="showpass">
                            <span class="input-group-text" id="showpass">
                                <iconify-icon icon="bx:hide" id="passicon"></iconify-icon>
                            </span>
                        </div>
                        <input name="email" class="form-control my-2" type="email" placeholder="Email" value="{{ $user->email }}">
                        <input name="phone" class="form-control my-2" type="tel" placeholder="Phone Number" value="{{ $user->phone }}">
                        <div class="d-flex flex-column flex-lg-row my-2">
                            <div class="previous-avatar w-100 my-2">
                                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="change-user-image">
                            </div>
                            <div class="new-avatar w-100 my-2">
                                <label for="avatar" class="form-label">New Avatar</label>
                                <input class="form-control form-control-lg" id="avatar" type="file">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                @endisset
            </div>
        </main>
    </x-slot>
</x-admin-layout>
