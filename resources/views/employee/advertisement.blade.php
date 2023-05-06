<x-employee.layout>
    <x-slot name="main">
        <main class="valuation-details container">
            @isset($advertisement)
                <x-page-title title="advertisement" subtitle="advertisement #{{$advertisement->id}} Details"></x-page-title>
                <div class="container">
                    <div class="btns">
                        <a href="{{ route("e-approveAdvertisement", ['id' => $advertisement->id]) }}" class="btn btn-primary">Approve</a>
                        <a href="{{ route("e-rejectAdvertisement", ['id' => $advertisement->id]) }}" class="btn btn-danger">Reject</a>
                    </div>
                    <hr>
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
                        <tfoot class="d-flex papers-specific">
                        <td><button class="btn btn-primary">Save CSV</button></td>
                        <td><button class="btn btn-primary">Save PDF</button></td>
                        <td><button class="btn btn-primary">Print</button></td>
                        </tfoot>
                    </table>

                </div>
            @endisset
        </main>
    </x-slot>
</x-employee.layout>
