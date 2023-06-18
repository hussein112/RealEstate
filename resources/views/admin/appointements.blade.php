<x-admin-layout>
    <x-slot name="main">
        <main class="container">
            <x-page-title title="appointements" subtitle="all the appointements in the system"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <x-create-button target="a-newAppointement" title="Appointement"></x-create-button>

            <table class="table table-bordered caption-top">
                <caption>List of All Appointements</caption>
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
                            <td class="td-long">{{ $appointement->forAdmin->f_name . ' ' . $appointement->forAdmin->l_name }}</td>
                            @if(isset($appointement->property_id))
                                <td><a href="{{ route("a-editProperty", ['id' => $appointement->property_id]) }}">{{ $appointement->property_id }}</a></td>
                            @else
                                <td>-</td>
                            @endif
                            <td class="action-btns">
                                <a href="{{ route('a-editAppointement', ['id' => $appointement->id]) }}" class="btn btn-primary m-1">Edit</a>
                                <button class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$appointement->id}}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @endisset
            </table>

            <!-- Start Pagination -->
            <div class="center">
                {{ $appointements->links() }}
            </div>
            <!-- End Pagination -->

            <!-- Start Delete Modal -->
            @foreach($appointements as $appoin)
                <x-delete-modal target="appointement" targetId="{{ $appoin->id }}" auth="a">
                </x-delete-modal>
            @endforeach
            <!-- End Delete Modal -->
        </main>
    </x-slot>
</x-admin-layout>
