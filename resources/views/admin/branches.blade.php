<x-admin-layout>
    <x-slot name="main">
        <main class="branches-admin container">
            <x-page-title title="branches" subtitle="all the company branches"></x-page-title>
            <hr>
            <table class="table table-bordered caption-top">
                <caption>List of All Branches</caption>
                <thead>
                <tr>
                    <th scope="col">
                        ID
                    </th>
                    <th scope="col">
                        Phone
                    </th>
                    <th scope="col">
                        Email
                    </th>
                    <th scope="col">
                        Location
                    </th>
                    <th scope="col">
                        Working Hours
                    </th>
                    <th scope="col">
                        From
                    </th>
                    <th scope="col">
                        To
                    </th>
                    <th scope="col">
                        Request a New Branch From Developer
                    </th>
                </tr>
                </thead>
                @isset($branches)
                    <tbody>
                    @foreach($branches as $branch)
                        <tr>
                            <th scope="row">{{ $branch->id }}</th>
                            <td>{{ $branch->phone }}</td>
                            <td>{{ $branch->email }}</td>
                            <td>{{ $branch->location }}</td>
                            <td>{{ $branch->working_hours }}</td>
                            <td>{{ $branch->from_hour }} AM</td>
                            <td>{{ $branch->to_hour }} PM</td>
                            <td><a href="mailto:husseinkhalil420@gmail.com?subject=New Branch -- {{ config('company.name') }}" title="">Web Developer Email</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                @endisset
            </table>
        </main>
    </x-slot>
</x-admin-layout>
