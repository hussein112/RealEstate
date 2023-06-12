<x-admin-layout>
    <x-slot name="main">
        <main class="valuation-details container">
            @isset($valuation)
                <x-page-title title="valuations" subtitle="Valuation #{{ $valuation->id }}"></x-page-title>
                @if($approval_status[0]->status == 1)
                    <div>
                        <a href="{{ route("a-approveValuation", ['id' => $valuation->id]) }}" class="btn btn-primary">Approve</a>
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</a>
                        <small>Issued @ {{ $valuation->created_at }}</small>
                    </div>
                @endif

                <div class="container">
                    <hr>
                    <table class="table mt-5">
                        <tbody class="table-group-divider">
                        <tr>
                            <th>ID</th>
                            <td>{{ $valuation->id }}</td>
                        </tr>

                        <tr>
                            <th>Date Issued</th>
                            <td>{{ $valuation->created_at }}</td>
                        </tr>

                        <tr>
                            <th class="bg-danger">Due Date</th>
                            <td class="bg-danger text-light">{{ $valuation->due_date }}</td>
                        </tr>

                        <tr>
                            <th class="bg-danger">Valuation Status</th>
                            <td class="bg-danger text-light">
                                @if($valuation->status == 1)
                                    Done
                                @elseif($approval_status[0]->status == 1)
                                    Waiting Approval
                                @elseif($approval_status[0]->status == 0)
                                    Rejected
                                @else
                                    In Progress
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Issuer Name</th>
                            <td>{{ $valuation->full_name }}</td>
                        </tr>

                        <tr>
                            <th>Issuer Email</th>
                            <td><a href="mailto:{{ $valuation->issuer_email }}">{{ $valuation->issuer_email }}</a></td>
                        </tr>

                        <tr>
                            <th>Issuer Phone</th>
                            <td><a href="tel:+{{ $valuation->issuer_phone }}">{{ $valuation->issuer_phone }}</a></td>
                        </tr>

                        <tr>
                            <th>Address 1</th>
                            <td>{{ $valuation->address_one }}</td>
                        </tr>

                        <tr>
                            <th>Address 2</th>
                            <td>{{ ($valuation->address_two) ?? "-" }}</td>
                        </tr>

                        <tr>
                            <th>City</th>
                            <td>{{ $valuation->city }}</td>
                        </tr>

                        <tr>
                            <th>Postal Code</th>
                            <td>{{ $valuation->postal_code }}</td>
                        </tr>

                        <tr>
                            <th>Furnishing Status</th>
                            <td>{{ ($valuation->furnishing_status == 0) ? "Not Furnished" : "Furnished" }}</td>
                        </tr>

                        <tr>
                            <th>Includes Garage</th>
                            <td>{{ ($valuation->garage == 0) ? "No" : "Yes" }}</td>
                        </tr>

                        <tr>
                            <th>Bedrooms Number</th>
                            <td>{{ $valuation->bedrooms_nb }}</td>
                        </tr>

                        <tr>
                            <th>Bathrooms Number</th>
                            <td>{{ $valuation->bathrooms_nb }}</td>
                        </tr>

                        <tr>
                            <th>Property Type</th>
                            <td>{{ ($valuation->type == 1) ? "Sell" : "Rent" }}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td>{{ ($valuation->description) ?? "-" }}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            @endisset
            <div class="modal fade" tabindex="-1" id="rejectModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Reject Valuation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to reject valuation <b>{{ $valuation->id }}?</b> </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <form action="{{ route("a-rejectRequest", ['id' => $valuation->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </x-slot>
</x-admin-layout>
