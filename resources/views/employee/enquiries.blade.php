<x-employee.layout>
    <x-slot name="main">
        <main class="enquiries-admin container">
            <x-page-title title="enquiries" subtitle="all enquiries assigned to you"></x-page-title>
            <hr>

            <div class="container my-5">
                <table class="table table-bordered caption-top">
                    <caption>{{ sizeof($enquiries) }} Enquiries Assigned to You</caption>
                    <thead>
                    <tr>
                        <th scope="col">
                            @sortablelink("id", "ID")
                        </th>
                        <th scope="col">
                            @sortablelink("date_issued", "Date")
                        </th>
                        <th scope="col">
                            @sortablelink("issuer_name", "Issuer Name")
                        </th>
                        <th scope="col">
                            Issuer Message
                        </th>
                        <th scope="col">
                            @sortablelink("property_id", "For")
                        </th>
                        <th scope="col">Reply</th>
                        <th scope="col">Details</th>
                        <th scope="col">Mark As Done</th>
                    </tr>
                    </thead>
                    @isset($enquiries)
                        <tbody>
                        @foreach($enquiries as $enquiry)
                            <tr>
                                <th scope="row">{{ $enquiry->id }}</th>
                                <td>{{ $enquiry->created_at }}</td>
                                <td>{{ $enquiry->issuer_name }}</td>
                                <td class="td-long">{{ $enquiry->issuer_message }}</td>
                                <td><a href="{{ route('e-editProperty', ['id' => $enquiry->property_id]) }}">{{ $enquiry->property_id }}</a></td>
                                <td>
                                    <a href="mailto:{{ $enquiry->issuer_email }}">{{ $enquiry->issuer_email }}</a> <br>
                                    <a href="tel:{{ $enquiry->issuer_phone }}">{{ $enquiry->issuer_phone }}</a>
                                </td>
                                <td><a class="btn btn-primary flex-center" href="{{ route('e-enquiryDetails', ['id' => $enquiry->id]) }}"><iconify-icon icon="ic:sharp-remove-red-eye"></iconify-icon></a></td>
                                <td>
                                    <form method="post" action="{{ route("e-markAsDone", ['id' => $enquiry->id]) }}" class="center">
                                        @csrf
                                        @method("PATCH")
                                        <button type="submit" class="btn btn-primary flex-center"><iconify-icon icon="mdi:coffee-maker-done"></iconify-icon></button>
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
