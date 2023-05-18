<x-user-layout>
    <x-slot name="header">
        <x-half-header></x-half-header>
    </x-slot>

    <x-slot name="main">
        <h2 class="section-title center">{{ $user->f_name . " " . $user->l_name }}</h2>
        <div class="container d-flex">
            <!-- Update Info -->
            <form class="container flex flex-column flex-wrap" action="{{ route("register") }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-floating mb-3">
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="{{ $user->f_name }}">
                    <label for="fname">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="mname" id="mname" class="form-control" placeholder="Middle Name" value="{{ $user->m_name }}">
                    <label for="mname">Middle Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" value="{{ $user->l_name }}">
                    <label for="lname">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="{{ $user->phone }}">
                    <label for="phone">Phone</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class="d-flex flex-column flex-lg-row my-2">
                    <div class="new-avatar w-100 my-2">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input class="form-control form-control-lg" id="avatar" type="file" name="avatar">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary m-2">Update</button>
            </form>

            <!-- Favorites -->
            <div class="gallery">
            <h3 class="gallery-title">Favorite Properties</h3>
            @if(sizeof($favorites) > 0)
                    @foreach($favorites as $favorite)
                        <img src="{{ asset('storage/' . $favorite->property->images[0]->image) }}" class="img-thumbnail w-25" alt="...">
                    @endforeach
                @else
                    No Favorite Properties, <a href="{{ route("properties") }}" class="btn">Browse Properties.</a>
                @endif
            </div>
        </div>
    </x-slot>
</x-user-layout>
