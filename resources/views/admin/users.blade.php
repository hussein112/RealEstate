<x-admin-layout>
    <x-slot name="main">
        <main class="users-admin container">
            <x-page-title title="users" subtitle="all the users in the system"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <x-create-button target="a-newUser" title="User"></x-create-button>
            <table class="table table-bordered caption-top">
                <caption>List of All Users</caption>
                <thead>
                <tr>
                    <th scope="col">
                        @sortablelink("id", "ID")
                    </th>
                    <th scope="col">
                        @sortablelink("f_name", "Full Name")
                    </th>
                    <th scope="col">
                        @sortablelink("phone", "Phone")
                    </th>
                    <th scope="col">
                        @sortablelink("email", "Email")
                    </th>
                    <th scope="col">Avatar</th>
                    <th scope="col">
                        @sortablelink('admin_id', 'Added By')
                    </th>
                    <th scope="col">
                        @sortablelink('email_verified_at', 'Verfied Email')
                    </th>
                    <th>
                        @sortablelink("created_at", "Joined At")
                    </th>
                    <th scope="col">Actions</th>
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
                            <td><img src="{{ asset('storage/' . $user->avatar->image) }}" type="button" data-bs-toggle="modal" data-bs-target="#imageModal{{$user->id}}"></td>
                            <td>
                                @if(isset($user->admin_id))
                                    {{ $user->addedBy->f_name . ' ' . $user->addedBy->l_name }}
                                @elseif(isset($user->employee_id))
                                    Employee-{{ $user->addedByEmployee->full_name }}
                                @else
                                    Manually Registered
                                @endif
                            </td>
                            @if($user->email_verified_at != null)
                                <td class="bg-info">
                                    <iconify-icon icon="icon-park-solid:correct" style="color: white;"></iconify-icon>
                                </td>
                            @else
                                <td class="bg-warning text-danger">
                                    <iconify-icon icon="ph:x-circle-fill"></iconify-icon>
                                </td>
                            @endif
                            <td>{{ $user->created_at }}</td>
                            <td class="action-btns">
                                <a href="{{ route('a-editUser', ['id' => $user->id]) }}" class="btn btn-primary m-1">Edit</a>
                                <button class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$user->id}}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @endisset
            </table>

            @foreach($users as $user)
                <x-delete-modal target="user" targetId="{{ $user->id }}" auth="a">
                </x-delete-modal>
                <x-image-modal modalTitle="{{ $user->f_name }}'s Avatar" img="{{ $user->avatar->image }}" targetId="{{ $user->id }}">
                </x-image-modal>
            @endforeach

            <div class="container">
                {{ $users->links() }}
            </div>
        </main>
    </x-slot>
</x-admin-layout>
