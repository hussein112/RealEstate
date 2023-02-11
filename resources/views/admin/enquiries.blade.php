<x-admin-layout>
    <x-slot name="main">
        <main class="enquiries-admin container">
            <h4 class="title my-2 center">Enquiries</h4>

            <div class="container my-5">
                <hr>
                <table class="table table-bordered caption-top">
                    <caption>List of All Enquiries</caption>
                    <thead class="bg-dark">
                    <tr>
                        <th scope="col" class="text-primary">
                            <a href="#">ID</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Date</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Issuer Name</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Issuer Message</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">For Property</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary"><a href="#">Reply</a></th>
                        <th scope="col" class="text-primary"><a href="#">Details</a></th>
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
                                    <td><a href="{{ route('a-property', ['id' => $enquiry->property_id]) }}">{{ $enquiry->property_id }}</a></td>
                                    <td><a href="mailto:{{ $enquiry->issuer_email }}">{{ $enquiry->issuer_email }}</a></td>
                                    <td><a class="btn btn-primary" href="{{ route('a-enquiryDetails', ['id' => $enquiry->id]) }}">></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        @endisset
                </table>
            </div>

            <!-- Start Pagination -->
            <div class="center">
                {{ $enquiries->links() }}
            </div>
            <!-- End Pagination -->
        </main>
    </x-slot>
</x-admin-layout>
