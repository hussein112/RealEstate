<x-employee.layout>
    <x-slot name="main">
        <main class="admin-valuations container">
            <x-page-title title="valuations"></x-page-title>
            <hr>
            <div class="container my-5">
                <table class="table table-bordered caption-top">
                    <caption>{{ sizeof($valuations) }} Valuations Assigned to You</caption>
                    <thead class="bg-dark">
                    <tr>
                        <th scope="col" class="text-primary">
                            @sortablelink("id", "ID")
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("assigned_by", "Assigned By")
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("date_issued", "Date Issued")
                        </th>
                        <th scope="col" class="text-primary">
                            Address 1
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("city", "City")
                        </th>
                        <th scope="col" class="text-primary">
                            Postal Code
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("valuation_type", "Type")
                        </th>
                        <th scope="col" class="text-primary">
                            Description
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("valuation_status", "Status")
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("due_date", "Due")
                        </th>
                        <th scope="col" class="text-primary">Details</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($valuations as $valuation)
                        <tr>
                            <th scope="row">{{ $valuation->id }}</th>
                            <td>{{ isset($valuation->assignedBy->f_name) ? $valuation->assignedBy->f_name . ' ' . $valuation->assignedBy->l_name : "None" }}</td>
                            <td>{{ $valuation->date_issued }}</td>
                            <td>{{ $valuation->address_one }}</td>
                            <td>{{ $valuation->city }}</td>
                            <td>{{ $valuation->postal_code }}</td>
                            <td>{{ $valuation->valuation_type }}</td>
                            <td class="td-long">{{ $valuation->description }}</td>
                            @if($valuation->valuation_status == 1)
                                <td class="bg-success text-light">Finished</td>
                            @else
                                <td class="bg-danger text-light">Pending</td>
                            @endif
                            <td class="bg-danger text-light">{{ $valuation->due_date }}</td>
                            <td><a class="btn btn-primary" href="{{ route("e-valuationDetails", ['id' => $valuation->id]) }}">></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </x-slot>
</x-employee.layout>
