<x-admin-layout>
    <x-slot name="main">
        <main class="admin-valuations container">
            <x-page-title title="valuations" subtitle="all the valuations in the system"></x-page-title>

            <hr>
            <table class="table table-bordered caption-top">
                    <caption>List of All Valuation</caption>
                    <thead>
                    <tr>
                        <th scope="col">
                            @sortablelink("id", "ID")
                        </th>
                        <th scope="col">
                            @sortablelink("assigned_by", "Assigned By")
                        </th>
                        <th scope="col">
                            @sortablelink("date_issued", "Date Issued")
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
                            Description
                        </th>
                        <th scope="col">
                            @sortablelink("status", "Status")
                        </th>
                        <th scope="col">
                            @sortablelink("due_date", "Due")
                        </th>
                        <th scope="col">Details</th>
                    </tr>
                    </thead>
                    @isset($valuations)
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
                                <td class="td-long">{{ ($valuation->description) ?? "None" }}</td>
                                @php
                                    if(isset($approval_status)){
                                        $status = "";
                                        $approval = $approval_status->where('valuation_id', $valuation->id)->first();
                                            if(isset($approval->status)){
                                                switch($approval->status){
                                                case 0:
                                                    $status = "Rejected";
                                                    break;
                                                case 1:
                                                    $status = "Waiting Approval";
                                                    break;
                                                case 2:
                                                    $status = "Approved";
                                                    break;
                                                default:
                                                    $status = "Unknown";
                                            }
                                        }
                                    }
                                @endphp
                                @if($status == "Approved")
                                    @if($valuation->status == 1)
                                        <td class="bg-success text-light">Done</td>
                                    @else
                                        <td class="bg-info text-light">In Progress</td>
                                    @endif
                                @else
                                    @if(!empty($status))
                                        <td class="bg-danger text-light">{{ $status }}</td>
                                    @else
                                        <td class="bg-warning text-dark">Unknown</td>
                                    @endif
                                @endif
                                <td class="bg-danger text-light">{{ $valuation->due_date }}</td>
                                <td>
                                    <a class="btn btn-primary flex-center" href="{{ route("a-valuationDetails", ['id' => $valuation->id]) }}">
                                        <iconify-icon icon="ic:sharp-remove-red-eye"></iconify-icon>
                                    </a>
                                    <form action="{{ route("a-editValuation", ['id' => $valuation->id]) }}" method="post" class="center">
                                        @csrf
                                        @method("PATCH")
                                        <button class="btn btn-primary flex-center" type="submit">
                                            <iconify-icon icon="mdi:coffee-maker-done"></iconify-icon>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>

            <!-- Start Pagination -->
            <div class="center">
                {{ $valuations->links() }}
            </div>
        </main>
    </x-slot>
</x-admin-layout>
