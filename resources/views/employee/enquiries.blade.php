<x-employee.layout>
    <x-slot name="main">
        <main class="enquiries-admin container">
            <x-page-title title="enquiries"></x-page-title>
            <hr>

            <div class="container my-5">
                <table class="table table-bordered caption-top">
                    <caption>{{ sizeof($enquiries) }} Enquiries Assigned to You</caption>
                    <thead class="bg-dark">
                    <tr>
                        <th scope="col" class="text-primary">
                            @sortablelink("id", "ID")
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("date_issued", "Date")
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("issuer_name", "Issuer Name")
                        </th>
                        <th scope="col" class="text-primary">
                            Issuer Message
                        </th>
                        <th scope="col" class="text-primary">
                            @sortablelink("property_id", "For")
                        </th>
                        {{--                        <th scope="col" class="text-primary">--}}
                        {{--                            @sortablelink("employee_id", "Assigned To")--}}
                        {{--                        </th>--}}
                        <th scope="col" class="text-primary">Reply</th>
                        <th scope="col" class="text-primary">Details</th>
                        <th scope="col" class="text-primary">Action</th>
                    </tr>
                    </thead>
                    @isset($enquiries)
                        <tbody>
                        @foreach($enquiries as $enquiry)
                            <tr>
                                <th scope="row">{{ $enquiry->id }}</th>
                                <td>{{ $enquiry->date_issued }}</td>
                                <td>{{ $enquiry->issuer_name }}</td>
                                <td class="td-long">{{ $enquiry->issuer_message }}</td>
                                <td><a href="{{ route('e-property', ['id' => $enquiry->property_id]) }}">{{ $enquiry->property_id }}</a></td>
                                <td>
                                    <a href="mailto:{{ $enquiry->issuer_email }}">{{ $enquiry->issuer_email }}</a> <br>
                                    <a href="tel:{{ $enquiry->issuer_phone }}">{{ $enquiry->issuer_phone }}</a>
                                </td>
                                <td><a class="btn btn-primary" href="{{ route('e-enquiryDetails', ['id' => $enquiry->id]) }}">></a></td>
                                <td>
                                    <form method="post" action="{{ route("e-markAsDone", ['id' => $enquiry->id]) }}">
                                        @csrf
                                        @method("PATCH")
                                        <button type="submit" class="btn btn-primary">Mark As Done</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endisset
                </table>
            </div>

        </main>
    </x-slot>
</x-employee.layout>
