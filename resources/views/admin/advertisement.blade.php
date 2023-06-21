<x-admin-layout>
    <x-slot name="main">
        <main class="valuation-details container">
            @isset($advertisement)
                <x-page-title title="advertisement" subtitle="advertisement #{{$advertisement->id}} Details"></x-page-title>
                <div class="container">
                    @if($advertisement->status == 0)
                        <div class="d-flex">
                            <form action="{{ route("a-approveAdvertisement", ['id' => $advertisement->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary">Approve</button>
                            </form>
                            <button class="btn btn-danger mx-1" type="button" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>
                        </div>
                    @elseif($advertisement->status == 1)
                        <form action="{{ route("a-markAsDoneAdvertisement", ['id' => $advertisement->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">Mark as Done</button>
                        </form>
                    @endif
                    <table class="table mt-5">
                        <tbody class="table-group-divider">
                        <tr>
                            <th>ID</th>
                            <td>{{ $advertisement->id }}</td>
                        </tr>

                        <tr>
                            <th>Date Issued</th>
                            <td>{{ $advertisement->created_at }}</td>
                        </tr>


                        <tr>
                            <th>Issuer Name</th>
                            <td>{{ $advertisement->full_name }}</td>
                        </tr>

                        <tr>
                            <th>Issuer Email</th>
                            <td><a href="mailto:{{ $advertisement->email }}">{{ $advertisement->email }}</a></td>
                        </tr>

                        <tr>
                            <th>Issuer Phone</th>
                            <td><a href="tel:+{{ $advertisement->phone }}">{{ $advertisement->phone }}</a></td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>{{ $advertisement->location }}</td>
                        </tr>


                        <tr>
                            <th>City</th>
                            <td>{{ $advertisement->location }}</td>
                        </tr>

                        <tr>
                            <th>Property Type</th>
                            <td>{{ ($advertisement->for == 1) ? "Sell" : "Rent" }}</td>
                        </tr>

                        <tr>
                            <th>Property Type</th>
                            <td>{{ $advertisement->type->type }}</td>
                        </tr>


                        <tr>
                            <th>Message</th>
                            <td>{{ $advertisement->message }}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            @endisset

            <!-- Reject Advertisement Modal -->

            <div class="modal" tabindex="-1" id="rejectModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reject Advertisement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-capitalize">Are You Sure You want to reject <strong>Advertisement #{{ $advertisement->id }}?</strong></p>
                        </div>
                        <form action="{{ route("a-rejectAdvertisement", ['id' => $advertisement->id]) }}" method="POST" class="modal-footer">
                            @csrf
                            @method('PATCH')
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </x-slot>
</x-admin-layout>
