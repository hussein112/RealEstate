<x-admin-layout>
    <x-slot name="main">
        <main class="admins-admin container">
            <h4 class="title my-2">Customers</h4>

            <div class="remainders">
                <div class="alert alert-danger">
                    <a href="#"><strong>Property #34234</strong></a>, Should be Valuated by Mon, 21/10/2000
                </div>
            </div>
            <hr>
            <x-create-button target="a-newCustomer" title="Customer"></x-create-button>
        <table class="table table-bordered caption-top">
            <caption>List of All Customers</caption>
            <thead class="bg-dark">
            <tr>
                <th scope="col" class="text-primary">
                    <a href="#">ID</a>
                    <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>                    </a>
                </th>
                <th scope="col" class="text-primary">
                    <a href="#">Full Name</a>
                    <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                </th>
                <th scope="col" class="text-primary">
                    <a href="#">Email</a>
                    <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                </th>
                <th scope="col" class="text-primary">
                    <a href="#">Phone</a>
                    <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                </th>
                <th scope="col" class="text-primary">
                    <a href="#">Added By</a>
                    <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
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
                            <button id="delete" name="{{ $customer->id }}" class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
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
        <x-delete-modal target="property" targetId="1">
        </x-delete-modal>
        <!-- End Delete Modal -->
        </main>


    </x-slot>

</x-admin-layout>
