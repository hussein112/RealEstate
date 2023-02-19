<x-admin-layout>
    <x-slot name="main">
        <main class="admins-admin container">
            <x-page-title title="admins"></x-page-title>

            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <x-create-button target="a-newAdmin" title="Admin"></x-create-button>
            <table class="table table-bordered caption-top">
                <caption>List of All Admins</caption>
                <thead class="bg-dark">
                <tr>
                    <th scope="col" class="text-primary">
                        @sortablelink('id', 'ID')
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink('f_name', "Full Name")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink('phone', "Phone")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink('email', "Email")
                    </th>
                    <th scope="col" class="text-primary">Avatar</th>
                    <th scope="col" class="text-primary">
                        @sortablelink('email_verified_at', "Verified Email")
                    </th>
                    <th scope="col" class="text-primary">Actions</th>
                </tr>
                </thead>
                @isset($admins)
                    <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <th scope="row">{{ $admin->id }}</th>
                            <td>{{ $admin->f_name . " " . $admin->m_name . " " . $admin->l_name }}</td>
                            <td data-bs-toggle="tooltip" data-bs-title="Call Hussein">
                                <a href="tel:+{{ $admin->phone }}">{{ $admin->phone }}</a>
                            </td>
                            <td data-bs-toggle="tooltip" data-bs-title="Send Email to Hussein">
                                <a href="mailto:{{ $admin->email }}">{{ $admin->email }}</a>
                            </td>
                            <td><img src="{{ ($admin->avatar->image) ? asset('storage/' . $admin->avatar->image) : "kd" }}" type="button" data-bs-toggle="modal" data-bs-target="#imageModal{{$admin->id}}"></td>
                            @if($admin->email_verified_at != null)
                                <td class="bg-success">
                                    <iconify-icon icon="icon-park-solid:correct" style="color: white;"></iconify-icon>
                                </td>
                            @else
                                <td class="bg-danger">
                                    <iconify-icon icon="ph:x-bold" style="color: white;"></iconify-icon>
                                </td>
                            @endif

                            <td class="action-btns">
                                <a href="{{ route('a-editAdmin', ['id' => $admin->id]) }}" class="btn btn-primary m-1">Edit</a>
                                <button class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$admin->id}}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @endisset
            </table>

            <!-- Start Show Image Modal -->


            <!-- End Show Image Modal -->

            <!-- Start Delete Modal -->
            @foreach($admins as $admin)
                <x-delete-modal target="admin" targetId="{{ $admin->id }}">
                </x-delete-modal>
                <x-image-modal modalTitle="{{ $admin->f_name }}'s Avatar" img="{{ $admin->avatar->image }}" targetId="{{ $admin->id }}">
                </x-image-modal>
            @endforeach
            <!-- End Delete Modal -->
        </main>
    </x-slot>
</x-admin-layout>
