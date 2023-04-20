<x-admin-layout>
    <x-slot name="main">
        <main class="valuation-details container">
            {{-- Check if valuation already approved/rejected --}}
            @php($valuation_status = \App\Models\ValuationApproval::where('valuation_id', $valuation->id)->first())
            @if($valuation_status->status != 1)
                <h4 class="title my-2">Valuation #{{ $valuation->id }} is Already {{ ($valuation_status->status == 0) ? "Rejected" : "Approved"  }}</h4>'
            @endif
        @if(isset($employees))
                <h4 class="title my-2">Assign Valuation #{{ $valuation->id }}</h4>
                <div class="container">
                    <hr>
                    <table class="table table-bordered caption-top">
                        <caption>List of All Employees</caption>
                        <thead class="bg-dark">
                        <tr>
                            <th scope="col" class="text-primary">
                                @sortablelink("id", "ID")
                            </th>
                            <th scope="col" class="text-primary">
                                @sortablelink("full_name", "Full Name")
                            </th>
                            <th scope="col" class="text-primary">
                                @sortablelink("phone", "Phone")
                            </th>
                            <th scope="col" class="text-primary">
                                @sortablelink("email", "Email")
                            </th>
                            <th scope="col" class="text-primary">
                                Avatar
                            </th>
                            <th scope="col" class="text-primary">Assign</th>
                        </tr>
                        </thead>
                        @isset($employees)
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <th scope="row">{{ $employee->id }}</th>
                                    <td>{{ $employee->full_name }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->avatar_id  }}</td>
                                    <td>
                                        <form action="{{ route("a-assignValuationTo", ['valuation_id' => $valuation->id, 'employee_id' => $employee->id]) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-primary" type="submit">Assign</button>
                                        </form>
                                </tr>
                            @endforeach
                            @endisset
                            </tbody>
                    </table>
                </div>
            @else
                <h4 class="title my-2">Valuation #{{ $valuation->id }} Assigned to Employee #{{ $employee->id }}</h4>
                <div class="container">
                    <hr>
                    <table class="table table-bordered caption-top">
                        <caption>List of All Employees</caption>
                        <thead class="bg-dark">
                        <tr>
                            <th scope="col" class="text-primary">
                                @sortablelink("id", "ID")
                            </th>
                            <th scope="col" class="text-primary">
                                @sortablelink("full_name", "Full Name")
                            </th>
                            <th scope="col" class="text-primary">
                                @sortablelink("phone", "Phone")
                            </th>
                            <th scope="col" class="text-primary">
                                @sortablelink("email", "Email")
                            </th>
                            <th scope="col" class="text-primary">
                                Avatar
                            </th>
                            <th scope="col" class="text-primary">Assign</th>
                        </tr>
                        </thead>
                        @isset($employees)
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <th scope="row">{{ $employee->id }}</th>
                                    <td>{{ $employee->full_name }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->avatar_id  }}</td>
                                    <td>
                                        <form action="{{ route("a-assignValuationTo", ['valuation_id' => $valuation->id, 'employee_id' => $employee->id]) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-primary" type="submit">Assign</button>
                                        </form>
                                </tr>
                            @endforeach
                        @endisset
                            </tbody>
                    </table>
                </div>
            @endif
        </main>
    </x-slot>
</x-admin-layout>
