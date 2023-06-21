<x-admin-layout>
    <x-slot name="main">
        <main class="admin-valuations container">
            <x-page-title title="advertisements" subtitle="All advertisements on the system"></x-page-title>
            <hr>
            <table class="table table-bordered caption-top">
                <caption>All Advertisements</caption>
                <thead>
                    <tr>
                        <th scope="col">
                            @sortablelink("id", "ID")
                        </th>

                        <th scope="col">
                            @sortablelink("created_at", "Date Issued")
                        </th>

                        <th scope="col">
                            @sortablelink("location", "City")
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
                            @sortablelink("employee_id", "Assinged To")
                        </th>
                        <th scope="col">Details</th>
                        <th scope="col">Mark As Done</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($advertisements as $advertisement)
                    <tr>
                        <th scope="row">{{ $advertisement->id }}</th>
                        <td>{{ $advertisement->created_at }}</td>
                        <td>{{ $advertisement->location }}</td>
                        <td>{{ $advertisement->type->type }}</td>
                        <td class="td-long">{{ ($advertisement->for == 1) ? "Sell" : "Rent" }}</td>
                        @if($advertisement->status == 1)
                            <td class="bg-success text-light">In Progress</td>
                        @elseif($advertisement->status == 3)
                            <td class="bg-danger text-light">
                                Done
                            </td>
                        @else
                            <!-- Needs Reveiw -->
                            <td class="bg-danger text-light">
                                <a href="{{ route("a-advertiseDetails", ['id' => $advertisement->id]) }}">Needs Review</a>
                            </td>
                        @endif
                        <td>
                            @if(isset($advertisement->employee_id))
                                {{ $advertisement->assignedTo->full_name }}
                            @else
                                -
                            @endif
                        </td>
                        <td><a class="btn btn-primary flex-center" href="{{ route("a-advertiseDetails", ['id' => $advertisement->id]) }}"><iconify-icon icon="ic:sharp-remove-red-eye"></iconify-icon></a></td>
                        <td>
                            <form method="post" action="{{ route("a-markAsDoneAdvertisement", ['id' => $advertisement->id]) }}" class="center">
                                @csrf
                                @method("PATCH")
                                <button type="submit" class="btn btn-primary flex-center"><iconify-icon icon="mdi:coffee-maker-done"></iconify-icon></button>
                            </form>
                        </td>
                @endforeach
                </tbody>
            </table>
        </main>
    </x-slot>
</x-admin-layout>
