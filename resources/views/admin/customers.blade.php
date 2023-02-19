<x-admin-layout>
    <x-slot name="main">
        <main class="admins-admin container">
            <x-page-title title="customers"></x-page-title>

            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <x-create-button target="a-newCustomer" title="Customer"></x-create-button>
        <table class="table table-bordered caption-top">
            <caption>List of All Customers</caption>
            <thead class="bg-dark">
            <tr>
                <th scope="col" class="text-primary">
                    @sortablelink("id", "ID")
                </th>
                <th scope="col" class="text-primary">
                    @sortablelink("full_name", "Full Name")
                </th>
                <th scope="col" class="text-primary">
                    @sortablelink("email", "Email")
                </th>
                <th scope="col" class="text-primary">
                    @sortablelink("phone", "Phone")
                </th>
                <th scope="col" class="text-primary">
                    @sortablelink("admin_id", "Added By")
                </th>
                <th scope="col" class="text-primary">Actions</th>
            </tr>
            </thead>
            @isset($customers)
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <th scope="row">{{ $customer->id }}</th>
                        <td>{{$customer->full_name}}</td>
                        <td> <a href="mailto:{{ $customer->email  }}">{{ $customer->email }}</a> </td>
                        <td> <a href="tel+{{ $customer->phone }}">{{ $customer->phone }}</a> </td>
                        <td>{{ $customer->addedBy->f_name . " " . $customer->addedBy->l_name }}</td>
                        <td class="action-btns">
                            <a href="{{ route("a-editCustomer", ['id' => $customer->id]) }}" class="btn btn-primary m-1">Edit</a>
                            <button class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$customer->id}}">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            @endisset
        </table>

        <!-- Start Pagination -->
        <div class="center">
            {{ $customers->links() }}
        </div>
        <!-- End Pagination -->


        <!-- Start Delete Modal -->
            @foreach($customers as $customer)
                <x-delete-modal target="customer" targetId="{{ $customer->id }}">
                </x-delete-modal>
            @endforeach
        <!-- End Delete Modal -->
        </main>


    </x-slot>

</x-admin-layout>
