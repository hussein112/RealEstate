<x-admin-layout>

    <x-slot name="main">
        <main class="users-admin container">
            <h4 class="title my-2">Employees</h4>

            <div class="remainders">
                <div class="alert alert-danger">
                    <a href="#"><strong>Property #34234</strong></a>, Should be Valuated by Mon, 21/10/2000
                </div>
            </div>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <x-create-button target="a-newEmployee" title="Employee"></x-create-button>

            <table class="table table-bordered caption-top">
                <caption>List of All Employees</caption>
                <thead class="bg-dark">
                <tr>
                    <th scope="col" class="text-primary">
                        @sortablelink("id", "ID")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink("full_name", "Full Name")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink("phone", "Phone")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink("email", "Email")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink("statement", "Statement")
                    </th>
                    <th scope="col" class="text-primary">Avatar</th>
                    <th scope="col" class="text-primary">
                        @sortablelink("admin_id", "Added By")
                    </th>
                    <th scope="col" class="text-primary">Actions</th>
                </tr>
                </thead>
                @isset($employees)
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <th scope="row">{{ $employee->id }}</th>
                            <td>{{ $employee->full_name }}</td>
                            <td>
                                <a href="tel:+{{ $employee->phone }}">{{ $employee->phone }}</a>
                            </td>
                            <td>
                                <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a>
                            </td>
                            <td class="td-long">
                                {{ $employee->statement }}
                            </td>
                            <td><img src="{{ asset('storage/' . $employee->avatar->image) }}" type="button" data-bs-toggle="modal" data-bs-target="#imageModal{{$employee->id}}"></td>
                            <td>{{ $employee->addedBy->f_name . ' ' . $employee->addedBy->l_name }}</td>
                            <td class="action-btns">
                                <a href="{{ route('a-editEmployee', ['id' => $employee->id]) }}" class="btn btn-primary m-1">Edit</a>
                                <button class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$employee->id}}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @endisset
            </table>


            @foreach($employees as $employee)
                <x-delete-modal target="employee" targetId="{{ $employee->id }}">
                </x-delete-modal>
                <x-image-modal modalTitle="{{ $employee->full_name }}'s Avatar" img="{{ $employee->avatar->image }}" targetId="{{ $employee->id }}">
                </x-image-modal>
            @endforeach
        </main>
    </x-slot>

</x-admin-layout>
