<x-admin-layout>
    <x-slot name="main">
        <main class="admin-valuations container">
            <h4 class="title my-2">Appointements</h4>
            <div class="container my-5">
                <hr>
                <table class="table table-bordered caption-top">
                    <caption>List of All Appointements</caption>
                    <thead class="bg-dark">
                    <tr>
                        <th scope="col" class="text-primary">
                            <a href="#">ID</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Title</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Date</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Issuer</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Issuer Message</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Planned By</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Assigned To</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">Actions</th>
                        <th scope="col" class="text-primary"><a href="#">Details</a></th>
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
                                <td>{{ $appointement->assignedTo->f_name }}</td>
                                <td class="action-btns">
                                    <a href="{{ route('a-editAppointement', ['id' => $appointement->id]) }}" class="btn btn-primary m-1">Edit</a>
                                    <a href="#" class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
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

            <x-delete-modal target="property" targetId="5"></x-delete-modal>
        </main>
    </x-slot>
</x-admin-layout>
