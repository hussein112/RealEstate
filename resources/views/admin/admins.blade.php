<x-admin-layout>
    <x-slot name="main">
        <main class="admins-admin container">
            <h4 class="title my-2">Admins</h4>
            <div class="remainders">
                <div class="alert alert-danger">
                    <a href="#"><strong>Property #34234</strong></a>, Should be Valuated by Mon, 21/10/2000
                </div>
            </div>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <x-create-button target="a-newAdmin" title="Admin"></x-create-button>
            <table class="table table-bordered caption-top">
                <caption>List of All Admins</caption>
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
                        <a href="#">Verified Email</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
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
                            <td><img src="{{ ($admin->avatar->image) ? asset('storage/' . $admin->avatar->image) : "kd" }}" type="button" data-bs-toggle="modal" data-bs-target="#imageModal"></td>
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

            <div class="modal fade" tabindex="-1" id="imageModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hussein's Avatar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="adfasdfasdf">
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Show Image Modal -->

            <!-- Start Delete Modal -->
            @foreach($admins as $admin)
                <x-delete-modal target="admin" targetId="{{ $admin->id }}">
                </x-delete-modal>
            @endforeach
            <!-- End Delete Modal -->
        </main>
    </x-slot>
</x-admin-layout>
