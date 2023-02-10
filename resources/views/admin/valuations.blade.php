<x-admin-layout>
    <x-slot name="main">
        <main class="admin-valuations container">
            <h4 class="title my-2">Valuations</h4>
            <div class="container my-5">
                <hr>
                <table class="table table-bordered caption-top">
                    <caption>List of All Valuation</caption>
                    <thead class="bg-dark">
                    <tr>
                        <th scope="col" class="text-primary">
                            <a href="#">ID</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Assigned By</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Assigned To</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Date Issued</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Address 1</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">City</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Postal Code</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Type</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Description</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Status</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Due</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary"><a href="#">Details</a></th>
                    </tr>
                    </thead>
                    @isset($valuations)
                        <tbody>
                        @foreach($valuations as $valuation)
                            <tr>
                                <th scope="row">{{ $valuation->id }}</th>
                                <td>{{ isset($valuation->assignedBy->f_name) ? $valuation->assignedBy->f_name . ' ' . $valuation->assignedBy->l_name : "None" }}</td>
                                <td>{{ $valuation->date_issued }}</td>
                                <td>{{ $valuation->address_one }}</td>
                                <td>{{ $valuation->address_two }}</td>
                                <td>{{ $valuation->postal_code }}</td>
                                <td>{{ $valuation->valuation_type }}</td>
                                <td class="td-long">{{ $valuation->description }}</td>
                                <td>{{ $valuation->status }}</td>
                                <td class="bg-danger text-light">{{ $valuation->due_date }}</td>
                                <td><a class="btn btn-primary" href="{{ route("a-valuationDetails", ['id' => $valuation->id]) }}">></a></td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>

            <!-- Start Pagination -->
            <div class="center">
                {{ $valuations->links() }}
            </div>
        </main>
    </x-slot>
</x-admin-layout>
