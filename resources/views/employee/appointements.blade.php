<x-employee.layout>
    <x-slot name="main">
        <main class="admin-valuations container">
            <x-page-title title="appointements" subtitle="all the appointements you have"></x-page-title>
            <x-create-button target="e-newAppointement" title="Appointement"></x-create-button>

            <div class="container my-5">
                <x-messages msg="error_msg" type="danger"></x-messages>
                <x-messages msg="success_msg" type="success"></x-messages>
                <hr>

                <table class="table table-bordered caption-top">
                    <caption>List of Appointements</caption>
                    <thead>
                    <tr>
                        <th scope="col">
                            @sortablelink('id', "ID")
                        </th>
                        <th scope="col">
                            @sortablelink("title", "Title")
                        </th>
                        <th scope="col">
                            @sortablelink("notes", "Notes")
                        </th>
                        <th scope="col">
                            @sortablelink("created_at", "Date")
                        </th>
                        <th scope="col">
                            @sortablelink("admin_id", "By")
                        </th>
                        <th scope="col">
                            @sortablelink("property_id", "For Property")
                        </th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    @isset($appointements)
                        <tbody>
                        @foreach($appointements as $appointement)
                            <tr>
                                <th scope="row">{{ $appointement->id }}</th>
                                <td>{{ $appointement->title }}</td>
                                <td>{{ $appointement->notes }}</td>
                                <td>{{ $appointement->created_at }}</td>
                                <td class="td-long">{{ $appointement->forEmployee->full_name }}</td>
                                <td><a href="{{ route("e-property", ['id' => $appointement->purpose->id]) }}">{{ $appointement->purpose->id }}</a></td>
                                <td class="action-btns">
                                    <a href="{{ route('e-editAppointement', ['id' => $appointement->id]) }}" class="btn btn-primary m-1">Edit</a>
                                    <button class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$appointement->id}}">Delete</button>
                                </td>
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
                <x-delete-modal target="appointement" targetId="{{ $appoin->id }}" auth="e">
                </x-delete-modal>
            @endforeach
            <!-- End Delete Modal -->
        </main>
    </x-slot>
</x-employee.layout>
