<x-employee.layout>
    <x-slot name="main">
        <main class="admin-valuations container">
        <x-page-title title="valuations" subtitle="All valuations assigned for you"></x-page-title>
        <hr>
            <table class="table table-bordered caption-top">
                <caption>{{ sizeof($valuations) }} Valuations Assigned to You</caption>
                <thead>
                <tr>
                    <th scope="col">
                        @sortablelink("id", "ID")
                    </th>
                    <th scope="col">
                        @sortablelink("assigned_by", "Assigned By")
                    </th>
                    <th scope="col">
                        @sortablelink("created_at", "Date Issued")
                    </th>
                    <th scope="col">
                        Address 1
                    </th>
                    <th scope="col">
                        @sortablelink("city", "City")
                    </th>
                    <th scope="col">
                        Postal Code
                    </th>
                    <th scope="col">
                        @sortablelink("type", "Property Type")
                    </th>
                    <th scope="col">
                        @sortablelink("for", "For")
                    </th>
                    <th scope="col">
                        @sortablelink("valuation_status", "Status")
                    </th>
                    <th scope="col">
                        @sortablelink("due_date", "Due")
                    </th>
                    <th scope="col">Details</th>
                    <th scope="col">Mark As Done</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($valuations as $valuation)
                    <tr>
                        <th scope="row">{{ $valuation->id }}</th>
                        <td>{{ isset($valuation->assignedBy->f_name) ? $valuation->assignedBy->f_name . ' ' . $valuation->assignedBy->l_name : "None" }}</td>
                        <td>{{ $valuation->created_at }}</td>
                        <td>{{ $valuation->address_one }}</td>
                        <td>{{ $valuation->city }}</td>
                        <td>{{ $valuation->postal_code }}</td>
                        <td>{{ $valuation->type }}</td>
                        <td class="td-long">{{ ($valuation->for == 1) ? "Sell" : "Rent" }}</td>
                        @if($valuation->status == 1)
                            <td class="bg-success text-light">Finished</td>
                        @else
                            <td class="bg-danger text-light">
                                <iconify-icon icon="material-symbols:pending-actions-rounded"></iconify-icon>
                            </td>
                        @endif
                        <td class="bg-danger text-light">{{ $valuation->due_date }}</td>
                        <td><a class="btn btn-primary flex-center" href="{{ route("e-valuationDetails", ['id' => $valuation->id]) }}"><iconify-icon icon="ic:sharp-remove-red-eye"></iconify-icon></a></td>
                        <td>
                            <form action="{{ route("e-editValuation", ['id' => $valuation->id]) }}" method="post" class="center">
                                @csrf
                                @method("PATCH")
                                <button class="btn btn-primary flex-center" type="submit">
                                    <iconify-icon icon="mdi:coffee-maker-done"></iconify-icon>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </main>
    </x-slot>
</x-employee.layout>
