<x-admin-layout>
    <x-slot name="main">
        <main class="users-admin container">
            <h4 class="title my-2">Users</h4>
            <div class="remainders">
                <div class="alert alert-danger">
                    <a href="#"><strong>Property #34234</strong></a>, Should be Valuated by Mon, 21/10/2000
                </div>
            </div>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <x-create-button target="a-newUser" title="User"></x-create-button>
            <table class="table table-bordered caption-top">
                <caption>List of All Users</caption>
                <thead class="bg-dark">
                <tr>
                    <th scope="col" class="text-primary">
                        <a href="#">ID</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Full Name</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Phone</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Email</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary"><a href="#">Avatar</a></th>
                    <th scope="col" class="text-primary">
                        <a href="#">Added By</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Verified Email</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th>Joined At</th>
                    <th scope="col" class="text-primary">Actions</th>
                </tr>
                </thead>
                @isset($users)
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->f_name . ' ' . $user->l_name }}</td>
                            <td>
                                <a href="tel:+{{ $user->phone }}">{{ $user->phone }}</a>
                            </td>
                            <td>
                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            </td>
                            <td><img src="{{ asset('storage/' . $user->avatar->image) }}" type="button" data-bs-toggle="modal" data-bs-target="#imageModal"></td>
                            <td>{{ ($user->addedBy->f_name) ? $user->addedBy->f_name . ' ' . $user->addedBy->l_name : "None"}}</td>
                            @if($user->email_verified_at != null)
                                <td class="bg-success">
                                    <iconify-icon icon="icon-park-solid:correct" style="color: white;"></iconify-icon>
                                </td>
                            @else
                                <td class="bg-danger">
                                    {{ "Failure icon" }}
                                </td>
                            @endif
                            <td>{{ $user->joined_at }}</td>
                            <td class="action-btns">
                                <a href="{{ route('a-editUser', ['id' => $user->id]) }}" class="btn btn-primary m-1">Edit</a>
                                <button class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$user->id}}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @endisset
            </table>

            <!-- Start Show Image Modal -->

            <div class="modal fade" tabindex="-1" id="imageModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hussein's Avatar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="https://picsum.photos/200/300">
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Show Image Modal -->

            @foreach($users as $user)
                <x-delete-modal target="user" targetId="{{ $user->id }}">
                </x-delete-modal>
            @endforeach
        </main>
    </x-slot>
</x-admin-layout>
