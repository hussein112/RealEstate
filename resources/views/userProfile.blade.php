<x-user-layout>
    <x-slot name="header">
        <x-half-header></x-half-header>
    </x-slot>

    <x-slot name="main">
        <h2 class="section-title center">{{ $user->f_name . " " . $user->l_name }}</h2>
        <div class="container d-flex flex-column">
            <x-messages type="info" msg="error_msg"></x-messages>
            <x-messages type="success" msg="success_msg"></x-messages>
            @if($user->email_verified_at == null)
                <a href="{{ route("verification.notice") }}" class="text-danger">You Need To Verify Your Email</a>
            @endif
            <hr>
            <!-- Update Info -->
            <form id="update-user-profile" class="container flex flex-column flex-wrap" action="{{ route("update", ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-floating mb-3">
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="{{ $user->f_name }}">
                    <label for="fname">First Name</label>
                    @if($errors->has('fname'))
                        <div class="error text-danger">* {{$errors->first('fname')}}</div>
                    @endif
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="mname" id="mname" class="form-control" placeholder="Middle Name" value="{{ $user->m_name }}">
                    <label for="mname">Middle Name</label>
                    @if($errors->has('mname'))
                        <div class="error text-danger">* {{$errors->first('mname')}}</div>
                    @endif
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" value="{{ $user->l_name }}">
                    <label for="lname">Last Name</label>
                    @if($errors->has('lname'))
                        <div class="error text-danger">* {{$errors->first('lname')}}</div>
                    @endif
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                    <label for="email">Email address</label>
                    @if($errors->has('email'))
                        <div class="error text-danger">* {{$errors->first('email')}}</div>
                    @endif
                </div>
                <div class="mb-3 d-flex flex-column align-items-start">
                    <div class="d-flex align-items-center">
                        <iconify-icon class="display-4" icon="twemoji:flag-lebanon"></iconify-icon>
                        <input value="{{ $user->phone }}" type="text" name="phone" id="phone" class="form-control w-auto mx-2" placeholder="03 123 456">
                    </div>
                    @if($errors->has('phone'))
                        <div class="error text-danger">* {{$errors->first('phone')}}</div>
                    @endif
                </div>
                <div class="d-flex flex-column flex-lg-row my-2">
                    <div class="new-avatar w-100 my-2">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input class="form-control form-control-lg" id="avatar" type="file" name="avatar">
                        @if($errors->has('avatar'))
                            <div class="error text-danger">* {{$errors->first('avatar')}}</div>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary m-2" id="update-profile">Update</button>
            </form>
            <hr>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changePassword">
                Change Password
            </button>
            <hr>

            <!-- Favorites -->
            <div class="gallery">
            <h3 class="gallery-title">Favorite Properties</h3>
            @if(sizeof($favorites) > 0)
                    @foreach($favorites as $favorite)
                        <a href="{{ route("property", ['id' => $favorite->property->id]) }}">
                            <img src="{{ asset('storage/' . $favorite->property->images[0]->image) }}" class="img-thumbnail w-25" alt="...">
                        </a>
                    @endforeach
                @else
                    No Favorite Properties, <a href="{{ route("properties") }}" class="btn">Browse Properties.</a>
                @endif
            </div>
        </div>

        <div class="modal" id="changePassword" tabindex="-1" aria-labelledby="#changePassword" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route("updatePassword", ['id' => $user->id]) }}">
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
    </x-slot>
</x-user-layout>
<x-confirmation-dialog title="Update Profile" body="Are you sure you want to update your profile?"></x-confirmation-dialog>
