<x-employee.layout>
    <x-slot name="main">
        <main class="container">
            <x-page-title title="customers" subtitle="list of all customers on the system"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <x-create-button target="e-newCustomer" title="Customer"></x-create-button>
            <table class="table table-bordered caption-top">
                <caption>List of All Customers</caption>
                <thead>
                <tr>
                    <th scope="col">
                        @sortablelink("id", "ID")
                    </th>
                    <th scope="col">
                        @sortablelink("full_name", "Full Name")
                    </th>
                    <th scope="col">
                        @sortablelink("email", "Email")
                    </th>
                    <th scope="col">
                        @sortablelink("phone", "Phone")
                    </th>
                    <th scope="col">
                        @sortablelink("admin_id", "Added By")
                    </th>
                    <th scope="col">Actions</th>
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
                            <td>
                                @if(isset($customer->admin_id))
                                    {{ $customer->addedBy->f_name . ' ' . $customer->addedBy->l_name }}
                                @elseif(isset($customer->employee_id))
                                    {{ $customer->addedByEmployee->full_name }}
                                @else
                                    Manually Registered
                                @endif
                            </td>
                            <td class="action-btns">
                                <a href="{{ route("e-editCustomer", ['id' => $customer->id]) }}" class="btn btn-primary m-1">Edit</a>
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
                <x-delete-modal target="customer" targetId="{{ $customer->id }}" auth="e">
                </x-delete-modal>
            @endforeach
            <!-- End Delete Modal -->
        </main>


    </x-slot>

</x-employee.layout>
