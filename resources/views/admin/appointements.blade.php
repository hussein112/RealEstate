<x-admin-layout>
    <x-slot name="main">
        <main class="admin-valuations container">
            <x-page-title title="appointements"></x-page-title>

            <div class="container my-5">
                <x-messages msg="error_msg" type="danger"></x-messages>
                <x-messages msg="success_msg" type="success"></x-messages>
                <hr>
                <x-create-button target="a-newAppointement" title="Appointement"></x-create-button>

                <table class="table table-bordered caption-top">
                    <caption>List of All Appointements</caption>
                    <thead class="bg-dark">
                    <tr>
                        <th scope="col" class="text-primary">
                            @sortablelink('id', "ID")
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("title", "Title")
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("date", "Date")
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("issuer_name", "Issuer")
                        </th>
                        <th scope="col" class="text-primary">
                            Issuer Message
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("admin_id", "Planned By")
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("property_id", "For Property")
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("employee_id", "Assigned To")
                        </th>
                        <th scope="col" class="text-primary">Actions</th>
                        <th scope="col" class="text-primary">Details</th>
                    </tr>
                    </thead>
                    @isset($appointements)
                        <tbody>
                        @foreach($appointements as $appointement)
                            <tr>
                                <th scope="row">{{ $appointement->id }}</th>
                                <td>{{ $appointement->title }}</td>
                                <td>{{ $appointement->date }}</td>
                                <td>{{ $appointement->issuer_name }}</td>
                                <td class="td-long">{{ $appointement->issuer_message }}</td>
                                <td>{{ $appointement->assignedBy->f_name . ' ' . $appointement->assignedBy->l_name }}</td>
                                <td><a href="{{ route("a-property", ['id' => $appointement->purpose->id]) }}">{{ $appointement->purpose->id }}</a></td>
                                <td>{{ $appointement->assignedTo->f_name }}</td>
                                <td class="action-btns">
                                    <a href="{{ route('a-editAppointement', ['id' => $appointement->id]) }}" class="btn btn-primary m-1">Edit</a>
                                    <button class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$appointement->id}}">Delete</button>
                                </td>
                                <td><a href="{{ route("appointementDetails", ['id' => $appointement->id]) }}" class="btn btn-primary">></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endisset
                </table>
            </div>

            <!-- Start Pagination -->
            <div class="center">
                {{ $appointements->links() }}
            </div>
            <!-- End Pagination -->

            <!-- Start Delete Modal -->
            @foreach($appointements as $appoin)
                <x-delete-modal target="appointement" targetId="{{ $appoin->id }}">
                </x-delete-modal>
            @endforeach
            <!-- End Delete Modal -->
        </main>
    </x-slot>
</x-admin-layout>
