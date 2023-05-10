<x-admin-layout>
    <x-slot name="main">
        <main class="enquiry-details container">
            @if(isset($employees))
                <x-page-title title="Advertisement" subtitle="assign advertisement {{$advertisement->id}}"></x-page-title>
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
                                        <form action="{{ route("a-assignAdvertisementTo", ['advertisement_id' => $advertisement->id, 'employee_id' => $employee->id]) }}" method="POST">
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
                <x-page-title title="Advertisement" subtitle="advertisement #{{$advertisement->id}} assigned to employee #{{ $employee->id }}"></x-page-title>
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
                                        <form action="{{ route("a-assignAdvertisementTo", ['advertisement_id' => $advertisement->id, 'employee_id' => $employee->id]) }}" method="POST">
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
