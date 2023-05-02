<x-admin-layout>
    <x-slot name="main">
        <main class="enquiries-admin container">
            <x-page-title title="enquiries" subtitle="all the enquiries in the system"></x-page-title>
            <hr>
            <table class="table table-bordered caption-top">
                    <caption>List of All Enquiries</caption>
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
                                    <td><a href="{{ route('a-property', ['id' => $enquiry->property_id]) }}">{{ $enquiry->property_id }}</a></td>
                                    <td><a href="mailto:{{ $enquiry->issuer_email }}">{{ $enquiry->issuer_email }}</a></td>
                                    <td><a class="btn btn-primary flex-center" href="{{ route('a-enquiryDetails', ['id' => $enquiry->id]) }}"><iconify-icon icon="ic:sharp-remove-red-eye"></iconify-icon></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        @endisset
                </table>

            <!-- Start Pagination -->
            <div class="center">
                {{ $enquiries->links() }}
            </div>
            <!-- End Pagination -->
        </main>
    </x-slot>
</x-admin-layout>
